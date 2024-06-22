<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FAQCategory;
use App\Models\FAQ;
use App\Constants\Constants;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Constants::FAQ_TABS as $category) {
            $faqCategory = FAQCategory::create(['name' => $category['name']]);

            foreach ($category['questions'] as $question) {
                FAQ::create([
                    'category_id' => $faqCategory->id,
                    'question' => $question['title'],
                    'answer' => $question['answer']
                ]);
            }
        }
    }
}
