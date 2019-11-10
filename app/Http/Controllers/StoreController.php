<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemshopCategory;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $categorys = ItemshopCategory::orderBy('category_id','desc')->get();

        return view('store',
            [
                'categorys' => $categorys,
                'server'    => $this->getServerInfo(),
                'items'     => $this->getAllItem(),
                'lastest'   => $this->getLastestAddItem(),
                'bestseller'=> $this->getBestSellerItem(),
                'balance'   => $this->getBalance(),
                'settings'  => $this->getSettings(),
                'notices'   => $this->getOnlyStoreNotices(),
                'discount'  => $this->getDiscountItem(),
            ]
        );
    }

}
