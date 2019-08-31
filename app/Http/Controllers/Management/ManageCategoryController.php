<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\ItemshopCategory;

class ManageCategoryController extends ManageController
{

    public function index()
    {
        return view('manage.admin.category', ['categorys' => $this->getAllCategory()]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $category = new ItemshopCategory;

        $category->category_name = $request->category_name;
        $category->save();

        session()->flash('manageCategoryAdded');
        return redirect()->route('category.index');
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
        if($id != null) {

            $items = $this->getAllItem();

            foreach ($items as $item) {
                if($item->category_id == $id){
                    $item->update([
                        'category_id' => 1,
                    ]);
                }
            }

            ItemshopCategory::find($id)->delete();
            session()->flash('manageCategoryRemoved');
        }else {
            session()->flash('somethingError');
        }

        return redirect('manage/itemshop/category');
    }
}
