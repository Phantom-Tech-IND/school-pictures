<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class StorageSeeder extends Seeder
{
    public function run(): void
    {
        $from = database_path('storage/offers');
        $to = storage_path('app/public/offers');

        File::copyDirectory($from, $to);
    }
}