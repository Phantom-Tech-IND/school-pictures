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
            'role' => 'admin',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Martina',
            'email' => 'martina@schoolpictures.com',
            'password' => bcrypt('Password123!!'),
            'role' => 'admin',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test',
            'email' => env('MAIL_FROM_ADDRESS'),
            'password' => bcrypt('Password123!!'),
            'role' => 'admin',
        ]);

        $this->call([
            CategorySeeder::class,
            StorageSeeder::class,
            OfferSeeder::class,
            OfferItemSeeder::class,
            ProductSeeder::class,
            StudentSeeder::class,
        ]);

    }
}
