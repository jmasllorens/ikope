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

    public function test_admin_can_get_json_info_user_by_userId() 
    {   
        $admin =  User::factory()->create(['isAdmin' => true]);
        $user1 =  User::factory()->create(['id' => 2]);
        $user2 =  User::factory()->create(['id' => 3]);
     
 
       
        $response = $this->actingAs($admin)->get('/users/3');

        $response->assertStatus(200)
        ->assertJsonFragment(['id' => 3]);
    }

    public function test_admin_can_get_json_info_admin_by_userId() 
    {   
        $admin1 =  User::factory()->create(['id' => 1, 'isAdmin' => true]);
        $admin2 =  User::factory()->create(['id' => 2, 'isAdmin' => true, 'name' => 'Lou Andreas-Salomé']);
     
 
       
        $response = $this->actingAs($admin1)->get('/adminusers/2');

        $response->assertStatus(200)
        ->assertJsonFragment(['name' => 'Lou Andreas-Salomé']);
    }

    public function test_an_admin_can_delete_a_user()
    {
        $admin = User::factory()->create(['isAdmin' => true]);
        $user = User::factory()->create(['id' => 3, 'isAdmin' => false]);
        
        
    
        $response = $this->actingAs($admin)->delete('/users/3', [$user]);

        $users = User::orderByDesc('id')->where('isAdmin', false)->get();

        $this->assertCount(0, $users);

    }

    public function test_an_admin_can_delete_all_regular_users()
    {
        $admin = User::factory()->create(['isAdmin' => true]);
        $user1 = User::factory()->create(['id' => 3, 'isAdmin' => false]);
        $user2 = User::factory()->create(['id' => 4, 'isAdmin' => false]);
        
        
    
        $response = $this->actingAs($admin)->delete('/users');

        $users = User::orderByDesc('id')->where('isAdmin', false)->get();

        $this->assertCount(0, $users);

    }

    public function test_admin_can_get_list_of_all_adminusers() 
    {   
        $admin1 =  User::factory()->create(['isAdmin' => true]);
        $admin2 =  User::factory()->create(['isAdmin' => true]);
        $user =  User::factory()->create(['isAdmin' => false]);
       
        $admins =  User::orderByDesc('id')->where('isAdmin', true)->get();
 
       
        $response = $this->actingAs($admin1)->get('/adminusers');

        $response->assertStatus(200);
        $this->assertCount(2, $admins);
    }

    public function test_an_admin_can_delete_another_admin()
    {
        $admin1 = User::factory()->create(['isAdmin' => true]);
        $admin2 = User::factory()->create(['id' => 3, 'isAdmin' => true]);
        
        
    
        $response = $this->actingAs($admin1)->delete('/adminusers/3', [$admin2]);

        $users = User::all();

        $this->assertCount(1, $users);

    }

    
}
