<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Requests\UserEditorRequest;
use Illuminate\Support\Facades\Hash;
use App\User;

class ManageUserController extends ManageController
{

    public function index()
    {
        return view('manage.admin.usereditor.user', [
            'users' => $this->getAllUsers()->where('role_id', 2),
            'adminuser' => $this->getAllUsers()->where('role_id', 1),
        ]);
    }

    public function create()
    {
        return view('manage.admin.usereditor.adduser', [
            'roles' => $this->getAllRoles(),
        ]);
    }

    public function store(UserEditorRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'points_balance' => $request->points,
            'role_id' => $request->role,
        ]);

        return redirect()->route('usereditor.index');

    }

    public function edit($id)
    {
        return view('manage.admin.usereditor.edituser', [
            'id' => $id,
            'user' => $this->getUser($id),
            'roles' => $this->getAllRoles(),
        ]);
    }

    public function update(UserEditorRequest $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'points_balance' => $request->points,
            'role_id' => $request->role,
        ]);

        if($request->password != null) {

            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('usereditor.index');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('usereditor.index');
    }
}
