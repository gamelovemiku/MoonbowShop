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

        return view('manage.admin.server.server', [
            'categorys' => $this->getAllCategory(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
        //
    }

    public function destroy($id)
    {
        //
    }
}
