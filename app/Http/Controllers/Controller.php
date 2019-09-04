<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use MinecraftServerStatus\MinecraftServerStatus;
use Thedudeguy\Rcon;

use App\Itemshop;
use App\ItemshopCategory;
use App\User;
use App\Role;
use App\GeneralSettings;
use App\Logs;
use App\Notice;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getLoggedinUser()
    {
        return Auth::user();
    }

    public function getSettings()
    {
        $settings = GeneralSettings::find(1)->first();

        return $settings;
    }

    public function getStatus()
    {
        $response = MinecraftServerStatus::query($this->getSettings()->hostname, $this->getSettings()->hostname_port);

        return $response;
    }

    public function sendCommand($cmd)
    {
        $rcon = new Rcon($this->getSettings()->hostname, $this->getSettings()->rcon_port, $this->getSettings()->rcon_password, 1);
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

    public function getLastestAddItem()
    {
        $items = Itemshop::orderBy('created_at', 'desc')->take(4)->get();
        return $items;
    }

    public function getBestSellerItem()
    {
        $items = Itemshop::orderBy('item_sold', 'desc')->take(4)->get();
        return $items;
    }

    public function getAllCategory()
    {
        $category = ItemshopCategory::all();
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

    public function getUser($id)
    {
        $player = User::where('id', $id)->get()->first();
        return $player;
    }

    public function getUserByName($username)
    {
        $player = User::where('name', $username)->get()->first();
        return $player;
    }

    public function getAllRoles()
    {
        $roles = Role::all();
        return $roles;
    }

    public function showFlashAlert($style, $title, $info)
    {
        session()->flash('style', $style);
        session()->flash('title', $title);
        session()->flash('info', $info);
    }

    public function addLog($buyer, $type, $msg) {

        $log = new Logs;

        $log->user_id       = $buyer;
        $log->action_detail = $msg;
        $log->type          = $type;

        $log->save();
    }

    public function addAndGetSold($itemid)
    {
        $item = Itemshop::find($itemid);


        $item->update([
            'item_sold' => $item->item_sold+1,
        ]);
        return $item;
    }

    public function getAllNotices()
    {
        $notice = Notice::all();
        return $notice;
    }

    public function getNotice($id)
    {
        $notice = Notice::find($id)->get()->first();
        return $notice;
    }

}
