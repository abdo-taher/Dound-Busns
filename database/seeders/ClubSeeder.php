<?php

namespace Database\Seeders;

use App\Models\Club;
use App\Models\Vendor;
use App\Models\Package;
use App\Models\Category;
use App\Models\Club\Branch;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ar_SA'); // Arabic locale for Saudi Arabia

        for ($i = 1; $i <= 10; $i++) {
            $club = Club::create([
                'name' => "نادي " . $faker->company,
                'email' => 'club' . $i . '@admin.com',
                'mobile' => $faker->phoneNumber,
                'password' => Hash::make('12345678'),
                'img' => 'images/sport/' . $faker->numberBetween(1, 10) . '.jpg',
                'is_active' => true,
                'country_id' => 3,
            ]);

            // Create branches for the club
            for ($j = 1; $j <= 10; $j++) {
                $branch = Branch::create([
                    'name' => "فرع " . $faker->city,
                    'club_id' => $club->id,
                    'city_id' => 3, // Riyadh
                    'lat' => $faker->latitude(24.5, 25),
                    'lng' => $faker->longitude(46.5, 47),
                    'location' => 'Riyadh, Saudi Arabia',
                    'balance' => $faker->randomFloat(2, 0, 10000),
                ]);

                // Create or assign random categories
                $categories = Category::inRandomOrder()->limit(3)->get(); // Get 3 random categories
                foreach ($categories as $category) {
                    // Create ClubCategory entries
                    DB::table('club_categories')->insert([
                        'club_id' => $club->id,
                        'category_id' => $category->id,
                        'duration' => $faker->numberBetween(30, 120), // Random duration
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    // Create type_categories for each branch
                    for ($k = 1; $k <= 5; $k++) {
                        DB::table('type_categories')->insert([
                            'name' => "ملعب " . $faker->lexify('??????'),
                            'code' => $faker->unique()->lexify('??????'),
                            'img' => 'images/sport/' . $faker->numberBetween(1, 10) . '.jpg',
                            'size' => $faker->randomElement(['7x7', '10x10', '15x15']),
                            'type' => $faker->randomElement(['Male', 'Female', 'Max']),
                            'grass_type' => $faker->randomElement(['طبيعي', 'صناعي']),
                            'price' => $faker->numberBetween(50, 200),
                            'branch_id' => $branch->id,
                            'category_id' => $category->id,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }

            // Add subscription for the club
            $package = Package::where("type", "club")->latest()->first();
            if ($package) {
                $club->subscriptions()->create([
                    'amount' => $package->price,
                    'package_id' => $package->id,
                    'start_date' => now(),
                    'end_date' => $package->time == -1 ? null : now()->addMonths($package->time),
                ]);
            }
        }

        // Vendors and packages
        $vendor1 = Vendor::create([
            'name' => 'vendor',
            'email' => 'vendor@yahoo.com',
            'mobile' => '1234567890',
            'password' => Hash::make('password'),
            'img' => 'path/to/image.jpg',
            'is_active' => true,
            'lng' => 46.6753,
            'lat' => 24.7136,
            'location' => 'Riyadh, Saudi Arabia'
        ]);

        $package = Package::where("type", "vendor")->latest()->first();

        if ($package) {
            $vendor2 = Vendor::create([
                'name' => 'vendor2',
                'email' => 'vendor@gmail.com',
                'mobile' => '0987654321',
                'password' => Hash::make('password'),
                'img' => 'path/to/image2.jpg',
                'is_active' => false,
                'lng' => 50.5553,
                'lat' => 26.3335,
                'location' => 'Dammam, Saudi Arabia'
            ]);

            $vendor2->subscriptions()->create([
                'amount' => $package->price,
                'package_id' => $package->id,
                'start_date' => now(),
                'end_date' => $package->time == -1 ? null : now()->addMonths($package->time),
            ]);
        }
    }
}
