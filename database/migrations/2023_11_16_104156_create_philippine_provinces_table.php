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
        Schema::create('philippine_provinces', function (Blueprint $table) {
            $table->id();
            $table->string('psgc_code');
            $table->string('province_description');
            $table->string('region_code');
            $table->string('province_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('philippine_provinces');
    }
};
