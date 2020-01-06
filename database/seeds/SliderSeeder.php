<?php

use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        \App\Slider::create([
            'image'=>'home1.jpg',
            'title'=>'short title',
         ]);
         \App\Slider::create([
            'image'=>'home2.jpg',
            'title'=>'short title',
         ]);
         \App\Slider::create([
            'image'=>'mobilec.jpg',
            'title'=>'short title',
         ]);
    }
}
