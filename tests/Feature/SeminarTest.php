<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Seminar;

class SeminarTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_seminar_can_have_many_users()
    {
        $user1 = User::factory()->create(['id' => 2]);
        $user2 = User::factory()->create(['id' => 3]);
        $seminar = Seminar::factory()->create(['id' => 1
        ]);

        $user1->seminars()->attach($seminar);
        $user2->seminars()->attach($seminar);

        $this->assertCount(2, $seminar->users);
    }

    public function test_user_can_get_list_of_all_seminars() 
    {   
        $user =  User::factory()->create([]);;
        $seminars = Seminar::factory(6)->create([]);
       
        $response = $this->actingAs($user)->get('/seminars');

        $response->assertStatus(200);
        $this->assertCount(6, Seminar::all());
    }

    public function test_user_can_retrieve_info_seminar_by_id()
    {
        $user = User::factory()->create();
        $seminar = Seminar::factory()->create(['id' => 8, 'title' => 'All sorts of things in this world behave like mirrors']);
        $seminarTitle = $seminar->title; 

        $response = $this->actingAs($user)->get('/seminars/8');

        $response->assertStatus(200);
        $this->assertEquals('All sorts of things in this world behave like mirrors', $seminarTitle);

       
    }

    public function test_user_can_get_list_of_all_their_seminars() 
    {   
        $user =  User::factory()->create([]);;
        $seminar1 = Seminar::factory()->create(['id' => 1]);
        $seminar2 = Seminar::factory()->create(['id' => 2]);
        $user->seminars()->attach(1);
        $user->seminars()->attach(2);
       
       
        $response = $this->actingAs($user)->get('/myseminars');

        $response->assertStatus(200);
        $this->assertCount(2, $user->seminars);
    }

    public function test_a_user_can_subscribe_to_a_seminar()
    {
        $seminar = Seminar::factory()->create(['id' => 2]);
        $user = User::factory()->create(['id' => 1]);
        $user->seminars()->attach(2);
        $isSubscribed = $seminar->isSubscribed('1');

        $this->assertTrue($isSubscribed);
        $this->assertCount(1, $seminar->users);
    }

    public function test_a_user_can_unsubscribe_from_a_seminar()
    {
        $seminar = Seminar::factory()->create(['id' => 2]);
        $user = User::factory()->create(['id' => 1]);
        $user->seminars()->attach(2);
        $user->seminars()->detach(2);

        $this->assertFalse($seminar->isSubscribed('1'));
        $this->assertCount(0, $seminar->users);
    }

    public function test_a_user_cannot_unsubscribe_from_a_seminar_if_they_are_not_subscribed()
    {
        $seminar = Seminar::factory()->create(['id' => 2]);
        $user1 = User::factory()->create(['id' => 1]);
        $user2 = User::factory()->create(['id' => 5]);
        $user2->seminars()->attach(2);
        $user1->seminars()->detach(2);

        $this->assertCount(1, $seminar->users);
    }

    public function test_a_seminar_cannot_have_the_same_user_subscribed_twice()
    {
        $seminar = Seminar::factory()->create(['id' => 2]);
        $user = User::factory()->create(['id' => 1]);
        $user->seminars()->attach(2);
        $isSubscribed = $seminar->isSubscribed('1');

        $user->seminars()->attach(2);

        $this->assertTrue($isSubscribed);
        $this->assertCount(1, $seminar->users);

    }

    public function test_a_new_seminar_can_be_created_by_admin()
    {
        $user = User::factory()->create(['isAdmin' => true]);

        $seminar = new Seminar([
            'title' => 'Psychoanalysis for dummies',
            'subject' => 'Psychoanalysis',
            'author' => 'Jacques Lacan',
            'approach' => 'Lacanian',
            'description' => 'Jokes and bullies',
            'availability' => 28,
            'date' => '2021-10-21 19:54:02'
        ]);

        $response = $this->actingAs($user)->post('/seminars/store', [
            'title' => $seminar->title,
            'subject' => $seminar->subject,
            'author' => $seminar->author,
            'approach' => $seminar->approach,
            'description' => $seminar->description,
            'availability' => $seminar->availability,
            'date' => $seminar->date
        ]);

        $this->assertEquals(Seminar::all()->count(), 1);

    }

    public function test_a_seminar_can_be_deleted_by_admin()
    {
        $user = User::factory()->create(['isAdmin' => true]);
        $seminar = Seminar::factory()->create(['id' => 2]);
    
        $response = $this->actingAs($user)->delete('/seminars/2', [$seminar]);

        $this->assertEquals(Seminar::all()->count(), 0);

    }

    public function test_a_seminar_can_be_updated_by_admin()
    {
        $user = User::factory()->create(['isAdmin' => true]);
        $seminar = Seminar::factory()->create(['id' => 4, 'title' => 'Gender perspective in Psychoanalysis']);
   
        $response = $this->actingAs($user)->patch('seminars/4/update', [
            'title' => 'Queer Theory in Psychoanalysis']);
  
        $this->assertEquals(Seminar::find(4)->title, 'Queer Theory in Psychoanalysis');
    } 

    public function test_admin_can_get_list_of_all_subscribers_by_seminarId() 
    {   
        $admin =  User::factory()->create(['isAdmin' => true]);
        $user1 =  User::factory()->create();
        $user2 =  User::factory()->create();;
        $seminar1 = Seminar::factory()->create(['id' => 1]);
        $user1->seminars()->attach(1);
        $user2->seminars()->attach(1);

        $subscribers = $seminar1->users;
       
       
        $response = $this->actingAs($admin)->get('/seminars/1/subscribers');

        $response->assertStatus(200);
        $this->assertCount(2, $subscribers);
    }
}