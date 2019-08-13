<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('itemshop_category')->insert([
            [
                'category_name' => 'Default',
            ],
            [
                'category_name' => 'ores',
            ],
            [
                'category_name' => 'rank',
            ]
        ]);
    }
}
