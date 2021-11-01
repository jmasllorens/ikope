<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Seminar;
use App\Models\Patient;
use App\Models\Session;
use App\Models\Note;
use App\Models\Publication;
use App\Models\Product;



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
        Seminar::factory(2)->create(['date' => '2021-10-12 17:00:00']);


        Patient::factory()->create(['id' => 1, 'user_id' => 13, 'pronoun' => 'he/him', 'name' => 'Félix Guattari']);
        Session::factory(2)->create(['user_id' => 13, 'patient_id' => 1, 'patient_name' => 'Félix Guattari' ]);
        Session::factory(12)->create(['user_id' => 13, 'patient_id' => 1, 'patient_name' => 'Félix Guattari', 'isPayed' => true ]);

        Patient::factory()->create(['id' => 2, 'user_id' => 13, 'name' => 'Dora Maar']);
        Session::factory(31)->create(['user_id' => 13, 'patient_id' => 2, 'patient_name' => 'Dora Maar', 'isPayed' => true  ]);
        Session::factory()->create(['user_id' => 13, 'patient_id' => 2, 'patient_name' => 'Dora Maar' ]);

        Patient::factory()->create(['id' => 3, 'user_id' => 13, 'pronoun' => 'she/her', 'name' => 'Antoinette Fouque', 'isConsulting' => false]);
        Session::factory(25)->create(['user_id' => 13, 'patient_id' => 3, 'patient_name' => 'Antoinette Fouque', 'isPayed' => true ]);
        Session::factory()->create(['user_id' => 13, 'patient_id' => 3, 'patient_name' => 'Antoinette Fouque']);


        Patient::factory()->create(['id' => 4, 'user_id' => 13, 'pronoun' => 'she/her', 'name' => 'Maud Mannoni']);
        Session::factory(2)->create(['user_id' => 13, 'patient_id' => 4, 'patient_name' => 'Maud Mannoni', 'isPayed' => true ]);
        Session::factory(2)->create(['user_id' => 13, 'patient_id' => 4, 'patient_name' => 'Maud Mannoni' ]);

        Patient::factory()->create(['id' => 5, 'user_id' => 13, 'pronoun' => 'he/him', 'name' => 'Françoise Giroud']);
        Session::factory(3)->create(['user_id' => 13, 'patient_id' => 5, 'patient_name' => 'Françoise Giroud', 'isPayed' => true ]);

        Patient::factory()->create(['id' => 6, 'user_id' => 13, 'pronoun' => 'she/her', 'name' => 'Marianne Oswald']);
        Session::factory(7)->create(['user_id' => 13, 'patient_id' => 6, 'patient_name' => 'Marianne Oswald', 'isPayed' => true ]);
        Session::factory(3)->create(['user_id' => 13, 'patient_id' => 6, 'patient_name' => 'Marianne Oswald']);

        Patient::factory()->create(['id' => 7, 'user_id' => 13, 'pronoun' => 'she/her', 'name' => 'Nusch Éluard']);
        Session::factory(16)->create(['user_id' => 13, 'patient_id' => 7, 'patient_name' => 'Nusch Éluard' ]);

        Patient::factory()->create(['id' => 8, 'user_id' => 13, 'pronoun' => 'she/her', 'name' => 'Anna Freud']);
        Session::factory(5)->create(['user_id' => 13, 'patient_id' => 8, 'patient_name' => 'Anna Freud' ]);
        Session::factory(3)->create(['user_id' => 13, 'patient_id' => 8, 'patient_name' => 'Anna Freud', 'isPayed' => true ]);


        Patient::factory()->create(['id' => 9, 'user_id' => 13, 'pronoun' => 'she/her', 'name' => 'Ida Bauer']);
        Session::factory(17)->create(['user_id' => 13, 'patient_id' => 9, 'patient_name' => 'Ida Bauer', 'isPayed' => true ]);
        Session::factory(4)->create(['user_id' => 13, 'patient_id' => 9, 'patient_name' => 'Ida Bauer']);


        Patient::factory()->create(['id' => 10, 'user_id' => 13, 'pronoun' => 'he/him', 'name' => 'Ronald Fairbairn', 'isConsulting' => false]);
        Session::factory(12)->create(['user_id' => 13, 'patient_id' => 10, 'patient_name' => 'Ronald Fairbairn' ]);

        Patient::factory()->create(['id' => 11, 'user_id' => 13, 'pronoun' => 'she/her', 'name' => 'Bertha Pappenheim']);
        Session::factory(10)->create(['user_id' => 13, 'patient_id' => 11, 'patient_name' => 'Bertha Pappenheim' , 'isPayed' => true]);
        Session::factory()->create(['user_id' => 13, 'patient_id' => 11, 'patient_name' => 'Bertha Pappenheim']);

        Patient::factory()->create(['id' => 12, 'user_id' => 13, 'pronoun' => 'she/her', 'name' => 'Helene Deutsch']);
        Session::factory(1)->create(['user_id' => 13, 'patient_id' => 12, 'patient_name' => 'Helene Deutsch' ]);

        Patient::factory()->create(['id' => 13, 'user_id' => 13, 'name' => 'Piera Aulagnier']);
        Session::factory(13)->create(['user_id' => 13, 'patient_id' => 13, 'patient_name' => 'Piera Aulagnier', 'isPayed' => true ]);

        Patient::factory()->create(['id' => 14, 'user_id' => 13, 'pronoun' => 'he/him', 'name' => 'Otto Rank']);
        Session::factory(17)->create(['user_id' => 13, 'patient_id' => 14, 'patient_name' => 'Otto Rank', 'isPayed' => true ]);
        Session::factory()->create(['user_id' => 13, 'patient_id' => 14, 'patient_name' => 'Otto Rank' ]);
        
        Note::factory()->create(['user_id' => 13, 'patient_id' => 1, 'session_id' => 6, 'isImportant' => true]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 1, 'session_id' => 1, 'isImportant' => true]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 1, 'session_id' => 2]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 1, 'session_id' => 3]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 1, 'session_id' => 7]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 1, 'session_id' => 8]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 1, 'session_id' => 10]);

        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 15]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 16]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 17, 'isImportant' => true]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 18]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 19, 'isImportant' => true]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 20]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 21]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 22]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 23]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 24]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 25]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 26]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 27, 'isImportant' => true]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 28]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 29]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 30]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 31]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 32]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 33]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 34, 'isImportant' => true]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 2, 'session_id' => 35]);


        Note::factory()->create(['user_id' => 13, 'patient_id' => 3, 'session_id' => 50]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 3, 'session_id' => 60]);

        Note::factory()->create(['user_id' => 13, 'patient_id' => 4, 'session_id' => 75, 'isImportant' => true]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 4, 'session_id' => 76]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 4, 'session_id' => 74]);

        Note::factory()->create(['user_id' => 13, 'patient_id' => 8, 'session_id' => 106]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 8, 'session_id' => 107]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 8, 'session_id' => 108]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 8, 'session_id' => 109, 'isImportant' => true]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 8, 'session_id' => 110]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 8, 'session_id' => 111, 'isImportant' => true]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 8, 'session_id' => 112]);
        Note::factory()->create(['user_id' => 13, 'patient_id' => 8, 'session_id' => 113]);
        
       
        Publication::factory()->create(['title' => 'A a abstract', 'image' => 'https://www.solidbackgrounds.com/images/640x480/640x480-yellow-solid-color-background.jpg']);
        Publication::factory()->create(['title' => 'A a abstraction', 'image' => 'https://www.solidbackgrounds.com/images/640x480/640x480-cherry-solid-color-background.jpg']);
        Publication::factory()->create(['title' => 'A a abstractions', 'image' => 'https://www.solidbackgrounds.com/images/640x480/640x480-red-solid-color-background.jpg']);
        Publication::factory()->create(['title' => 'A a abstractions and delirium', 'image' => 'https://i.pinimg.com/originals/57/cb/d4/57cbd473546bb9a533bb18df853f6a71.jpg']);
        Publication::factory()->create(['title' => 'A a abstractions and deliriums', 'image' => 'https://www.xmple.com/wallpaper/solid-color-azure-plain-one-colour-single-640x480-c-142f6a-f-24.svg']);
        Publication::factory()->create(['title' => 'A a abstractions and deliriums tremens', 'image' => 'https://www.solidbackgrounds.com/images/640x480/640x480-green-pigment-solid-color-background.jpg']);
        Publication::factory()->create(['title' => 'A a absurdity', 'image' => 'https://www.paintscratch.com/content/images/swatches/Dark-Cherry-Pearl-Clearcoat-2007-Honda-Ridgeline-730B10.jpg']);
        Publication::factory()->create(['title' => 'A a absurdity and unconsciousness', 'image' => 'https://www.solidbackgrounds.com/images/640x480/640x480-chrome-yellow-solid-color-background.jpg']);

        Publication::factory()->create(['title' => 'A ab absurdity', 'image' => 'https://www.solidbackgrounds.com/images/640x480/640x480-gray-solid-color-background.jpg']);
        Publication::factory()->create(['title' => 'A a absurdity and unconsciousnesssss', 'image' => 'https://www.solidbackgrounds.com/images/640x480/640x480-gray-solid-color-background.jpg']);
        Publication::factory()->create(['title' => 'A ab absurdity and unconsciousness', 'image' => 'https://www.solidbackgrounds.com/images/640x480/640x480-smoky-black-solid-color-background.jpg']);
        Publication::factory()->create(['title' => 'A ab absurdity alone', 'image' => 'https://www.solidbackgrounds.com/images/640x480/640x480-red-solid-color-background.jpg']);

        Publication::factory()->create(['title' => 'A ab absurdities', 'image' => 'https://www.solidbackgrounds.com/images/640x480/640x480-yellow-solid-color-background.jpg']);
        Publication::factory()->create(['title' => 'A ab absurdities and loneliness', 'image' => 'https://www.solidbackgrounds.com/images/640x480/640x480-cherry-solid-color-background.jpg']);
        Publication::factory()->create(['title' => 'A ab absurdities and abstractions', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Green_Colour.jpg/640px-Green_Colour.jpg']);

        Publication::factory(3000)->create();

        Product::factory(100)->create();

    }
}
