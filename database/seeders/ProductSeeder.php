<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        $json = File::get('database/data/products.json');
        $data = json_decode($json);
        foreach ($data as $product) {
            Product::create([
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'images' => json_decode($product->images), // Assuming you want the first image
                'product_type' => $product->product_type,
                'additional_information' => $product->additional_information,
                'created_at' => $product->created_at,
                'updated_at' => $product->updated_at,
                'custom_attributes' => json_decode($product->custom_attributes) // Storing custom attributes as JSON string
            ]);
        }

        $from = database_path('storage/products/');
        $to = database_path('storage/product-images/');
        File::copyDirectory($from, $to);

        $categoriesRelationJson = File::get('database/data/category_product.json');
        $categoriesRelation = json_decode($categoriesRelationJson);

        foreach ($categoriesRelation as $categoryRelation) {
            $product = Product::find($categoryRelation->product_id);
            $product->categories()->attach($categoryRelation->category_id);
        }
    }
}

