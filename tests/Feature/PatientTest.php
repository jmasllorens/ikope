<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Patient;
use App\Models\Session;
use App\Models\Note;

class PatientTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_patient_can_have_many_sessions()
    {
        $user = User::factory()->create(['id' => 1, 'isActive' => true]);
        $patient = Patient::factory()->create(['id' => 2, 'user_id' => 1]);

        $session = Session::factory(6)->create(['user_id' => 1, 'patient_id' => 2]);

        $this->assertCount(6, $patient->sessions);
    }

    public function test_a_patient_can_have_many_notes()
    {
        $user = User::factory()->create(['id' => 1, 'isActive' => true]);
        $patient = Patient::factory()->create(['id' => 2, 'user_id' => 1]);
        $session1 = Session::factory()->create(['id' => 10, 'user_id' => 1, 'patient_id' => 2]);
        $session2 = Session::factory()->create(['id' => 9, 'user_id' => 1, 'patient_id' => 2]);

        $note1 = Note::factory()->create(['id' => 1, 'user_id' => 1, 'patient_id' => 2, 'session_id' => 10]);
        $note2 = Note::factory()->create(['id' => 2, 'user_id' => 1, 'patient_id' => 2, 'session_id' => 9]);

        $this->assertCount(2, $patient->notes);
    }

    public function test_user_can_retrieve_list_of_all_of_their_patients()
    {
        $user = User::factory()->create(['id' => 3, 'isActive' => true]);
        $patients = Patient::factory(3)->create(['user_id' => 3]);

        $response = $this->actingAs($user)->get('/patients');

        $response->assertStatus(200);
        $this->assertCount(3, $patients);

       
    }

    public function test_user_can_retrieve_info_patient_by_id()
    {
        $user = User::factory()->create(['id' => 3, 'isActive' => true]);
        $patient = Patient::factory()->create(['id' => 8, 'user_id' => 3, 'name' => 'Van Gogh']);
        $patientname = $patient->name; 

        $response = $this->actingAs($user)->get('/patients/8');

        $response->assertStatus(200);
        $this->assertEquals('Van Gogh', $patientname);

       
    }

    public function test_a_new_patient_can_be_created_by_activeUser()
    {
        $user = User::factory()->create(['isAdmin' => false, 'isActive' => true]);
       
        $newPatient = new Patient([
            'name' => 'Sigmund Freud',
            'email' => 'sigmund@freud.com',
            'age' => 40,
            'pronoun' => 'he/him',
            'motive' => 'Mammaaaaa...!',
            'history' => 'Too complicated'
            
        ]);

        $response = $this->actingAs($user)->post('/patients/store', [
            'name' => $newPatient->name,
            'age' => $newPatient->age,
            'email' => $newPatient->email,
            'pronoun' => $newPatient->pronoun,
            'motive' => $newPatient->motive,
            'history' => $newPatient->history,
        ]);

        $this->assertEquals($newPatient->pronoun , 'he/him');

    }

    public function test_a_patient_can_be_updated_by_activeUser()
    {
        $user = User::factory()->create(['isActive' => true, 'id' => 1]);
        $patient = Patient::factory()->create(['id' => 4, 'user_id' => 1, 'name' => 'Beatriz Preciado']);
        $sessions = Session::factory(4)->create(['patient_id' => 4, 'user_id' => 1]);

        
      
        $response = $this->actingAs($user)->patch('patients/4/update', [
            'name' => 'Paul B. Preciado']);
  
        $this->assertEquals(Patient::find(4)->name, 'Paul B. Preciado');
    }

    public function test_a_patient_and_their_children_can_be_deleted_by_their_activeUser()
    {
        $user = User::factory()->create(['isActive' => true, 'id' => 1]);
        $patient = Patient::factory()->create(['id' => 1, 'user_id' => 1]);
        $session = Session::factory()->create(['id' => 1, 'user_id' => 1, 'patient_id' => 1]);
        $note = Note::factory()->create(['user_id' => 1, 'patient_id' => 1, 'session_id' => 1]);
    
        $response = $this->actingAs($user)->delete('/patients/1', [$patient]);

        $this->assertEquals(Patient::all()->count(), 0);
        $this->assertEquals(Session::all()->count(), 0);
        $this->assertEquals(Note::all()->count(), 0);

    }

    




}