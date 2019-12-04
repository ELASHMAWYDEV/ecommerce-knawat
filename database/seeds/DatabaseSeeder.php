<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
         $this->call(SettingSeeder::class);
         $this->call(UserSeeder::class);
         $this->call(PageSeeder::class);
         $this->call(TicketSeeder::class);
         $this->call(RepliesSeeder::class);
         $this->call(AdminSeeder::class);
    }
}
