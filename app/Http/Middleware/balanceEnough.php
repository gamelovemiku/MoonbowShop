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
        $items = Itemshop::where('item_id', $request->id)->get()->first();

        if(!empty($items->item_discount_price)) {
            //Use discount Price
            if ($player->points_balance >= $items->item_discount_price) {
                return $next($request);

            }else {

                session()->flash('moneyNotEnough');
                return redirect('store');
            }
        }else{

            if ($player->points_balance >= $items->item_price) {
                return $next($request);

            }else {

                session()->flash('moneyNotEnough');
                return redirect('store');
            }
        }

    }
}

