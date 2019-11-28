<?php

namespace App\Http\Controllers\Pocket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Itemshop;
use App\ItemshopPocket;
use Auth;

class ItemshopPocketController extends Controller
{

    public function __construct()
    {
        $this->middleware('PocketOwnerOnly',  ['except' => ['index']]);
    }

    public function index()
    {

        $pockets = ItemshopPocket::where([['owner_id', Auth::user()->id],['is_claimed', 0]])->get();
        $claimed = ItemshopPocket::where([['owner_id', Auth::user()->id],['is_claimed', 1]])->get();

        return view('manage.pocket.pocket', [
            'pockets' => $pockets,
            'claimed' => $claimed,
        ]);
    }

    public function create()
    {
        //
    }

    public function getPocketDetail($id)
    {
        $pocket = ItemshopPocket::findOrFail($id);
        return $pocket;
    }

    public function store(Request $request)
    {
        $pocket = $this->getPocketDetail($request->input('id'));
        $item = $this->getItem($pocket->item_id);

        if($this->getServerInfo() != null && $this->sendCommand($item->item_command) != null){

            ItemshopPocket::findOrFail($pocket->pocket_id)->update([
                'is_claimed' => 1,
            ]);

            $this->addLogAsUser('POCKET:CLAIMED', 'รับไอเท็ม ' . $item->item_name . ' จากกระเป๋าเก็บของและรับของแล้วเรียบร้อย!');
            session()->flash('pocketGetItem');

        }else{ //ถ้าไม่ได้

            session()->flash('somethingError');
        }

        return redirect()->back();

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
        //
    }

    public function destroy($id)
    {
        //
    }

}
