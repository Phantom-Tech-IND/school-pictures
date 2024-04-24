<?php

namespace Database\Seeders;

use App\Models\Category;
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

        \App\Models\Message::factory(10)->create();
        \App\Models\Offers::factory(10)->create();

        Category::factory(4)->create();

        $this->call([
            ProductSeeder::class,
        ]);

    }
}
