<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $from = database_path("storage/kindergarden");
        $to = public_path("media/kindergarden");

        File::copyDirectory($from, $to);

        $from = database_path("storage/school");
        $to = public_path("media/school");

        File::copyDirectory($from, $to);

        Artisan::call('parse:student-photos');
    }
}
