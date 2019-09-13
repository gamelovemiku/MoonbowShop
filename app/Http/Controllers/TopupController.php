<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentPlan;

class TopupController extends Controller
{

    public function index() {

        $plan = PaymentPlan::all();

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
