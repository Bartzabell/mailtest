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
        Schema::table('clinic_information', function (Blueprint $table) {
            $table->dropColumn('about');
            $table->dropColumn('mission');
            $table->dropColumn('vision');
            $table->longText('name')->nullable(true);
            $table->longText('content')->nullable(true);
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
