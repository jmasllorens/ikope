<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Seminar;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_have_many_seminars()
    {   
        $seminar1 = Seminar::factory()->create(['id' => 2]);
        $seminar2 = Seminar::factory()->create(['id' => 3]);
        $user = User::factory()->create(['id' => 1
        ]);

        $seminar1->users()->attach($user);
        $seminar2->users()->attach($user);

        $this->assertCount(2, $user->seminars);
    }

    public function test_a_user_can_update_their_profile()
    {
        $user = User::factory()->create(['id' => 4, 'name' => 'John']);
   
        $response = $this->actingAs($user)->patch('profile/4/update', [
            'name' => 'Joan']);
  
        $this->assertEquals(User::find(4)->name, 'Joan');
    } 
}
