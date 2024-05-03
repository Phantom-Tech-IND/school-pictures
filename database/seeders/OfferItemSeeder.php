<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\OfferItem;
use App\Models\Offers;

class OfferItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/data/offer_items.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            OfferItem::create([
                'offer_id' => $obj->offer_id,
                'name' => $obj->name,
                'description' => $obj->description,
                'price' => $obj->price,
                'is_popular' => $obj->is_popular,
                'custom_attributes' => json_decode($obj->custom_attributes, true),
            ]);
        }
    }
}
