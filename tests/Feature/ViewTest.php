<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Seminar;

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

        $response = $this->actingAs($user)->get('/seminars');

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
        $user = User::factory()->create(['isActive' => true]);

        $response = $this->actingAs($user)->get('/patients');

        $response->assertStatus(200);
    }

    public function test_contact_screen_can_be_rendered_if_user_is_logged_in()
    {
        $user = User::factory()->create([]);

        $response = $this->actingAs($user)->get('/contact');

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
    
}