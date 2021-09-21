<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewsTest extends TestCase
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

    public function test_patients_screen_can_be_rendered_if_user_is_logged_in()
    {
        $user = User::factory()->create();

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
    

    
}