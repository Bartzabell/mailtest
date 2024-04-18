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
        Schema::create('pdr_details', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_time_rendered');
            $table->foreignId('pdr_id')->constrained('patient_dental_records');
            $table->foreignId('service_id')->constrained('services');
            $table->longText('doctors_remark')->nullable(true);
            $table->string('image');
            $table->decimal('price', 9, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdr_details');
    }
};
