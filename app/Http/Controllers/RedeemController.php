<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Redeem;
use App\RedeemClaimed;
use Auth;

class RedeemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function redeem(Request $request) {

        $redeem = Redeem::where('redeem_code', $request->redeemcode)->get()->first();

        if($redeem) {

            $claim = RedeemClaimed::where([['redeem_code_id', $redeem->redeem_id], ['claimer_id', Auth::user()->id]])->get()->first();

            if(!$claim) {

                //ยังไม่แลกโค๊ด

                $this->sendCommand('say CLAIMS');
                $this->setAsClaimed($redeem->redeem_id);

            }else {

                session()->flash('RedeemClaimedError');
                return redirect()->back();

            }

        }else {

            session()->flash('RedeemNotFoundError');
            return redirect()->back();

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

    public function setAsClaimed($redeemid) {

        $claim = new RedeemClaimed;

        $claim->redeem_code_id = $redeemid;
        $claim->claimer_id = Auth::user()->id;
        $claim->save();

    }
}
