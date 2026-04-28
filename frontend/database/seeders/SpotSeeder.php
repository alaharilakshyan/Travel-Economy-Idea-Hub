<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Spot;
use App\Models\State;
use Illuminate\Support\Str;

class SpotSeeder extends Seeder
{
    public function run(): void
    {
        $spots = [
            [
                'state' => 'Rajasthan',
                'name' => 'Hawa Mahal',
                'category' => 'heritage',
                'description' => 'The Palace of Winds, a beautiful pink sandstone palace in Jaipur.',
                'lat' => 26.9239,
                'lng' => 75.8267,
            ],
            [
                'state' => 'Rajasthan',
                'name' => 'Thar Desert',
                'category' => 'nature',
                'description' => 'The Great Indian Desert offers amazing camel safaris and camping.',
                'lat' => 26.9157,
                'lng' => 70.9083,
            ],
            [
                'state' => 'Kerala',
                'name' => 'Alleppey Backwaters',
                'category' => 'nature',
                'description' => 'Famous for its houseboat cruises and tranquil canals.',
                'lat' => 9.4981,
                'lng' => 76.3388,
            ],
            [
                'state' => 'Kerala',
                'name' => 'Munnar Tea Gardens',
                'category' => 'nature',
                'description' => 'Lush green tea plantations spread across the Western Ghats.',
                'lat' => 10.0959,
                'lng' => 77.0584,
            ],
            [
                'state' => 'Maharashtra',
                'name' => 'Gateway of India',
                'category' => 'heritage',
                'description' => 'An arch monument overlooking the Arabian Sea in Mumbai.',
                'lat' => 18.9220,
                'lng' => 72.8347,
            ]
        ];

        foreach ($spots as $data) {
            $state = State::where('name', $data['state'])->first();
            if ($state) {
                Spot::updateOrCreate(
                    ['name' => $data['name']],
                    [
                        'state_id' => $state->id,
                        'slug' => Str::slug($data['name']),
                        'category' => $data['category'],
                        'description' => $data['description'],
                        'cover_image' => 'https://source.unsplash.com/800x600/?' . Str::slug($data['name']),
                        'latitude' => $data['lat'],
                        'longitude' => $data['lng'],
                        'rating_avg' => rand(40, 50) / 10,
                    ]
                );
            }
        }
    }
}
