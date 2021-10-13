<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Publication;

class PublicationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_get_ordered_list_of_all_publications() 
    {   
        $user =  User::factory()->create([]);;
        $publication1 = Publication::factory()->create(['title' => 'Z']);
        $publication2 = Publication::factory()->create(['title' => 'A']);

        $publications =  Publication::orderBy('title', 'asc')->get();
       
        $response = $this->actingAs($user)->get('/publications');

        $response->assertStatus(200);
        $this->assertCount(2, Publication::all());
        $this->assertEquals($publications[0]->title, 'A');
    }

    public function test_user_can_retrieve_info_publication_by_id()
    {
        $user = User::factory()->create();
        $publication = Publication::factory()->create(['id' => 4, 'author' => 'Carl Jung']);
        $publicationAuthor = $publication->author; 

        $response = $this->actingAs($user)->get('/publications/4');

        $response->assertStatus(200);
        $this->assertEquals('Carl Jung', $publicationAuthor);
  
    }


    public function test_a_new_publication_can_be_created_by_user()
    {
        $user = User::factory()->create();

        $publication = new Publication([
            'title' => 'Lacan',
            'author' => 'Slavoj Zizek',
            'image' => 'https://images.unsplash.com/flagged/photo-1593005510329-8a4035a7238f?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8eWVsbG93fGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80'
        ]);

        $response = $this->actingAs($user)->post('/publications/store', [
            'title' => $publication->title,
            'author' => $publication->author,
            'image' => $publication->image
           
        ]);

        $this->assertEquals(Publication::all()->count(), 1);

    }

     public function test_a_publication_can_be_deleted_by_user()
    {
        $user = User::factory()->create();
        $publication = Publication::factory()->create(['id' => 1]);
    
        $response = $this->actingAs($user)->delete('/publications/1', [$publication]);


        $this->assertEquals(Publication::all()->count(), 0);

    } 

    public function test_a_publication_can_be_updated_by_user()
    {
        $user = User::factory()->create();
        $publication = Publication::factory()->create(['id' => 4, 'title' => 'The mirror']);
   
        $response = $this->actingAs($user)->patch('publications/4/update', [
            'title' => 'The Divan']);
  
        $this->assertEquals(Publication::find(4)->title, 'The Divan');
    }  
}