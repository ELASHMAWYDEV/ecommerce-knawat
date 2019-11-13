<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\User::create([
        'firstname'=>'amine',
         'lastname'=>'ayat',
         'email'=>'ayat@gmail.com',
         'password'=>bcrypt('123456'),
         'phone'=>'03515656565',
         'address'=>'adrar algeria',
         'email_verification'=>true,
       ]);
       \App\BillingInfo::create([
         'user_id'=>1,
         'img'=>'avatar.png',
         'address_line1'=>'boudare',
         'address_line2'=>'laghma',
         'city'=>'adrea',
         'country'=>'Algeria',
         'state'=>'addrea',
         'postcode'=>'01055',
       ]);
    }
}
