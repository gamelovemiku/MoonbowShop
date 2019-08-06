<?php

use Illuminate\Database\Seeder;

class DefaultItemshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('itemshop')->insert([
            [
            'item_name' => 'Diamond',
            'item_desc' => 'Strongest Material!',
            'item_image_path' => 'diamond.png',
            'item_price' => '80',
            'item_category' => '1',
            'item_command' => 'say %player is bought Diamond!',
            'item_sold' => '0',
            ],
            [
            'item_name' => 'Gold Ingot',
            'item_desc' => 'Useful Ores!',
            'item_image_path' => 'gold.png',
            'item_price' => '40',
            'item_category' => '1',
            'item_command' => 'say %player is bought Gold Ingot!',
            'item_sold' => '0',
            ]
        ]);
    }
}
