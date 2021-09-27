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
      

        Session::factory()->create(['id' => 6, 'user_id' => 3, 'patient_id' => 1]);
        Session::factory()->create(['id' => 1, 'user_id' => 3, 'patient_id' => 2]);
        Session::factory()->create(['id' => 2, 'user_id' => 3, 'patient_id' => 1]);
        Session::factory()->create(['id' => 3, 'user_id' => 3, 'patient_id' => 1]);
        Session::factory()->create(['id' => 7, 'user_id' => 3, 'patient_id' => 1]);
        Session::factory()->create(['id' => 8, 'user_id' => 3, 'patient_id' => 2]);
        Session::factory()->create(['id' => 10, 'user_id' => 3, 'patient_id' => 3]);
        Session::factory()->create(['id' => 50, 'user_id' => 3, 'patient_id' => 3]);
        Session::factory()->create(['id' => 80, 'user_id' => 3, 'patient_id' => 3]);
        Session::factory()->create(['id' => 13, 'user_id' => 3, 'patient_id' => 3]);
        Session::factory()->create(['id' => 14, 'user_id' => 3, 'patient_id' => 3]);
        Session::factory()->create(['id' => 17, 'user_id' => 3, 'patient_id' => 2]);
        
        Note::factory()->create(['user_id' => 3, 'patient_id' => 1, 'session_id' => 6]);
        Note::factory()->create(['user_id' => 3, 'patient_id' => 2, 'session_id' => 1]);
        Note::factory()->create(['user_id' => 3, 'patient_id' => 1, 'session_id' => 2]);
        Note::factory()->create(['user_id' => 3, 'patient_id' => 1, 'session_id' => 3]);
        Note::factory()->create(['user_id' => 3, 'patient_id' => 1, 'session_id' => 7]);
        Note::factory()->create(['user_id' => 3, 'patient_id' => 2, 'session_id' => 8]);
        Note::factory()->create(['user_id' => 3, 'patient_id' => 3, 'session_id' => 10]);
        Note::factory()->create(['user_id' => 3, 'patient_id' => 3, 'session_id' => 50]);
        Note::factory()->create(['user_id' => 3, 'patient_id' => 3, 'session_id' => 80]);

        Patient::factory()->create(['id' => 56, 'user_id' => 3, 'name' => 'Jordi Piella']);
        Session::factory(10)->create(['user_id' => 3, 'patient_id' => 56, 'patient_name' => 'Jordi Piella' ]);



    }
}
