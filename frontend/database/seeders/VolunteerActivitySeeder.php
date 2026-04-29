<?php

namespace Database\Seeders;

use App\Models\VolunteerActivity;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class VolunteerActivitySeeder extends Seeder
{
    public function run(): void
    {
        $activities = [
            [
                'title' => 'Beach Cleanup at Palolem',
                'description' => 'Join us for a weekend beach cleanup at beautiful Palolem Beach. We will be collecting plastic waste and educating tourists about responsible tourism. Equipment and refreshments provided.',
                'location' => 'Palolem Beach, Goa',
                'event_date' => Carbon::now()->addDays(7),
                'start_time' => '08:00',
                'end_time' => '12:00',
                'max_participants' => 20,
                'status' => 'active',
            ],
            [
                'title' => 'Tree Plantation Drive - Aravalli',
                'description' => 'Help restore the Aravalli range by planting native tree species. This is part of our ongoing reforestation project. Morning session includes training on sapling planting techniques.',
                'location' => 'Aravalli Hills, Gurugram, Haryana',
                'event_date' => Carbon::now()->addDays(14),
                'start_time' => '07:00',
                'end_time' => '13:00',
                'max_participants' => 30,
                'status' => 'active',
            ],
            [
                'title' => 'Heritage Site Documentation - Hampi',
                'description' => 'Help document lesser-known monuments in the Hampi complex. Work involves photography, measurement, and data recording. History enthusiasts and photographers welcome!',
                'location' => 'Hampi, Karnataka',
                'event_date' => Carbon::now()->addDays(21),
                'start_time' => '09:00',
                'end_time' => '17:00',
                'max_participants' => 10,
                'status' => 'active',
            ],
            [
                'title' => 'Wildlife Conservation Workshop',
                'description' => 'Learn about local wildlife conservation efforts and help set up camera traps for tiger monitoring. Expert naturalists will guide the session.',
                'location' => 'Jim Corbett National Park, Uttarakhand',
                'event_date' => Carbon::now()->addDays(10),
                'start_time' => '06:00',
                'end_time' => '18:00',
                'max_participants' => 15,
                'status' => 'active',
            ],
            [
                'title' => 'Village School Teaching',
                'description' => 'Spend a day teaching basic English and environmental awareness at a rural school in the Western Ghats. Interactive games and activities planned.',
                'location' => 'Matheran, Maharashtra',
                'event_date' => Carbon::now()->addDays(5),
                'start_time' => '10:00',
                'end_time' => '15:00',
                'max_participants' => 8,
                'status' => 'active',
            ],
            [
                'title' => 'Coral Reef Monitoring - Andaman',
                'description' => 'Assist marine biologists in coral reef health assessment. Activities include underwater surveys and data collection. Scuba certification required.',
                'location' => 'Havelock Island, Andaman & Nicobar',
                'event_date' => Carbon::now()->addDays(30),
                'start_time' => '08:00',
                'end_time' => '14:00',
                'max_participants' => 6,
                'status' => 'active',
            ],
            [
                'title' => 'Trek Trail Maintenance - Triund',
                'description' => 'Help maintain the popular Triund trek trail by clearing debris and marking safe paths. Essential work for monsoon season preparation.',
                'location' => 'McLeod Ganj, Himachal Pradesh',
                'event_date' => Carbon::now()->addDays(3),
                'start_time' => '07:00',
                'end_time' => '14:00',
                'max_participants' => 25,
                'status' => 'active',
            ],
            [
                'title' => 'Mangrove Restoration - Sundarbans',
                'description' => 'Participate in mangrove plantation drive to protect the delicate ecosystem of Sundarbans. Learn about mangrove ecology from local experts.',
                'location' => 'Sundarbans, West Bengal',
                'event_date' => Carbon::now()->addDays(25),
                'start_time' => '08:00',
                'end_time' => '13:00',
                'max_participants' => 12,
                'status' => 'active',
            ],
        ];

        foreach ($activities as $activity) {
            VolunteerActivity::create($activity);
        }
    }
}
