<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('institutions')->insert([
            ['type' => 'kindergarten', 'name' => 'Sunny Kindergarten'],
            ['type' => 'school', 'name' => 'Greenfield School'],
            // Add more institutions as needed
        ]);
    }
}
