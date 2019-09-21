<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\PaymentTransaction;

class ManageHistoryController extends ManageController
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $history = PaymentTransaction::where('payment_payer_id', $this->getLoggedinUser()->id)->get();

        return view('manage.history.history', [
            'history' => $history,
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
