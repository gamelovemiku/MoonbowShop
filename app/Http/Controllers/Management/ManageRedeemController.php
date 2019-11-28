<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Redeem;
use JavaScript;

class ManageRedeemController extends Controller
{
    public function index()
    {
        $redeem = Redeem::all();

        JavaScript::put([
            'data' => $redeem,
        ]);

        return view('manage.admin.redeem.redeem');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //return $request;

        $redeem = new Redeem;

        $redeem->redeem_code = $request->code;
        $redeem->redeem_desc = $request->desc;
        $redeem->redeem_reward_command = $request->cmd;
        $redeem->redeem_count = 0;

        if($request->limit == null) {
            $redeem->redeem_limit = 0;

        }else if($request->limit > 0) {
            $redeem->redeem_limit = $request->limit;
        }

        $redeem->save();

        return redirect()->route('redeem.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $redeem = Redeem::findOrFail($id);

        $redeem->redeem_code = $request->code;
        $redeem->redeem_desc = $request->desc;
        $redeem->redeem_reward_command = $request->cmd;
        $redeem->redeem_limit = $request->limit;
        $redeem->redeem_count = 0;
        $redeem->save();

        return redirect()->route('redeem.index');
    }

    public function internalUpdate(Request $request)
    {
        $redeem = Redeem::findOrFail($request->id);

        $redeem->redeem_code = $request->code;
        $redeem->redeem_desc = $request->desc;
        $redeem->redeem_reward_command = $request->cmd;
        $redeem->redeem_limit = $request->limit;
        $redeem->save();

        return redirect()->route('redeem.index');
    }

    public function internalDelete(Request $request)
    {
        Redeem::findOrFail($request->id)->delete();
        return redirect()->route('redeem.index');
    }

    public function destroy($id)
    {
        //
    }
}
