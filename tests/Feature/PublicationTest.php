<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Publication;

class PublicationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_get_list_of_all_publications() 
    {   
        $user =  User::factory()->create([]);;
        $publication = Publication::factory(6)->create([]);
       
        $response = $this->actingAs($user)->get('/publications/index');

        $response->assertStatus(200);
        $this->assertCount(6, Publication::all());
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
            'author' => 'Slavoj Zizek'
        ]);

        $response = $this->actingAs($user)->post('/publications/store', [
            'title' => $publication->title,
            'author' => $publication->author
           
        ]);

        $this->assertEquals(Publication::all()->count(), 1);

    }

  /*   public function test_a_publication_can_be_deleted_by_user()
    {
        $user = User::factory()->create();
        $publication = Publication::factory()->create(['id' => 2]);
    
        $response = $this->actingAs($user)->delete('/publications/2/delete', [$publication]);


        $this->assertEquals(Publication::all()->count(), 0);

    } 

    public function test_a_publication_can_be_updated_by_user()
    {
        $user = User::factory()->create();
        $publication = Publication::factory()->create(['id' => 4, 'title' => 'Gender perspective in Psychoanalysis']);
   
        $response = $this->actingAs($user)->patch('publications/4/update', [
            'title' => 'Queer Theory in Psychoanalysis']);
  
        $this->assertEquals(Publication::find(4)->title, 'Queer Theory in Psychoanalysis');
    }  */
}