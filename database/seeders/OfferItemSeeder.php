<?php

namespace Database\Seeders;

use App\Models\OfferItem;
use App\Models\Offers;
use Illuminate\Database\Seeder;

class OfferItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $offers = Offers::all();

        foreach ($offers as $offer) {
            OfferItem::factory()
                ->count(5) // Generate 5 items per offer
                ->create([
                    'offer_id' => $offer->id,
                ]);
        }
    }
}
