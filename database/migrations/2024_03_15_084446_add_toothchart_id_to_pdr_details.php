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
        Schema::table('pdr_details', function (Blueprint $table) {
            //
            $table->foreignId('toothchart_id')->nullable()->constrained('toothchart');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pdr_details', function (Blueprint $table) {
            //
            $table->dropForeign(['toothchart_id']);
            $table->dropColumn('toothchart_id');
        });
    }
};
