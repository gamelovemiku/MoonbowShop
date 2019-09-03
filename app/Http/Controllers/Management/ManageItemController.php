<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Itemshop;
use Storage;

class ManageItemController extends ManageController
{
    public function index()
    {
        return view('manage.admin.item', [
            'items' => $this->getAllItem(),
        ]);
    }

    public function create()
    {

        $category = $this->getAllCategory();

        return view('manage.admin.additem', [
            'categorys' => $category,
        ]);
    }

    public function getBasename($path, $file) {
        $save = Storage::disk('local')->put($path, $file);
        return basename($save);
    }

    public function store(Request $request)
    {

        $item = new Itemshop;

        $item->item_name        = $request->item_name;
        $item->item_desc        = $request->item_desc;
        $item->item_price       = $request->item_price;
        $item->item_image_path  = $this->saveAndGetFile('public/itemshop/cover', $request->file('cover'));
        $item->category_id      = $request->category;
        $item->item_command     = $request->item_command;
        $item->item_sold        = 0;
        $item->save();

        $this->addLog(
            $this->getLoggedinUser()->id,
            "admin:additem", "Itemshop ADDED: " . $request->item_name . " / " . $request->item_price . " Points");

        session()->flash('manageItemAdded');
        return redirect()->route('item.index');
    }

    public function show($id)
    {
        return 'Show';
    }

    public function edit($id)
    {
        $itemdata = Itemshop::where('item_id', $id)->get()->first();
        $category = $this->getAllCategory();

        return view('manage.admin.edititem', [
            'item' => $itemdata,
            'categorys' => $category,
        ]);
    }

    public function update(Request $request, $id)
    {

        $item = Itemshop::where('item_id', $id);
        $oldfilename = $item->get()->first()->item_image_path;

        $item->update([

            'item_name' => $request->item_name,
            'item_desc' => $request->item_desc,
            'item_price' => $request->item_price,
            'category_id' => $request->category,
            'item_command' => $request->item_command,

        ]);

        if($request->file('cover') != null){

            Storage::disk('local')->delete('public/itemshop/cover/' . $oldfilename);

            $item->update([
                'item_image_path' => $this->saveAndGetFile('public/itemshop/cover', $request->file('cover')),
            ]);
        }

        session()->flash('manageItemEdited');
        return redirect()->route('item.index');
    }

    public function destroy($id)
    {

        if($id != null) {
            Itemshop::find($id)->delete();

            session()->flash('manageItemRemoved');
        }else {
            session()->flash('somethingError');
        }

        return redirect('manage/itemshop/item');
    }
}
