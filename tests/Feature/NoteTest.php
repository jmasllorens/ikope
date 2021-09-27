<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Patient;
use App\Models\Session;
use App\Models\Note;

class NoteTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_new_note_for_an_existing_session_can_be_created_by_activeUser()
    {
        $user = User::factory()->create(['id' => 1, 'isAdmin' => false, 'isActive' => true]);
        $patient = Patient::factory()->create(['id' => 5, 'user_id' => 1]);
        $session = Session::factory()->create(['id' => 10, 'user_id' => 1, 'patient_id' => 5]);
       
        $newNote = new Note([
            'title' => 'Oedipus Complex',
            'text' => 'My father was...'
            
        ]);

        $response = $this->actingAs($user)->post('/patients/5/sessions/10/store', [
            'title' => $newNote->title,
            'text' => $newNote->text
        
        ]);

        $this->assertEquals($newNote->title , 'Oedipus Complex');

    }

    public function test_a_note_can_be_updated_by_activeUser()
    {
        $user = User::factory()->create(['isActive' => true, 'id' => 1]);
        $patient = Patient::factory()->create(['id' => 4, 'user_id' => 1]);
        $session = Session::factory()->create(['id' => 2, 'patient_id' => 4, 'user_id' => 1]);
        $note = Note::factory()->create(['id' => 5, 'user_id' => 1, 'patient_id' => 4, 'session_id' => 2, 'title' => 'Electra vs Oedipus']);

        
      
        $response = $this->actingAs($user)->patch('patients/4/sessions/2/5/update', [
            'title' => 'Electra wins']);
  
        $this->assertEquals(Note::find(5)->title, 'Electra wins');
    } 

    public function test_a_note_can_be_deleted_by_its_activeUser()
    {
        $user = User::factory()->create(['isActive' => true, 'id' => 1]);
        $patient = Patient::factory()->create(['id' => 1, 'user_id' => 1]);
        $session = Session::factory()->create(['id' => 1, 'user_id' => 1, 'patient_id' => 1]);
        $note = Note::factory()->create(['user_id' => 1, 'patient_id' => 1, 'session_id' => 1]);
    
    
        $response = $this->actingAs($user)->delete('/note/1', [$note]);

        $this->assertEquals(Note::all()->count(), 0);
        $this->assertEquals(Session::all()->count(), 1);
        $this->assertEquals(Patient::all()->count(), 1);
       

    }

}