<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Redeem;
use DB;
use Auth;

class RedeemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function redeem(Request $request) {

        $code = $request->input('redeemcode');

        if($this->redeemCheck($code)) {

            $this->sendCommand($this->getRewardInfo($code)->redeem_reward_command);

            return "Found!";

        } else {

            return "Invalid code: " . $code;
        }

    }

    public function redeemCheck($code) {

        $result = Redeem::where('redeem_code', $code)->get()->first();
        
        if(!empty($result->redeem_code)) {
            return true;
        }
        return false;
    }

    public function getRewardInfo($code)
    {
        $redeem = Redeem::where('redeem_code', $code)->get();
        return $redeem->first();
    }
}
