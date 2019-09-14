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
    }
}
