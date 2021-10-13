<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Seminar;
use App\Models\Patient;
use App\Models\Session;
use App\Models\Note;
use App\Models\Publication;

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
        User::factory(10)->create(['isAdmin' => true]);
        User::factory()->create(['name' => 'User', 'email' => 'user@user.com']);
        User::factory()->create(['id' => 13, 'name' => 'Therapist', 'email' => 'therapist@user.com', 'isActive' => true]);
        User::factory(50)->create();

        Seminar::factory(15)->create([]);
        Seminar::factory(2)->create(['availability' => 1]);
        Seminar::factory(5)->create(['date' => '2021-10-12 17:00:00']);


        Patient::factory()->create(['id' => 1, 'user_id' => 13, 'pronoun' => 'he/him', 'name' => 'Félix Guattari']);
        Session::factory(14)->create(['user_id' => 13, 'patient_id' => 1, 'patient_name' => 'Félix Guattari' ]);
        Patient::factory()->create(['id' => 2, 'user_id' => 13, 'name' => 'Dora Maar']);
        Session::factory(32)->create(['user_id' => 13, 'patient_id' => 2, 'patient_name' => 'Dora Maar' ]);
        Patient::factory()->create(['id' => 3, 'user_id' => 13, 'pronoun' => 'she/her', 'name' => 'Antoinette Fouque']);
        Session::factory(26)->create(['user_id' => 13, 'patient_id' => 3, 'patient_name' => 'Antoinette Fouque' ]);
        Patient::factory()->create(['id' => 4, 'user_id' => 13, 'pronoun' => 'she/her', 'name' => 'Maud Mannoni']);
        Session::factory(4)->create(['user_id' => 13, 'patient_id' => 4, 'patient_name' => 'Maud Mannoni' ]);

        Patient::factory()->create(['id' => 5, 'user_id' => 13, 'pronoun' => 'he/him', 'name' => 'Françoise Giroud']);
        Session::factory(3)->create(['user_id' => 13, 'patient_id' => 5, 'patient_name' => 'Françoise Giroud' ]);

        Patient::factory()->create(['id' => 6, 'user_id' => 13, 'pronoun' => 'she/her', 'name' => 'Marianne Oswald']);
        Session::factory(10)->create(['user_id' => 13, 'patient_id' => 6, 'patient_name' => 'Marianne Oswald' ]);

        Patient::factory()->create(['id' => 7, 'user_id' => 13, 'pronoun' => 'she/her', 'name' => 'Nusch Éluard']);
        Session::factory(16)->create(['user_id' => 13, 'patient_id' => 7, 'patient_name' => 'Nusch Éluard' ]);

        Patient::factory()->create(['id' => 8, 'user_id' => 13, 'pronoun' => 'she/her', 'name' => 'Anna Freud']);
        Session::factory(8)->create(['user_id' => 13, 'patient_id' => 8, 'patient_name' => 'Anna Freud' ]);


        Patient::factory()->create(['id' => 9, 'user_id' => 13, 'pronoun' => 'she/her', 'name' => 'Ida Bauer']);
        Session::factory(21)->create(['user_id' => 13, 'patient_id' => 9, 'patient_name' => 'Ida Bauer' ]);

        Patient::factory()->create(['id' => 10, 'user_id' => 13, 'pronoun' => 'he/him', 'name' => 'Ronald Fairbairn']);
        Session::factory(12)->create(['user_id' => 13, 'patient_id' => 10, 'patient_name' => 'Ronald Fairbairn' ]);

        Patient::factory()->create(['id' => 11, 'user_id' => 13, 'pronoun' => 'she/her', 'name' => 'Bertha Pappenheim']);
        Session::factory(11)->create(['user_id' => 13, 'patient_id' => 11, 'patient_name' => 'Bertha Pappenheim' ]);

        Patient::factory()->create(['id' => 12, 'user_id' => 13, 'pronoun' => 'she/her', 'name' => 'Helene Deutsch']);
        Session::factory(1)->create(['user_id' => 13, 'patient_id' => 12, 'patient_name' => 'Helene Deutsch' ]);

        Patient::factory()->create(['id' => 13, 'user_id' => 13, 'name' => 'Piera Aulagnier']);
        Session::factory(13)->create(['user_id' => 13, 'patient_id' => 13, 'patient_name' => 'Piera Aulagnier' ]);

        Patient::factory()->create(['id' => 14, 'user_id' => 13, 'pronoun' => 'he/him', 'name' => 'Otto Rank']);
        Session::factory(18)->create(['user_id' => 13, 'patient_id' => 14, 'patient_name' => 'Otto Rank' ]);
        
        
        Note::factory()->create(['user_id' => 13, 'patient_id' => 1, 'session_id' => 6]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 1, 'session_id' => 1]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 1, 'session_id' => 2]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 1, 'session_id' => 3]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 1, 'session_id' => 7]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 1, 'session_id' => 8]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 1, 'session_id' => 10]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 3, 'session_id' => 50]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 3, 'session_id' => 80]);
 
       

        Publication::factory(3000)->create();

    }
}
