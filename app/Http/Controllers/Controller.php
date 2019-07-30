<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use MinecraftServerStatus\MinecraftServerStatus;
use Thedudeguy\Rcon;
use App\StoreItems;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getStatus()
    {
        $response = MinecraftServerStatus::query('mc.hypixel.net', 25565);
        
        return $response; 
    }

    public function sendCommand($cmd)
    {
        $rcon = new Rcon('127.0.0.1', 25575, '123456789', 3);

        if ($rcon->connect())
        {
            $rcon->sendCommand($cmd);
            return true;
        }
        return false;
    }

    public function getAllItem()
    {
        $items = StoreItems::all();
        return $items;
    }

    public function getItem($itemid)
    {
        $items = StoreItems::where('item_id', $itemid)->get();
        return $items->first();
    }

    public function billingAction()
    {
        //ตัดเงิน
    }
}
