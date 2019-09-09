<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('store',
            [
                'server'    => $this->getStatus(),
                'items'     => $this->getAllItem(),
                'categorys' => $this->getAllCategory(),
                'lastest'   => $this->getLastestAddItem(),
                'bestseller'=> $this->getBestSellerItem(),
                'balance'   => $this->getBalance(),
                'settings'  => $this->getSettings(),
                'notices'   => $this->getOnlyStoreNotices(),
            ]
        );
    }

}
