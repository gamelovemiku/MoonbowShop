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
use App\PaymentTransaction;
use App\GameServer;

use \MinecraftPing;
use xPaw\MinecraftPingException;

use xPaw\MinecraftQuery;
use xPaw\MinecraftQueryException;

use xPaw\SourceQuery\SourceQuery;

use App\ExternalClasses\WebSenderAPI;
use App\ItemshopPocket;
use Auth;
use Exception;

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

    public function getServerInfo()
    {

        $query = new MinecraftQuery();

        try {

            $query->Connect($this->getSettings()->hostname, $this->getSettings()->hostname_port);

            //dd($query->GetInfo());

            return $query;

        }catch(MinecraftQueryException $e) {

            return null;

        }
    }

    public function testServerConnection($serverId)
    {

        $server = GameServer::findOrFail($serverId);
        $query = new MinecraftQuery();

        try {

            $query->Connect($server->hostname,  $server->hostname_port);

            return response()->json(true);

        }catch(MinecraftQueryException $e) {

            return response()->json(false);

        }
    }

    public function sendCommandbata($cmd)
    {
        $rcon = new Rcon($this->getSettings()->hostname, $this->getSettings()->rcon_port, $this->getSettings()->rcon_password, 1);

        $player = Auth::user()->name;
        $multiple = explode(';', $cmd);

        $rcon = new SourceQuery();

        $rcon->Connect(
            $this->getSettings()->hostname,
            $this->getSettings()->rcon_port,
            10, SourceQuery::SOURCE
        );

        $rcon->SetRconPassword(
            $this->getSettings()->rcon_password
        );

        try
        {

            $rcon->Connect(
                $this->getSettings()->hostname,
                $this->getSettings()->rcon_port,
                10, SourceQuery::SOURCE
            );

            $rcon->SetRconPassword(
                $this->getSettings()->rcon_password
            );

            foreach ($multiple as $command) {
                $rcon->Rcon(str_replace('%player', $player , $command));
            }

            return true;
        }
        catch( Exception $e )
        {
            $wsr = new WebSenderAPI(
                $this->getSettings()->hostname,
                $this->getSettings()->websender_password,
                $this->getSettings()->websender_port
            );

            if($wsr->connect()) {

                foreach ($multiple as $command) {
                    $wsr->sendCommand(str_replace('%player', $player , $command));
                }

                $wsr->disconnect();
                return true;

            }else {
                return false;
            }
        }
        finally
        {
            $rcon->Disconnect( );
        }
    }

    public function sendCommand($cmd)
    {
        $rcon = new Rcon($this->getSettings()->hostname, $this->getSettings()->rcon_port, $this->getSettings()->rcon_password, 3);
        $player = Auth::user()->name;

        $multiple = explode(';', $cmd);

        try {
            if ($rcon->connect())
            {
                foreach ($multiple as $command) {
                    $rcon->sendCommand(str_replace('%player', $player , $command));
                }



                return true;
            }else {

                return false;
            }

        }catch (Exception $e) {

            $wsr = new WebSenderAPI(
                $this->getSettings()->hostname,
                $this->getSettings()->websender_password,
                $this->getSettings()->websender_port,
            );

            if($wsr->connect()) {

                foreach ($multiple as $command) {
                    $wsr->sendCommand(str_replace('%player', $player , $command));
                }

                $wsr->disconnect();
                return true;

            }else {
                return false;
            }
        }
    }

    public function AddPoint($amount)
    {
        $user = Auth::user();

        $user->update([
            'points_balance' => $user->points_balance+$amount,
        ]);
    }

    public function sendToPocket($itemid)
    {
        $pocket = new ItemshopPocket;

        $pocket->item_id = $itemid;
        $pocket->owner_id = $this->getLoggedinUser()->id;
        $pocket->is_claimed = 0;
        $pocket->save();

        return true;
    }

    public function getAllItem()
    {
        $items = Itemshop::all();
        return $items;
    }

    public function getDiscountItem()
    {
        $items = Itemshop::whereNotNull('item_discount_price')->get();
        return $items;
    }

    public function getAllUsers()
    {
        $users = User::all();
        return $users;
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

    public function getAllPaymentTransactions()
    {
        $payment = PaymentTransaction::all();
        return $payment;
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

    public function addLog($buyer, $type, $msg) {

        $log = new Logs;

        $log->user_id       = $buyer;
        $log->action_detail = $msg;
        $log->type          = $type;

        $log->save();
    }

    public function addLogAsUser($type, $msg) {

        $log = new Logs;

        $log->user_id       = $this->getLoggedinUser()->id;
        $log->type          = $type;
        $log->action_detail = $msg;

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

    public function getOnlyStoreNotices()
    {
        $notice = Notice::orderBy('created_at', 'desc')->where('notice_show_on_store', 1)->take(3)->get();
        return $notice;
    }

    public function getNotice($id)
    {
        $notice = Notice::find($id);
        return $notice;
    }

}
