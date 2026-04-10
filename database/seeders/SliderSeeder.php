<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Slider::create(['image' => 'images/sport/1.jpg']);
        Slider::create(['image' => 'images/sport/2.jpg']);
        Slider::create(['image' => 'images/sport/3.jpg']);
        Slider::create(['image' => 'images/sport/4.jpg']);
    }
}
