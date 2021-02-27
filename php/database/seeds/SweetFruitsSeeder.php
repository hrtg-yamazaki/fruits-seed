<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SweetFruitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            ['name'  => 'banana',     'price' => 58],
            ['name'  => 'peach',      'price' => 198],
            ['name'  => 'grape',      'price' => 500],
        ];
        DB::table('fruits')->insert($params);
    }
}
