<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;

class ManageProfileController extends ManageController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('manage.profile', [
            'user' => $this->getUserByName(Auth::user()->name),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = User::find(1);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('usereditor.index');
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
