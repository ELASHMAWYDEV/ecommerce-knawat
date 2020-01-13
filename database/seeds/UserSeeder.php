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
         'email'=>'ahmed.7ahmedali@gmail.com',
         'password'=>bcrypt('123456'),
         'phone'=>'0664419425',
         'address'=>'adrar algeria',
         'email_verification'=>true,
       ]);
       \App\BillingInfo::create([
         'user_id'=>1,
         'img'=>'avatar.png',
         'address_line1'=>'bouda',
         'address_line2'=>'laghmara',
         'city'=>'adrar',
         'country'=>'Algeria',
         'state'=>'adrar',
         'postcode'=>'01057',
       ]);
    }
}
