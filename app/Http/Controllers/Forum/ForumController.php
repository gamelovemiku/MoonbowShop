<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ForumTopic;

class ForumController extends Controller
{
    public function index() {

        $topic = ForumTopic::all();

        return view('forum.forum', [
            'topics' => $topic,
            'mostviews' => $this->getTopicTopFiveMostView(),
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

    public function getTopicTopFiveMostView()
    {
        $topic = ForumTopic::orderBy('topic_views', 'desc')->take(5)->get();
        return $topic;
    }

}
