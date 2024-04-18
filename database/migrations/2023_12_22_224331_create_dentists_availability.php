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
        Schema::create('dentists_availability', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dentist_id')->constrained('dentists_data');
            $table->dateTime('date_time_start');
            $table->dateTime('date_time_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dentists_availability');
    }
};
