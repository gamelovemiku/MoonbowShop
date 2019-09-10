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
        //
    }

    public function show($id)
    {
        return view('forum.read', [
            'topic' => $this->getTopic($id),
        ]);
    }

    public function edit($id)
    {
        //
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
