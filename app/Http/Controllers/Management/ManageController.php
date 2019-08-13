<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ItemshopCategory;

class ManageController extends Controller
{
    public function getAllCategory()
    {
        $category = ItemshopCategory::all();
        return $category;
    }
}
