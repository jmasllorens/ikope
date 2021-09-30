<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_get_list_of_all_users() 
    {   
        $admin =  User::factory()->create(['isAdmin' => true]);
        $user1 =  User::factory()->create([]);
        $user2 =  User::factory()->create([]);
        $users =  User::orderByDesc('id')->where('isAdmin', false)->get();
 
       
        $response = $this->actingAs($admin)->get('/users');

        $response->assertStatus(200);
        $this->assertCount(2, $users);
    }

    public function test_an_admin_can_deleted_a_user()
    {
        $admin = User::factory()->create(['isAdmin' => true]);
        $user = User::factory()->create(['id' => 3, 'isAdmin' => false]);
        
        
    
        $response = $this->actingAs($admin)->delete('/users/3', [$user]);

        $users = User::orderByDesc('id')->where('isAdmin', false)->get();

        $this->assertCount(0, $users);

    }

    
}
