<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForumTopics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_topics', function (Blueprint $table) {
            $table->bigIncrements('topic_id');

            $table->unsignedBigInteger('topic_author_id');
            $table->foreign('topic_author_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('topic_title');
            $table->string('topic_content');
            $table->integer('topic_views');
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
        Schema::dropIfExists('forum_topics');
    }
}
