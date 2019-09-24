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
                'category_icon' => 'creation',
            ],
            [
                'category_name' => 'Ores',
                'category_icon' => 'diamond',
            ],
            [
                'category_name' => 'Rank',
                'category_icon' => 'trophy-outline',
            ]
        ]);
    }
}
