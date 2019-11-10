<?php

namespace App\Http\Middleware;

use Closure;
use App\ItemshopPocket;
use Auth;

class PocketOwnerOnly
{
    public function handle($request, Closure $next)
    {

        $pocket = ItemshopPocket::findOrFail($request->id);

        if(Auth::user()->id == $pocket->owner_id) {
            return $next($request);
        } else {
            return redirect()->back();
        }
    }
}
