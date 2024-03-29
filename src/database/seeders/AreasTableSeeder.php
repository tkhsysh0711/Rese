<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'area_name' => '東京',
        ];
        DB::table('areas')->insert($param);

        $param = [
            'area_name' => '大阪',
        ];
        DB::table('areas')->insert($param);

        $param = [
            'area_name' => '福岡',
        ];
        DB::table('areas')->insert($param);
    }
}
