<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;
use App\User;
use Auth;


class ManageProfileController extends ManageController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('manage.profile.profile', [
            'user' => $this->getUserByName(Auth::user()->name),
        ]);
    }

    public function store(ChangePasswordRequest $request)
    {
        $user = User::find((Auth::user()->id));
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        session()->flash('successfullyUpdateData');
        return redirect()->route('profile.index');
    }

    public function changepassword()
    {
        return view('manage.profile.changepassword');
    }

    public function editprofile()
    {
        return view('manage.profile.editprofile', [
            'user' => $this->getUserByName(Auth::user()->name),
        ]);
    }

    public function updateprofile(Request $request)
    {
        $user = User::where("email", $request->email);

        $user->update([
            'email' => $request->email,
            'name' => $request->name,
        ]);

        session()->flash('successfullyUpdateData');
        return redirect()->back();
    }
}
