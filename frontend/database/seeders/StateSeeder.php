<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\State;
use Illuminate\Support\Str;

class StateSeeder extends Seeder
{
    public function run(): void
    {
        $states = [
            'Andhra Pradesh', 'Arunachal Pradesh', 'Assam', 'Bihar', 'Chhattisgarh',
            'Goa', 'Gujarat', 'Haryana', 'Himachal Pradesh', 'Jharkhand',
            'Karnataka', 'Kerala', 'Madhya Pradesh', 'Maharashtra', 'Manipur',
            'Meghalaya', 'Mizoram', 'Nagaland', 'Odisha', 'Punjab',
            'Rajasthan', 'Sikkim', 'Tamil Nadu', 'Telangana', 'Tripura',
            'Uttar Pradesh', 'Uttarakhand', 'West Bengal'
        ];

        foreach ($states as $stateName) {
            State::updateOrCreate(
                ['name' => $stateName],
                [
                    'slug' => Str::slug($stateName),
                    'description' => "Explore the vibrant culture and heritage of {$stateName}.",
                    'image' => 'https://source.unsplash.com/800x600/?' . Str::slug($stateName) . ',india,landscape'
                ]
            );
        }
    }
}
