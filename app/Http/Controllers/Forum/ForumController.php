<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ForumTopic;
use App\ForumCategory;

class ForumController extends Controller
{
    public function index() {

        $category = ForumCategory::all();

        return view('forum.forum', [
            'topics' => $this->getAllTopics(),
            'mostviews' => $this->getTopicTopFiveMostView(),
            'categories' => $category,
            'lastest' => $this->getLastestTopic()
        ]);
    }

    public function getCommentOnTopic($id) {

        $topic = ForumTopic::find($id);

        return $topic->comment;

        return view('forum.read', [
            'topics' => $topic,
        ]);
    }

    public function getTopic($id) {

        $topic = ForumTopic::find($id);

        return $topic;
    }

    public function getAllTopics() {

        $topic = ForumTopic::all();

        return $topic;
    }

    public function getTopicTopFiveMostView()
    {
        $topic = ForumTopic::orderBy('topic_views', 'desc')->take(3)->get();
        return $topic;
    }

    public function getLastestTopic()
    {
        $topic = ForumTopic::orderBy('created_at', 'desc')->take(5)->get();
        return $topic;
    }
}
