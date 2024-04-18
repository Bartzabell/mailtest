<?php

namespace Database\Seeders;

use App\Models\ClinicInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomepageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ClinicInformation::create([
            'name' => 'Subtitle',
            'content' => 'Your oral health impacts your whole body, not just your smile.',
            'type' => 'subtitle',
        ]);

        ClinicInformation::create([
            'name' => 'About the Clinic',
            'content' => 'Hugo-Foronda Dental Clinic was established in the year 2002.',
            'type' => 'about',
        ]);

        ClinicInformation::create([
            'name' => 'Orthodontics',
            'content' => 'Orthodontics is a dental specialty focused on aligning your bite and straightening your teeth. You might need to see an orthodontist if you have crooked, overlapped, twisted or gapped teeth. Common orthodontic treatments include traditional braces, clear aligners and removable retainers.',
            'type' => 'services',
        ]);

        ClinicInformation::create([
            'name' => 'Prosthodontics',
            'content' => 'Prosthodontics is the branch of dentistry focused on making dental prostheses. A prosthodontist specializes in making dentures, crowns, bridges and other custom-made oral appliances.',
            'type' => 'services',
        ]);

        ClinicInformation::create([
            'name' => 'Endodontics',
            'content' => 'Endodontics is the branch of dentistry concerning dental pulp and tissues surrounding the roots of a tooth. “Endo” is the Greek word for “inside” and “odont” is Greek for “tooth.” Endodontic treatment, or root canal treatment, treats the soft pulp tissue inside the tooth.',
            'type' => 'services',
        ]);
    }
}
