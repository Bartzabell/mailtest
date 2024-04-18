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
        Schema::create('services_user_clinic_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('services_id')->constrained('services');
            $table->foreignId('user_clinic_records_id')->constrained('patient_dental_records');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_user_clinic_records');
    }
};
