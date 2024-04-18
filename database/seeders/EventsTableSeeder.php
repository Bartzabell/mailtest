<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventsTableSeeder extends Seeder
{
    public function run()
    {
        Event::create([
            'title' => 'Event 1',
            'start' => now(),
            'end' => now()->addHours(2),
        ]);

        Event::create([
            'title' => 'Event 2',
            'start' => now()->addDays(1),
            'end' => now()->addDays(1)->addHours(3),
        ]);

        // Add more events as needed
    }
}
