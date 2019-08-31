<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Http\Controllers\Controller;

class AdminOnly extends Controller
{
    public function handle($request, Closure $next)
    {
        $user = $this->getUserByName(Auth::user()->name);

        if($user->role_id == 1){

            return $next($request);

        }else{

            session()->flash('noPermission');
            return redirect()->back();
        }
    }
}
