<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MinecraftServerStatus\MinecraftServerStatus;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $response = MinecraftServerStatus::query('mc.hypixel.net', 25565);
        
        return view('store', ['server' => $response]);
        
    }
}
