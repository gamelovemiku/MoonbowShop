<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MinecraftServerStatus\MinecraftServerStatus;
use App\StoreItems;

class StoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('store',
            [
                'server' => $this->getStatus(),
                'items' => $this->getAllItem(),
            ]
        ); 
    }

}