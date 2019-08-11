<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Itemshop;

class ManageItemController extends ManageController
{
    public function index()
    {
        return view('manage.admin.item', ['items' => $this->getAllItem()]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $item = new Itemshop;

        $item->item_name        = $request->item_name;
        $item->item_desc        = $request->item_desc;
        $item->item_image_path  = 'diamond.png';
        $item->item_price       = $request->item_price;
        $item->category_id      = $request->category;
        $item->item_command     = $request->item_command;
        $item->item_sold        = 0;
        $item->save();

        return redirect('item.index');
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
