<?php

use Illuminate\Database\Seeder;

class TopicCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forum_comments')->insert([
            [
                'topic_id' => 1,
                'comment_author_id' => 1,
                'comment_content' => 'นั่นสินะ อย่าให้รู้นะ.. เดี๋ยวปั๊ดทุ่มด้วยโพเดี้ยมแล้วเควี้ยงไปสามเหลี่ยมอิลุมินาติหรอก',
            ],
            [
                'topic_id' => 2,
                'comment_author_id' => 1,
                'comment_content' => 'เอาสาวฟ้าใสมาอยู้ในกรุงเทพสิครับ ผมไม่ตกแน่นอน รับประกันนนนนน',
            ],
            [
                'topic_id' => 2,
                'comment_author_id' => 1,
                'comment_content' => 'ผมว่านะครับทุกคน ตอนนี้รีบเก็บของขึ้นที่สูงดีกว่า เดี๋ยวมันทะลักมาแล้วจะเก็บของไม่ทัน',
            ],
            [
                'topic_id' => 2,
                'comment_author_id' => 1,
                'comment_content' => 'ระวังลุงตู้เอามาอ่านนะครับ',
            ],
            [
                'topic_id' => 2,
                'comment_author_id' => 1,
                'comment_content' => 'เดี๋ยวเอาฟองน้ำดูดน้ำให้ครับผม //หลบตรีนแปปป',
            ]
        ]);
    }
}
