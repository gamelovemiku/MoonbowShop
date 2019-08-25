<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;

class ManageUserController extends ManageController
{
    public function index()
    {
        return view('manage.admin.usereditor.user', [
            'users' => $this->getAllUsers(),
        ]);
    }

    public function create()
    {
        return view('manage.admin.usereditor.adduser');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'points_balance' => $request->points,
            'role_id' => 1,
        ]);

        return redirect()->route('usereditor.index');

    }

    public function edit($id)
    {
        return view('manage.admin.usereditor.edituser', [
            'id' => $id,
            'user' => $this->getUser(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'email' => $request->email,
            'points_balance' => $request->points,

        ]);

        if($request->password != null) {

            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect('manage/usereditor');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect('manage/usereditor');
    }
}
