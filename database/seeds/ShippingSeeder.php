<?php

use Illuminate\Database\Seeder;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Shipping::create([
            'company_id'=>1,
            'country'=>'Algeria',
            'weight'=>0.5,
            'price'=>18
        ]);
        \App\Shipping::create([ 
            'company_id'=>2,
            'country'=>'Algeria',
            'weight'=>1,
            'price'=>23.1
        ]);
        \App\Shipping::create([
            'company_id'=>3,
            'country'=>'Algeria',
            'weight'=>1,
            'price'=>22
        ]);
    }
}
