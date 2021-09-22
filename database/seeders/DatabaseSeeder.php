<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Seminar;

use function PHPUnit\Framework\isTrue;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(['name' => 'Admin', 'email' => 'admin@admin.com', 'isAdmin' => true]);
        User::factory()->create(['name' => 'User', 'email' => 'user@user.com']);
        User::factory()->create(['name' => 'Therapist', 'email' => 'therapist@user.com', 'isActive' => true]);
        User::factory()->create(['name' => 'Therapist', 'email' => 'nulltherapist@user.com']);
        Seminar::factory(15)->create([]);



    }
}
