<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Order;
use Illuminate\Database\Seeder; // Ensure the Order model is imported

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = Contact::all();
        Order::factory(50)->create()->each(function ($order) use ($contacts) {
            $order->contact_id = $contacts->random()->id;
            $order->save();
        }); // Creates 50 order records
    }
}
