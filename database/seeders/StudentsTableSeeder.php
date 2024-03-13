<?php

namespace Database\Seeders;

use App\Models\Institution;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $institutionId = Institution::first()->id; // Get the first institution's ID

        DB::table('students')->insert([
            ['name' => 'John Doe', 'birth_date' => '2010-04-25', 'institution_id' => $institutionId],
            ['name' => 'Jane Doe', 'birth_date' => '2012-05-30', 'institution_id' => $institutionId],
        ]);
    }
}
