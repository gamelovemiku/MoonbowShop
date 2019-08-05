<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;
use App\Itemshop;

class balanceEnough
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
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

