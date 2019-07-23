<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MinecraftServerStatus\MinecraftServerStatus;

class ServerStatusController extends Controller
{
    public function getStatus()
    {
        $response = MinecraftServerStatus::query('mc.hypixel.net', 25565);

        return view('components.serverstatus', ['server' => $response]);
    }
}
