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


}