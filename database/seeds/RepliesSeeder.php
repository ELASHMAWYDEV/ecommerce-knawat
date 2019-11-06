<?php

use Illuminate\Database\Seeder;

class RepliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        \App\Reply::create([
            'user_id'=>1,
            'ticket_id'=>1,
            'from_admin'=>0,
            'content'=>'this is just a simple reply it can be replaced in any time',
            'exfile'=>'ticketsfile.PNG'
        ]);
    }
}
