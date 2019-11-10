<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Requests\SettingsRequest;
use App\GeneralSettings;

class ManageGeneralSettingsController extends ManageController
{
    public function index()
    {
        $settings = GeneralSettings::all()->first();

        return view('manage.admin.settings.settings', [
            'settings' => $settings,
        ]);
    }

    public function store(SettingsRequest $request)
    {
        GeneralSettings::find(1)->update([

            'hostname'      => $request->hostname,
            'hostname_port' => $request->hostname_port,
            'rcon_port'     => $request->rcon_port,
            'rcon_password' => $request->rcon_password,
            'websender_port'     => $request->websender_port,
            'websender_password' => $request->websender_password,
            'website_name'  => $request->website_name,
            'website_desc'  => $request->website_desc,

        ]);

        session()->flash('successfullyUpdateData');
        return redirect()->back();
    }

}
