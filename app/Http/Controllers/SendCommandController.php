<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Thedudeguy\Rcon;

class SendCommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendCommand($cmd)
    {
        $rcon = new Rcon('127.0.0.1', 25575, '123456789', 3);

        if ($rcon->connect())
        {
            $rcon->sendCommand($cmd);
        }
    }
}
