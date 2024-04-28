<?php

namespace Database\Seeders;


use App\Models\Offers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class OfferSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get("database/data/offers.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            $model = new Offers([
                'title' => $obj->title,
                'image' => $obj->image,
                'photo_gallery' => json_decode($obj->photo_gallery, true),
            ]);
            $model->id = $obj->id;
            $model->save();
        }
    }
}
