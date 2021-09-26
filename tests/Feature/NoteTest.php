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

        $response = $this->actingAs($user)->post('/patients/5/sessions&notes/10/store', [
            'title' => $newNote->title,
            'text' => $newNote->text
        
        ]);

        $this->assertEquals($newNote->title , 'Oedipus Complex');

    }
}