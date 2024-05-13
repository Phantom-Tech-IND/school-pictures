<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class StorageSeeder extends Seeder
{
    public function run(): void
    {
        $directories = [
            'offers', 'products', 'product-images', 'product-helper-image'
        ];

        foreach ($directories as $dir) {
            $from = database_path("storage/$dir");
            $to = storage_path("app/public/$dir");

            File::copyDirectory($from, $to);
        }

    }
}