<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('balanceEnough', ['except' => 'index']);
    }

    public function index()
    {
        return redirect('store');
    }

    public function buy($itemid)
    {
        return view('checkout', ['items' => $this->getItem($itemid)]);
    }

    public function verifiedbuy(Request $request)
    {
        $result = $this->getItem($request->input('id'));

        if($result != null){ //ถ้าไม่มี item รหัสนี้ใน store

                $item = $this->getItem($request->input('id'));

                if($item->item_discount_price != null) {

                    $this->takeMoney($item->item_discount_price);

                }else {

                    $this->takeMoney($item->item_price);

                }

                $this->sendToPocket($item->item_id);
                $this->addAndGetSold($item->item_id); //+1 การขาย แล้วเอาค่าหลังจาก + แล้วมา

                session()->flash('buyComplete', 'Successfully! Your item is deliveried.');

            }else{ //ถ้าไม่ได้
                session()->flash('somethingError');
                return redirect('store');
            }

        return redirect('store');
    }

    public function takeMoney($amount)
    {
        $currentmoney = $this->getBalance();
        User::where('name', Auth::user()->name)->update(['points_balance' => $currentmoney-$amount]);
    }
}
