<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Seminar;

class SeminarTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_seminar_can_have_many_users()
    {
        $user1 = User::factory()->create(['id' => 2]);
        $user2 = User::factory()->create(['id' => 3]);
        $seminar = Seminar::factory()->create(['id' => 1
        ]);

        $user1->seminars()->attach(1);
        $user2->seminars()->attach(1);

        $this->assertCount(2, $seminar->users);
    }

    public function test_if_can_get_list_of_all_seminars() 
    {
        Seminar::factory(6)->create([]);

        $this->assertCount(6, Seminar::all());
    }

    public function test_a_user_can_subscribe_to_a_seminar()
    {
        $seminar = Seminar::factory()->create(['id' => 2]);
        $user = User::factory()->create(['id' => 1]);
        $user->seminars()->attach(2);
        $isSubscribed = $seminar->isSubscribed('1');

        $this->assertTrue($isSubscribed);
        $this->assertCount(1, $seminar->users);
    }

    public function test_a_user_can_unsubscribe_from_a_seminar()
    {
        $seminar = Seminar::factory()->create(['id' => 2]);
        $user = User::factory()->create(['id' => 1]);
        $user->seminars()->attach(2);
        $user->seminars()->detach(2);

        $this->assertFalse($seminar->isSubscribed('1'));
        $this->assertCount(0, $seminar->users);
    }

    public function test_a_user_cannot_unsubscribe_from_a_seminar_if_they_are_not_subscribed()
    {
        $seminar = Seminar::factory()->create(['id' => 2]);
        $user1 = User::factory()->create(['id' => 1]);
        $user2 = User::factory()->create(['id' => 5]);
        $user2->seminars()->attach(2);
        $user1->seminars()->detach(2);

        $this->assertCount(1, $seminar->users);
    }

    public function test_a_seminar_cannot_have_the_same_user_subscribed_twice()
    {
        $seminar = Seminar::factory()->create(['id' => 2]);
        $user = User::factory()->create(['id' => 1]);
        $user->seminars()->attach(2);
        $isSubscribed = $seminar->isSubscribed('1');

        $user->seminars()->attach(2);

        $this->assertTrue($isSubscribed);
        $this->assertCount(1, $seminar->users);

    }
}