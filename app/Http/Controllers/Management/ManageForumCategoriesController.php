<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\ForumCategory;

class ManageForumCategoriesController extends ManageController
{
    public function index()
    {
        $categories = ForumCategory::all();

        return view('manage.admin.forum.forum', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('manage.admin.forum.addcategory');
    }

    public function store(Request $request)
    {
        $category = new ForumCategory;

        $category->forum_category_name = $request->category_name;
        $category->forum_category_description = $request->description;
        $category->save();

        return redirect()->route('forumcontrol.index');
    }

    public function show($id)
    {
        return redirect()->route('forumcontrol.index');
    }

    public function edit($id)
    {
        $category = ForumCategory::find($id);

        return view('manage.admin.forum.editcategory', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = ForumCategory::find($id);

        $category->forum_category_name = $request->category_name;
        $category->forum_category_description = $request->description;

        $category->save();

        return redirect()->route('forumcontrol.index');
    }

    public function destroy($id)
    {
        $category = ForumCategory::find($id);
        $category->delete();

        return redirect()->route('forumcontrol.index');
    }
}
