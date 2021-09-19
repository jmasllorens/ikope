<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(['name' => 'admin', 'email' => 'admin@admin.com', 'isAdmin'=>true]);
        User::factory()->create(['name' => 'user', 'email' => 'user@user.com']);

    }
}
