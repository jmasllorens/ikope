<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Seminar;
use App\Models\Patient;
use App\Models\Session;
use App\Models\Note;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_have_many_seminars()
    {   
        $seminar1 = Seminar::factory()->create(['id' => 2]);
        $seminar2 = Seminar::factory()->create(['id' => 3]);
        $user = User::factory()->create(['id' => 1
        ]);

        $seminar1->users()->attach($user);
        $seminar2->users()->attach($user);

        $this->assertCount(2, $user->seminars);
    }

    public function test_a_user_can_update_their_profile()
    {
        $user = User::factory()->create(['id' => 4, 'name' => 'John']);
   
        $response = $this->actingAs($user)->patch('profile/4/update', [
            'name' => 'Joan']);
  
        $this->assertEquals(User::find(4)->name, 'Joan');
    }
    
    public function test_a_user_can_have_many_patients()
    {
        $user = User::factory()->create(['id' => 1, 'isActive' => true]);

        $patient1 = Patient::factory()->create(['user_id' => 1]);
        $patient2 = Patient::factory()->create(['user_id' => 1]);

        $this->assertCount(2, $user->patients);
    } 

    public function test_a_user_can_have_many_sessions()
    {
        $user = User::factory()->create(['id' => 1, 'isActive' => true]);

        $patient = Patient::factory()->create(['id' => 2, 'user_id' => 1]);
        $session = Session::factory(6)->create(['user_id' => 1, 'patient_id' => 2]);

        $this->assertCount(6, $user->sessions);
    }

    public function test_a_user_can_have_many_notes()
    {
        $user = User::factory()->create(['id' => 1, 'isActive' => true]);

        $patient = Patient::factory()->create(['id' => 2, 'user_id' => 1]);
        $session = Session::factory(6)->create(['user_id' => 1, 'patient_id' => 2]);
        $note1 = Note::factory()->create(['user_id' => 1, 'patient_id' => 2, 'session_id' => 5]);
        $note2 = Note::factory()->create(['user_id' => 1, 'patient_id' => 2, 'session_id' => 6]);

        $this->assertCount(2, $user->notes);
    } 
}
