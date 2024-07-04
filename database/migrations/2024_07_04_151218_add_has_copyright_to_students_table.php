<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('student_photos', function (Blueprint $table) {
            $table->boolean('has_copyright')->default(false)->nullable(false)->after('student_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_photos', function (Blueprint $table) {
            $table->dropColumn('has_copyright');
        });
    }
};
