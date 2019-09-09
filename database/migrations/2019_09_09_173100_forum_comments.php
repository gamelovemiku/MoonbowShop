<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForumComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_comments', function (Blueprint $table) {
            $table->bigIncrements('comment_id');

            $table->unsignedBigInteger('topic_id');
            $table->foreign('topic_id')->references('topic_id')->on('forum_topics')->onDelete('cascade');

            $table->unsignedBigInteger('comment_author_id');
            $table->foreign('comment_author_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('comment_title');
            $table->string('comment_content');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forum_comments');
    }
}
