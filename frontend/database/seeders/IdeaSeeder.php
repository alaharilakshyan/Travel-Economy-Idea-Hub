<?php

namespace Database\Seeders;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Database\Seeder;

class IdeaSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        
        if ($users->isEmpty()) {
            $this->command->info('No users found. Skipping idea seeding.');
            return;
        }

        $ideas = [
            [
                'title' => 'Hidden Waterfall Trek in Munnar',
                'description' => 'Discovered a secret waterfall trail about 3km from the main Munnar town. The path is unmarked but starts near the old tea estate. Perfect for morning hikes, best visited during monsoon (June-September). The waterfall is pristine with minimal tourists!',
                'category' => 'adventure',
                'location' => 'Munnar, Kerala',
                'status' => 'approved',
                'user_id' => $users->first()->id,
            ],
            [
                'title' => 'Street Food Tour - Chandni Chowk',
                'description' => 'The best parathas are NOT at the famous paranthe wali gali but at a small stall near Fatehpuri Masjid. Also try the kulfi at Kuremal Mohan Lal Kulfi Wale - amazing stuffed fruit kulfi! Start early morning (7AM) to avoid crowds.',
                'category' => 'food',
                'location' => 'Old Delhi, Delhi',
                'status' => 'approved',
                'user_id' => $users->first()->id,
            ],
            [
                'title' => 'Budget Beach Stay in Gokarna',
                'description' => 'Skip the expensive resorts! Stay at the local homestays near Kudle Beach for ₹800-1200/night. They offer authentic Konkani food and the hosts arrange bonfires on the beach. Clean rooms with basic amenities.',
                'category' => 'budget',
                'location' => 'Gokarna, Karnataka',
                'status' => 'approved',
                'user_id' => $users->first()->id,
            ],
            [
                'title' => 'Sunrise at Tiger Hill - Best View',
                'description' => 'Tiger Hill in Darjeeling offers breathtaking sunrise views of Kanchenjunga. Tip: Book a private taxi the night before (shared ones get crowded). Carry warm clothes even in summer - it gets very cold at 4AM!',
                'category' => 'mountain',
                'location' => 'Darjeeling, West Bengal',
                'status' => 'approved',
                'user_id' => $users->first()->id,
            ],
            [
                'title' => 'Heritage Walk in Ahmedabad Old City',
                'description' => 'The pols (historic residential clusters) of Ahmedabad are a UNESCO heritage site. Take the guided heritage walk that starts at Swaminarayan Mandir at 8AM every day. See traditional wooden houses, step wells, and learn about the unique architecture.',
                'category' => 'heritage',
                'location' => 'Ahmedabad, Gujarat',
                'status' => 'approved',
                'user_id' => $users->first()->id,
            ],
            [
                'title' => 'Backwater Homestay in Alleppey',
                'description' => 'Instead of expensive houseboats, try a homestay along the backwaters. You get authentic Kerala meals, canoe rides through narrow canals, and can experience village life. Much more affordable and authentic than the touristy houseboat packages.',
                'category' => 'budget',
                'location' => 'Alleppey, Kerala',
                'status' => 'pending',
                'user_id' => $users->first()->id,
            ],
            [
                'title' => 'Wildlife Safari at Tadoba',
                'description' => 'Tadoba National Park in Maharashtra has excellent tiger sightings! Book the morning safari (better chances). Stay at MTDC resort for budget option or Tadoba Tiger King Resort for luxury. Best time: February to May.',
                'category' => 'wildlife',
                'location' => 'Tadoba, Maharashtra',
                'status' => 'approved',
                'user_id' => $users->first()->id,
            ],
            [
                'title' => 'Rooftop Restaurants in Udaipur',
                'description' => 'The view of Lake Pichola from rooftop restaurants is magical! Try Upre by 1559 AD or Ambrai Restaurant. Book a table for sunset hours (6-7:30PM). The city palace illuminated at night looks stunning from these spots.',
                'category' => 'city',
                'location' => 'Udaipur, Rajasthan',
                'status' => 'approved',
                'user_id' => $users->first()->id,
            ],
        ];

        foreach ($ideas as $idea) {
            Idea::create($idea);
        }
    }
}
