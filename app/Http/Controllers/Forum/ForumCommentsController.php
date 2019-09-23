<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ForumComment;
use Auth;

class ForumCommentsController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $comment = new ForumComment;

        $comment->topic_id = $request->topic_id;
        $comment->comment_author_id = $this->getLoggedinUser()->id;
        $comment->comment_content = $request->content;

        $comment->save();

        return redirect()->back();
    }

    public function show($id)
    {
        //
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
        $comment = ForumComment::find($id);

        if(Auth::user()->id == $comment->comment_author_id){
            $comment->delete();
        }

        return redirect()->back();
    }
}
