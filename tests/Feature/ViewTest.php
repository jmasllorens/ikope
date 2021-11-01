<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Seminar;
use App\Models\Patient;
use App\Models\Session;
use App\Models\Note;

class ViewTest extends TestCase
{
    use RefreshDatabase;

    /* unlogged user view */

    public function test_welcome_screen_can_be_rendered()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
    
    /* logged user views */

    public function test_dashboard_screen_can_be_rendered_if_user_is_logged_in()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
    }

    public function test_seminars_screen_can_be_rendered_if_user_is_logged_in()
    {
        $user = User::factory()->create();
        $seminar = Seminar::factory()->create();

        $response = $this->actingAs($user)->get('/seminars');

        $response->assertStatus(200);
    }

    public function test_mySeminars_screen_can_be_rendered_if_user_is_logged_in()
    {
        $user = User::factory()->create();
        $seminar = Seminar::factory()->create(['id' => 2]);
        $user->seminars()->attach(2);
    

        $response = $this->actingAs($user)->get('/myseminars');

        $response->assertStatus(200);
    }

    public function test_publications_screen_can_be_rendered_if_user_is_logged_in()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/publications');

        $response->assertStatus(200);
    }

    public function test_patients_screen_can_be_rendered_if_isActive_user_is_logged_in()
    {
        $user = User::factory()->create(['id' => 3, 'isActive' => true]);
        $patients = Patient::factory()->create(['user_id' => 3]);
        

        $response = $this->actingAs($user)->get('/patients');

        $response->assertStatus(200);
    }

    public function test_sessions_screen_can_be_rendered_if_isActive_user_is_logged_in()
    {
        $user = User::factory()->create(['id' => 1, 'isActive' => true]);
        $patient = Patient::factory()->create(['id' => 2, 'user_id' => 1]);
        $session = Session::factory()->create(['user_id' => 1, 'patient_id' => 2]);
       
        $response = $this->actingAs($user)->get('/sessions');

        $response->assertStatus(200);
    }

    public function test_contact_screen_can_be_rendered_if_user_is_logged_in()
    {
        $user = User::factory()->create(['isAdmin' => false]);

        $response = $this->actingAs($user)->get('/contact');

        $response->assertStatus(200);
    }

    public function test_create_session_can_be_rendered_if_activeUser_has_patients()
    {    
        $user = User::factory()->create(['isAdmin' => false, 'isActive' => true, 'id' => 1]);
        $patient = Patient::factory()->create(['id' => 1, 'user_id' => 1]);

        $response = $this->actingAs($user)->get('/patients/1/sessionscreate');

        $response->assertStatus(200);

    }

    public function test_create_note_can_be_rendered_if_activeUser_has_patients_and_session_without_note()
    {    
        $user = User::factory()->create(['isAdmin' => false, 'isActive' => true, 'id' => 1]);
        $patient = Patient::factory()->create(['id' => 2, 'user_id' => 1]);
        $session = Session::factory()->create(['id' => 3,'user_id' => 1, 'patient_id' => 2]);

        $response = $this->actingAs($user)->get('/patients/2/sessions/3/create');

        $response->assertStatus(200);

    }

    public function test_edit_session_can_be_rendered_if_activeUser_has_patients_and_session()
    {    
        $user = User::factory()->create(['isAdmin' => false, 'isActive' => true, 'id' => 1]);
        $patient = Patient::factory()->create(['id' => 2, 'user_id' => 1]);
        $session = Session::factory()->create(['id' => 1, 'user_id' => 1, 'patient_id' => 2]);

        $response = $this->actingAs($user)->get('/patients/2/sessions/1/edit');

        $response->assertStatus(200);

    }

    public function test_create_patient_can_be_rendered()
    {    
        $user = User::factory()->create(['isAdmin' => false, 'isActive' => true]);
      
      
        $response = $this->actingAs($user)->get('/patientscreate');

        $response->assertStatus(200);

    }

    public function test_edit_patient_can_be_rendered_when_patient_exists()
    {    
        $user = User::factory()->create(['id' => 1, 'isAdmin' => false, 'isActive' => true]);
        $patient = Patient::factory()->create(['id' => 6, 'user_id' => 1]);
      
      
        $response = $this->actingAs($user)->get('/patients/6/edit');

        $response->assertStatus(200);

    }

    public function test_edit_note_can_be_rendered_if_activeUser_has_patients_and_session_with_note()
    {    
        $user = User::factory()->create(['isAdmin' => false, 'isActive' => true, 'id' => 1]);
        $patient = Patient::factory()->create(['id' => 2, 'user_id' => 1]);
        $session = Session::factory()->create(['id' => 1, 'user_id' => 1, 'patient_id' => 2]);
        $note = Note::factory()->create(['id' => 5, 'user_id' => 1, 'patient_id' => 2, 'session_id' => 1]);

        $response = $this->actingAs($user)->get('/patients/2/sessions/1/5/edit');

        $response->assertStatus(200);

    }

/*     admin views */

    public function test_seminars_create_screen_can_be_rendered_if_logged_user_is_admin()
    {
        $user = User::factory()->create(['isAdmin' => true]);

        $response = $this->actingAs($user)->get('/seminars/create');

        $response->assertStatus(200);
    }
    
    public function test_seminars_edit_screen_can_be_rendered_if_logged_user_is_admin()
    {
        $user = User::factory()->create(['isAdmin' => true]);
        $seminar = Seminar::factory()->create(['id' => 1]);

        $response = $this->actingAs($user)->get('/seminars/1/edit');

        $response->assertStatus(200);
    }

    public function test_users_screen_can_be_rendered_if_isAdmin_user_is_logged_in()
    {
        $user = User::factory()->create(['isAdmin' => true]);

        $response = $this->actingAs($user)->get('/users');

        $response->assertStatus(200);
    }

    public function test_adminusers_screen_can_be_rendered_if_isAdmin_user_is_logged_in()
    {
        $user = User::factory()->create(['isAdmin' => true]);

        $response = $this->actingAs($user)->get('/adminusers');

        $response->assertStatus(200);
    }

    public function test_publications_create_screen_can_be_rendered_if_user_is_logged_in()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/publications/create');

        $response->assertStatus(200);
    }

    public function test_product_screen_can_be_rendered_if_user_is_logged_in()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/products');

        $response->assertStatus(200);
    }


    
}