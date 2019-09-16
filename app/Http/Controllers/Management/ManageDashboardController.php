<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageDashboardController extends ManageController
{

    public function index()
    {

        return view('manage.admin.dashboard.dashboard', [
            'users' => $this->getAllUsers(),
            'items' => $this->getAllItem(),
            'notices' => $this->getAllNotices(),
            'all_sold_items' => $this->getAllItem()->sum('item_sold'),
            'all_payment_amount' => $this->getAllPaymentTransactions()->sum('payment_amount'),
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
