<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use MinecraftServerStatus\MinecraftServerStatus;
use Thedudeguy\Rcon;
use App\Itemshop;
use App\Itemshop_Category;
use App\User;
use Auth;
use Mockery\Exception;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getStatus()
    {
        $response = MinecraftServerStatus::query('10.10.1.76', 25565);

        return $response;
    }

    public function sendCommand($cmd)
    {
        $rcon = new Rcon('10.10.1.76', 25575, '123456789', 3);
        $player = Auth::user()->name;

        $multiple = explode(';', $cmd);

        if ($rcon->connect())
        {
            foreach ($multiple as $command) {
                $rcon->sendCommand(str_replace('%player', $player , $command));
            }
            return true;
        }
        return false;
    }

    public function getAllItem()
    {
        $items = Itemshop::all();
        return $items;
    }

    public function getAllCategory()
    {
        $category = Itemshop_Category::all();
        return $category;
    }

    public function getItem($itemid)
    {
        $items = Itemshop::where('item_id', $itemid)->get();
        return $items->first();
    }

    public function getBalance()
    {
        $player = User::where('name',  Auth::user()->name)->get()->first();
        return $player->points_balance;
    }

    public function getUser()
    {
        $player = User::where('name',  Auth::user()->name)->get()->first();
        return $player;
    }

    public function showFlashAlert($style, $title, $info)
    {
        session()->flash('style', $style);
        session()->flash('title', $title);
        session()->flash('info', $info);
    }
}
