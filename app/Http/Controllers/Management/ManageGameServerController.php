<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\GameServer;
use JavaScript;

class ManageGameServerController extends ManageController
{
    public function index()
    {
        JavaScript::put([
            'data' =>  GameServer::all(),
        ]);

        return view('manage.admin.server.server');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $server = new GameServer;

        $server->server_name            = $request->server_name;
        $server->hostname               = $request->hostname;
        $server->hostname_port          = $request->hostname_port;
        $server->hostname_query_port    = $request->hostname_query_port;
        $server->rcon_port              = $request->rcon_port;
        $server->rcon_password          = $request->rcon_password;
        $server->websender_port         = $request->websender_port;
        $server->websender_password     = $request->websender_password;

        $server->save();

        return redirect()->route('server.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $server = GameServer::findOrFail($id);

        $server->server_name            = $request->server_name;
        $server->hostname               = $request->hostname;
        $server->hostname_port          = $request->hostname_port;
        $server->hostname_query_port    = $request->hostname_query_port;
        $server->rcon_port              = $request->rcon_port;
        $server->rcon_password          = $request->rcon_password;
        $server->websender_port         = $request->websender_port;
        $server->websender_password     = $request->websender_password;

        $server->save();

        return redirect()->route('server.index');
    }

    public function destroy($id)
    {
        GameServer::findOrFail($id)->delete();
        return redirect()->route('server.index');
    }

    public function internalUpdate(Request $request)
    {
        $server = GameServer::findOrFail($request->id);

        $server->server_name            = $request->server_name;
        $server->hostname               = $request->hostname;
        $server->hostname_port          = $request->hostname_port;
        $server->hostname_query_port    = $request->hostname_query_port;
        $server->rcon_port              = $request->rcon_port;
        $server->rcon_password          = $request->rcon_password;
        $server->websender_port         = $request->websender_port;
        $server->websender_password     = $request->websender_password;

        $server->save();

        return redirect()->route('server.index');
    }

    public function internalDelete(Request $request)
    {
        GameServer::findOrFail($request->id)->delete();
        return redirect()->route('server.index');
    }

}
