<?php

use Illuminate\Database\Seeder;

class ForumCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forum_categories')->insert([
            [
                'forum_category_name' => 'News',
                'forum_category_description' => 'ข่าวสารเกี่ยวกับเกม Minecraft',
            ],
            [
                'forum_category_name' => 'General',
                'forum_category_description' => 'พูดคุยเรื่องทั่วไป',
            ],
            [
                'forum_category_name' => 'Report',
                'forum_category_description' => 'แจ้งปัญหาที่พบในการเล่นหรือใช้งานเว็บไซต์',
            ],
            [
                'forum_category_name' => 'Marketplaces',
                'forum_category_description' => 'ประกาศขายของในเกม หรือ บอกให้คนอื่นรู้ว่าคุณเปิดร้านค้าอยู่ภายในเกม',
            ]
        ]);
    }
}
