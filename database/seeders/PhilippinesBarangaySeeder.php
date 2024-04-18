<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhilippinesBarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if(!DB::table('philippine_barangays')->count()){
            DB::unprepared(file_get_contents('mailtest\database\seeder\sql\philippine_barangays.sql'));
        }
    }
}
