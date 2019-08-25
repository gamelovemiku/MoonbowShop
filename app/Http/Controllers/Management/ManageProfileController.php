<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;

class ManageProfileController extends ManageController
{
    public function index()
    {
        return view('manage.profile', [
            'user' => $this->getUser(),
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
