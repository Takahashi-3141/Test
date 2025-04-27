<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'product_id' => 1,
            'season_id' => 3,
        ];
        DB::table('product_season')->insert($param);

        $param = [
            'product_id' => 1,
            'season_id' => 4,
        ];
        DB::table('product_season')->insert($param);

        $param = [
            'product_id' => 2,
            'season_id' => 1,
        ];
        DB::table('product_season')->insert($param);
        $param = [
            'product_id' => 3,
            'season_id' => 4,
        ];
        DB::table('product_season')->insert($param);
    }
}
