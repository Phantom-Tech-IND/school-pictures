<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@schoolpictures.com',
            'password' => bcrypt('parola123'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Martina',
            'email' => 'martina@schoolpictures.com',
            'password' => bcrypt('Password123!!'),
        ]);

        \App\Models\Institution::factory(2)->create();
        \App\Models\Student::factory()->create([
            'name' => 'Morris Schoen DDS',
            'birth_date' => '2004-05-21',
            'institution_id' => 1,
        ]);

        \App\Models\Student::factory()->create([
            'name' => 'Drew Veum',
            'birth_date' => '2005-08-30',
            'institution_id' => 1,
        ]);

        \App\Models\Offers::factory(10)->create();
        \App\Models\Student::factory()->create([
            'name' => 'Easton Marquardt',
            'birth_date' => '2003-11-15',
            'institution_id' => 1,
        ]);

        $this->call([
            ProductSeeder::class,
        ]);

    }
}
