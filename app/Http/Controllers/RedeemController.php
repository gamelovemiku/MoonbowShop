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

                $this->setAsClaimed($redeem->redeem_id);
                $redeem->update([
                    'redeem_count' => $redeem->redeem_count+1,
                ]);

                if($redeem->redeem_limit == 0) { //ไม่จำกัดการแลก

                    $this->explodeAndSendCommands($redeem->redeem_reward_command);
                    $this->addLogAsUser('REDEEM:OK', 'แลกของรางวัลด้วยโค๊ด ' . $request->redeemcode . ' และรับของแล้วเรียบร้อย!');

                }else if($redeem->redeem_limit > 0 && $redeem->redeem_count < $redeem->redeem_limit) { //จำกัดการแลก

                    $this->explodeAndSendCommands($redeem->redeem_reward_command);
                    $this->addLogAsUser('REDEEM:OK', 'แลกของรางวัลด้วยโค๊ด ' . $request->redeemcode . ' (ลำดับที่ ' . $redeem->redeem_count . ' จาก ' . $redeem->redeem_limit . ' ครั้ง) และรับของแล้วเรียบร้อย!');

                }else {

                    session()->flash('RedeemClaimedError');
                    return redirect()->back();

                }

                session()->flash('RedeemClaimedCompleted', $redeem->redeem_desc);
                return redirect()->back();

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
}
