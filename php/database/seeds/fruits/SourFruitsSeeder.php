<?php

namespace Database\Seeds\Fruits;

use Illuminate\Database\Seeder;
use App\Models\Fruit;

class SourFruitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            ['name'  => 'kiwi',       'price' => 98],
            ['name'  => 'lemon',      'price' => 88],
            ['name'  => 'grapefruit', 'price' => 128],
        ];
        DB::table('fruits')->insert();
    }
}
