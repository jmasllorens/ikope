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

        $response = $this->actingAs($user)->get('/sessions&notes');

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

   /*  public function test_user_can_retrieve_info_session_by_id()
    {
        $user = User::factory()->create(['id' => 3, 'isActive' => true]);
        $patient = Patient::factory()->create(['id' => 8, 'user_id' => 3, 'name' => 'Van Gogh']);
        $patientname = $patient->name; 

        $response = $this->actingAs($user)->get('/patients/8');

        $response->assertStatus(200);
        $this->assertEquals('Van Gogh', $patientname);

       
    } */

}