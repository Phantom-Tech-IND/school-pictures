<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $json = File::get('database/data/categories.json');
        $data = json_decode($json);

        foreach ($data as $obj) {
            \App\Models\Category::create(array(
                'id' => $obj->id,
                'name' => $obj->name,
                'slug' => $obj->slug,
                'image' => $obj->image,
                'description' => $obj->description
            ));
        }

        $from = database_path('storage/categories');
        $to = storage_path('app/public/categories');

        File::copyDirectory($from, $to);
    }
}
