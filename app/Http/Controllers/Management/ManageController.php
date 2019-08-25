<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ItemshopCategory;
use App\User;
use Storage;

class ManageController extends Controller
{
    public function getAllCategory()
    {
        $category = ItemshopCategory::all();
        return $category;
    }

    public function saveAndGetFile($path, $file) {
        $save = Storage::disk('local')->put($path, $file);
        return basename($save);
    }

    public function getAllUsers()
    {
        $users = User::all();
        return $users;
    }
}
