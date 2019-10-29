<?php

use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Ticket::create([
          'title'=>'استفسار',
          'user_id'=>1,
          'content'=>'استفسار بشأن بعض المنتجات استفسار بشأن بعض المنتجات استفسار بشأن بعض المنتجات
          استفسار بشأن بعض المنتجات ',
          'exfile'=>'ticketsfile.png',
          'type'=>'r'
        ]);
        \App\Ticket::create([
          'title'=>'مشكلة في اضافة منتج الى الكارد',
          'user_id'=>1,
          'content'=>'مرحبا لدي مشكلة في اضافة منتج الى المفضلة في كل مرة ارجوا النظر في المشكل',
          'type'=>'r'
        ]);
    }
}
