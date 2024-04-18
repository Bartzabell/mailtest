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
        //
        Schema::table('users_data', function (Blueprint $table) {
            $table->foreignId('province_id')->constrained('philippine_provinces');
            $table->foreignId('city_id')->constrained('philippine_cities');
            $table->foreignId('barangay_id')->constrained('philippine_barangays');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
