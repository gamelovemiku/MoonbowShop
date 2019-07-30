<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MinecraftServerStatus\MinecraftServerStatus;
use App\StoreItems;
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
        $this->middleware('checkIfBuy');
    }

    public function index()
    { 
        return view('checkout');
    }

    public function getItemDetail($itemid)
    { 
        $details = StoreItems::all()->get();

        if($details != null){
            return view('checkout', $details);
        }else{
            $msg = "Transaction Failed.";
        }

        return view('checkout');
    }

    public function buy($itemid)
    { 
        $player = Auth::user()->name;

        return view('checkout', ['items' => $this->getItem($itemid)]);
    }

    public function confirmbuy($itemid)
    { 
        $player = Auth::user()->name;
        $result = $this->getItem($itemid);

        if($result != null){
            $this->sendCommand(str_replace('%player', $player , $result->item_command));
            return redirect('store');
        }else{
            return redirect('store');
        }
    }
}
