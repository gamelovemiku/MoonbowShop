<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;
use App\ForumTopic;
use App\ForumComment;

class ForumTopicsController extends ForumController
{
    public function index()
    {

    }

    public function create()
    {
        return view('forum.newpost');
    }

    public function store(Request $request)
    {
        $topic = new ForumTopic;

        $topic->topic_title = $request->topic;
        $topic->topic_content = $request->content;

        $topic->topic_category_id = 1;

        $topic->topic_author_id = $this->getLoggedinUser()->id;
        $topic->topic_views = 0;

        if(empty($request->is_published)){
            $topic->topic_is_published = 1;
        }else{
            $topic->topic_is_published = 0;
        }

        $topic->save();

        return redirect()->route('topic.show', [$topic->topic_id]);
    }

    public function show($id)
    {

        $topic = ForumTopic::find($id);

        $topic->update([
            'topic_views' => $topic->topic_views+1,
        ]);

        return view('forum.read', [
            'topic' => $this->getTopic($id),
        ]);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function addcomment(Request $request)
    {
        $comment = new ForumComment;

        $comment->topic_id = $request->topic_id;
        $comment->comment_author_id = $this->getLoggedinUser()->id;
        $comment->comment_content = $request->content;

        $comment->save();

        return redirect()->back();
    }

}
