<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Patient;
use App\Models\Session;

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
}