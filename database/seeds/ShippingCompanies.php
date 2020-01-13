<?php

use Illuminate\Database\Seeder;

class ShippingCompanies extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\ShippingCompanies::create([
            'company_name'=>'standard',
            'state'=>true
        ]);
        \App\ShippingCompanies::create([
            'company_name'=>'TNT'
        ]);
        \App\ShippingCompanies::create([
            'company_name'=>'DHL',
        ]);
    }
}
