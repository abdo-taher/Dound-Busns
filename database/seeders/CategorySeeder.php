<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Football', 'desc' => 'Football sports category', 'image' => 'images/play/football.png'],
            ['name' => 'Basketball', 'desc' => 'Basketball sports category', 'image' => 'images/play/basketball.png'],
            ['name' => 'Tennis', 'desc' => 'Tennis sports category', 'image' => 'images/play/tennis.png'],
            ['name' => 'Bowling', 'desc' => 'Bowling sports category', 'image' => 'images/play/bowling.png'],
            ['name' => 'Baseball', 'desc' => 'Baseball sports category', 'image' => 'images/play/baseball.png'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        $categories = [
            ['name' => 'sprots', 'desc' => 'sprots category', 'image' => 'football.jpg'],
            ['name' => 'technology', 'desc' => 'technology  category', 'image' => 'technology.jpg'],
            ['name' => 'clothes', 'desc' => 'clothes category', 'image' => 'clothes.jpg'],
            ['name' => 'shoses', 'desc' => 'shoses category', 'image' => 'shoses.jpg'],
        ];

        foreach ($categories as $category) {
            CategoryProduct::create($category);
        }
    }
}
