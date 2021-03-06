<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Patient;
use App\Models\Session;
use App\Models\Note;

class SessionTest extends TestCase
{
    use RefreshDatabase;

    public function test_userActive_can_retrieve_list_of_all_of_their_sessions()
    {
        $user = User::factory()->create(['id' => 3, 'isActive' => true]);
        $patient1 = Patient::factory()->create(['id' => '2', 'user_id' => 3]);
        $patient2 = Patient::factory()->create(['id' => '1', 'user_id' => 3]);

        $sessions1 = Session::factory(2)->create(['user_id' => 3, 'patient_id' => 2]);
        $sessions2 = Session::factory(3)->create(['user_id' => 3, 'patient_id' => 1]);

        $response = $this->actingAs($user)->get('/sessions');

        $response->assertStatus(200);
        $this->assertCount(5, $user->sessions);
 
    }

    public function test_a_session_can_be_created_without_a_related_note()

    {       
        $user = User::factory()->create(['id' => 3, 'isActive' => true]);
        $patient = Patient::factory()->create(['id' => '2', 'user_id' => 3]);
        $sessions = Session::factory(2)->create(['user_id' => 3, 'patient_id' => 2]);
        $notes = $user->notes;
        $this->assertEquals(2, count($sessions));
        $this->assertEquals(null, count($notes));
      

    }

    public function test_userActive_can_retrieve_list_of_all_sessions_by_patientId()
    {
        $user = User::factory()->create(['id' => 3, 'isActive' => true]);
        $patient = Patient::factory()->create(['id' => '2', 'user_id' => 3]);
        $sessions = Session::factory(2)->create(['user_id' => 3, 'patient_id' => 2]);
       

        $response = $this->actingAs($user)->get('/patients/2/sessions');

        $response->assertStatus(200);
        $this->assertCount(2, $patient->sessions);
 
    }


    public function test_user_can_retrieve_info_session_by_ids()
    {
        $user = User::factory()->create(['id' => 3, 'isActive' => true]);
        $patient = Patient::factory()->create(['id' => 8, 'user_id' => 3, 'name' => 'Van Gogh']);
        $session = Session::factory()->create(['id' => 1, 'user_id' => 3, 'patient_id' => 8, 'keywords' => 'Ear, painting, poverty']);
        $sessionKeywords = $session->keywords;

        $response = $this->actingAs($user)->get('/patients/8/sessions/1');

        $response->assertStatus(200);
        $this->assertEquals('Ear, painting, poverty', $sessionKeywords);

       
    }

    public function test_user_can_retrieve_info_note_by_ids()
    {
        $user = User::factory()->create(['id' => 3, 'isActive' => true]);
        $patient = Patient::factory()->create(['id' => 8, 'user_id' => 3, 'name' => 'Van Gogh']);
        $session = Session::factory()->create(['id' => 1, 'user_id' => 3, 'patient_id' => 8, 'keywords' => 'Ear, painting, poverty']);
        $note = Note::factory()->create(['user_id' => 3, 'patient_id' => 8, 'session_id' => 1, 'title' => 'Abandonment feeling']);
        $noteTitle = $note->title;

        $response = $this->actingAs($user)->get('/patients/8/sessions/1');

        $response->assertStatus(200);
        $this->assertEquals('Abandonment feeling', $noteTitle);
    }

    public function test_a_new_session_can_be_created_by_activeUser()
    {
        $user = User::factory()->create(['id' => 1, 'isAdmin' => false, 'isActive' => true]);
        $patient = Patient::factory()->create(['id' => 5, 'user_id' => 1]);
       
        $newSession = new Session([
            'date' => '2021-10-21 19:54:02',
            'keywords' => 'panic attack, The Sopranos, fresh meat',
            'cost' => 85,
            
        ]);

        $response = $this->actingAs($user)->post('/patients/5/sessions/store', [
            'date' => $newSession->date,
            'keywords' => $newSession->keywords,
            'cost' => $newSession->cost,
        ]);

        $this->assertEquals($newSession->cost , 85);

    }

    public function test_a_session_can_be_updated_by_activeUser()
    {
        $user = User::factory()->create(['isActive' => true, 'id' => 1]);
        $patient = Patient::factory()->create(['id' => 4, 'user_id' => 1, 'name' => 'Beatriz Preciado']);
        $session = Session::factory()->create(['id' => 2, 'patient_id' => 4, 'user_id' => 1, 'cost' => 25]);

        
      
        $response = $this->actingAs($user)->patch('patients/4/sessions/2/update', [
            'cost' => 50]);
  
        $this->assertEquals(Session::find(2)->cost, 50);
    } 

    public function test_a_session_and_its_note_can_be_deleted_by_their_activeUser_from_sessionShow()
    {
        $user = User::factory()->create(['isActive' => true, 'id' => 1]);
        $patient = Patient::factory()->create(['id' => 1, 'user_id' => 1]);
        $session = Session::factory()->create(['id' => 1, 'user_id' => 1, 'patient_id' => 1]);
        $note = Note::factory()->create(['user_id' => 1, 'patient_id' => 1, 'session_id' => 1]);
    
    
        $response = $this->actingAs($user)->delete('/session/1', [$session]);

        $this->assertEquals(Session::all()->count(), 0);
        $this->assertEquals(Patient::all()->count(), 1);
        $this->assertEquals(Note::all()->count(), 0);

    }

    public function test_a_session_and_its_note_can_be_deleted_by_their_activeUser_from_sessionIndex()
    {
        $user = User::factory()->create(['isActive' => true, 'id' => 1]);
        $patient = Patient::factory()->create(['id' => 1, 'user_id' => 1]);
        $session = Session::factory()->create(['id' => 1, 'user_id' => 1, 'patient_id' => 1]);
        $note = Note::factory()->create(['user_id' => 1, 'patient_id' => 1, 'session_id' => 1]);
    
    
        $response = $this->actingAs($user)->delete('/sessions/1', [$session]);

        $this->assertEquals(Session::all()->count(), 0);
        $this->assertEquals(Patient::all()->count(), 1);
        $this->assertEquals(Note::all()->count(), 0);

    }



  

}