<?php

namespace App\Http\Middleware;

use Closure;
use App\ForumTopic;
use Auth;

class PostOwnerOnly
{
    public function handle($request, Closure $next)
    {
        $topic = ForumTopic::find($request->route('topic'));
        $userid = Auth::user()->id;

        if($topic->topic_author_id == $userid) {
            return $next($request);
        }else{

            session()->flash('forumOwnerOnly');
            return redirect()->back();
        }
    }
}
