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

<<<<<<< Updated upstream
            return "Found!";

        } else {
=======
            if(!$claim) {
                
                //ยังไม่แลกโค๊ด

                if($redeem->redeem_limit == 0) {

                    $this->explodeAndSendCommands($redeem->redeem_reward_command);

                }else if($redeem->redeem_limit > 0 && $redeem->redeem_count < $redeem->redeem_limit) {

                    $this->explodeAndSendCommands($redeem->redeem_reward_command);

                }else {

                    session()->flash('RedeemClaimedError');
                    return redirect()->back();

                }

                $this->setAsClaimed($redeem->redeem_id);
                $redeem->update([
                    'redeem_count' => $redeem->redeem_count+1,
                ]);

                session()->flash('RedeemClaimedCompleted', $redeem->redeem_desc);
                return redirect()->back();

            }else {

                session()->flash('RedeemClaimedError');
                return redirect()->back();

            }

        }else {

            session()->flash('RedeemNotFoundError');
            return redirect()->back();
>>>>>>> Stashed changes

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
<<<<<<< Updated upstream
=======

    public function setAsClaimed($redeemid) {

        $claim = new RedeemClaimed;

        $claim->redeem_code_id = $redeemid;
        $claim->claimer_id = Auth::user()->id;
        $claim->save();

    }

    public function explodeAndSendCommands($cmd) {

        $redeem_cmds = explode(';', $cmd);

        foreach($redeem_cmds as $cmdtype) {
            $type = explode(':', $cmdtype);

             switch(strtolower($type[0])) {
                case "cmd":
                    $this->sendCommand($type[1]);

                case "points":
                    $this->AddPoint((double) $type[1]);
             }

        }
    }
>>>>>>> Stashed changes
}
