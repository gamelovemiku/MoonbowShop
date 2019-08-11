<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Itemshop;
use App\User;
use DB;
use Auth;
use Route;

class CheckoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
            if($this->sendCommand($result->item_command) != false){ //ถ้าเซิร์ฟยังเชื่อมต่อได้
                $this->takeMoney($this->getItem($request->input('id'))->item_price);
                session()->flash('buyComplete', 'Successfully! Your item is deliveried.');
            }else{ //ถ้าไม่ได้
                session()->flash('somethingError');
                return redirect('store');
            }
        }

        return redirect('store');
    }

    public function takeMoney($amount)
    { 
        $currentmoney = $this->getBalance();
        User::where('name', Auth::user()->name)->update(['points_balance' => $currentmoney-$amount]);

        return true;
    }
}
