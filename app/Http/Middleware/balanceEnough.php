<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use App\Itemshop;

class balanceEnough
{
    public function handle($request, Closure $next)
    {
        $player = User::where('name',  Auth::user()->name)->first();
        $items = Itemshop::where('item_id', $request->id)->get();

        if ($player->points_balance >= $items->first()->item_price) {
            return $next($request);

        }else {
            session()->flash('moneyNotEnough');
            return redirect('store');
        }
    }
}

