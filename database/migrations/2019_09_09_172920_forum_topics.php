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

            $table->unsignedBigInteger('topic_category_id');
            $table->foreign('topic_category_id')->references('forum_category_id')->on('forum_categories')->onDelete('cascade');

            $table->longText('topic_title');
            $table->longText('topic_content');
            $table->integer('topic_views');
            $table->boolean('topic_is_published');
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
