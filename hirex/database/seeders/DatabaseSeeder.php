<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        Role::truncate();
        $adminRole = Role::create(['name'=> 'admin']);
        $admin = User::create([
            'name'=> 'admin',
            'email'=> 'nababurdev@gmail.com',
            'user_type'=> 'admin',
            'status'=> '1',
            'password'=> bcrypt('nababurdev123'),
            'email_verified_at'=> NOW()
        ]);

        $admin->roles()->attach($adminRole);

    }
    
}
