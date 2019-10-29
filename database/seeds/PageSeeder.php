<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Pages::create([
            'slug'=>'about_us',
            'description'=>'  Lorem ipsum dolor sit amet consectetur
             adipisicing elit. Nostrum repellendus, dolores facilis facere
             quia pariatur asperiores praesentium vitae et neque sapiente sed, maiores deserunt
             voluptas sit dicta! Fugit, alias corporis.',
             'description_ar'=>'هدا مثال لنص يمكن ان يستبدل في أي وقت '
        ]);
        \App\Pages::create([
            'slug'=>'terms',
            'description'=>'  Lorem ipsum dolor sit amet consectetur
             adipisicing elit. Nostrum repellendus, dolores facilis facere
             quia pariatur asperiores praesentium vitae et neque sapiente sed, maiores deserunt
             voluptas sit dicta! Fugit, alias corporis.',
             'description_ar'=>'هدا مثال لنص يمكن ان يستبدل في أي وقت '
        ]);
        \App\Pages::create([
            'slug'=>'faq',
            'description'=>'  Lorem ipsum dolor sit amet consectetur
             adipisicing elit. Nostrum repellendus, dolores facilis facere
             quia pariatur asperiores praesentium vitae et neque sapiente sed, maiores deserunt
             voluptas sit dicta! Fugit, alias corporis.',
             'description_ar'=>'هدا مثال لنص يمكن ان يستبدل في أي وقت '
        ]);
    }
}
