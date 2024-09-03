<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('application_status')->insert([
            ['name' => 'pending'],
            ['name' => 'accepted'],
            ['name' => 'rejected'],
        ]);
    }
}
