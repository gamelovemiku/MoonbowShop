<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentPlan;

class TopupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $plan = PaymentPlan::orderBy('plan_price', 'asc')->get();

        return view('payment.topup', [
            'plans' => $plan,
            'user_points' => $this->getLoggedinUser()->points_balance,
        ]);
    }

    public function show($planid) {

        $plan = PaymentPlan::find($planid);

        return view('payment.payout', [
            'plan' => $plan,
        ]);
    }
}
