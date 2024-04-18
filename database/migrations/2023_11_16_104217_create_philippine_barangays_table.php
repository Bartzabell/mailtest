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
        Schema::create('philippine_barangays', function (Blueprint $table) {
            $table->id();
            $table->string('barangay_code');
            $table->string('barangay_description');
            $table->string('region_code');
            $table->string('province_code');
            $table->string('city_municipality_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('philippine_barangays');
    }
};
