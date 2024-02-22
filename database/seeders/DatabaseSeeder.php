<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            'name' => 'Member User',
            'email' => 'member@example.com',
            'password' => Hash::make('password'),
            'usertype' => 0,
            'role' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Admin
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'usertype' => 1,
            'role' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            
        ]);

        // Superadmin
        DB::table('users')->insert([
            'name' => 'Superadmin User',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
            'usertype' => 2,
            'role' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \App\Models\User::factory(50)->create();
     
    }
}
