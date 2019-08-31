<?php

namespace App\Http\Controllers\Management;

use App\User;
use App\Itemshop;
use Storage;

class ManageRecycleBinController extends ManageController
{
    public function index()
    {
        $deleteduser = User::onlyTrashed()->get();
        $deleteditem = Itemshop::onlyTrashed()->get();
        //$deleteditem = Itemshop::onlyTrashed()->get();

        return view('manage.admin.recyclebin.recyclebin', [
            'usertrashs' => $deleteduser,
            'itemtrashs' => $deleteditem,
        ]);
    }

    public function rollbackUser($id)
    {
        $deleteduser = User::onlyTrashed()->find($id);
        $deleteduser->restore();

        return redirect()->route('recyclebin.index');
    }

    public function forcedeleteUser($id)
    {
        $deleteduser = User::onlyTrashed()->find($id);
        $deleteduser->forceDelete();

        return redirect()->route('recyclebin.index');
    }

    public function rollbackItemshop($id)
    {
        $item = Itemshop::onlyTrashed()->find($id);
        $item->restore();

        return redirect()->route('recyclebin.index');
    }

    public function forcedeleteItemshop($id)
    {
        $item = Itemshop::onlyTrashed()->find($id);

        Storage::disk('local')->delete('public/itemshop/cover/' . $item->item_image_path);

        $item->forceDelete();

        return redirect()->route('recyclebin.index');

    }
}
