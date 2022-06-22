<?php

use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
   public function run()
    {
        DB::table('shops')->insert([
            'id' => 1,
            'name' => 'ミスド',
        ]);
        DB::table('shops')->insert([
            'id' => 2,
            'name' => 'マック',
        ]);
    }

}
