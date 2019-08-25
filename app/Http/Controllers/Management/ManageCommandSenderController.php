<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageCommandSenderController extends ManageController
{
    public function index() {
        return view('manage.admin.commandsender');
    }

    public function store(Request $request) {

        $this->sendCommand($request->command);

        session()->flash('manageCommandsenderSuccess');
        return redirect('manage/commandsender');
    }

}
