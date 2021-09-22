<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Seminar;
use App\Models\Patient;
use App\Models\Session;
use App\Models\Note;

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
        Seminar::factory(15)->create([]);
        Patient::factory(10)->create(['user_id' => 3]);
        Session::factory()->create(['id' => 6, 'user_id' => 3, 'patient_id' => 2]);
        Note::factory()->create(['user_id' => 3, 'patient_id' => 2, 'session_id' => 6]);
        



    }
}
