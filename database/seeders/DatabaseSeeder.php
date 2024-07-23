<?php

namespace Database\Seeders;


use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Work;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Work::factory()->count(10)->create();

        User::create([
            'name' => 'employee',
            'email' => 'emp@gmail.com',
            'user_type' => 0,
            'password' => Hash::make('emp@1998'),  // Predefined password
        ]);

        User::create([
            'name' => 'employer',
            'email' => 'emplyr@gmail.com',
            'user_type' => 1,
            'password' => Hash::make('emplyr@1998'),  // Predefined password
        ]);
    }
}
