<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PaymentPlan;

class ManagePaymentPlanController extends Controller
{

    public function index()
    {
        $plans = PaymentPlan::orderBy('plan_price', 'asc')->get();

        return view('manage.admin.paymentplan.paymentplan', [
            'plans' => $plans,
        ]);
    }

    public function create()
    {
        return view('manage.admin.paymentplan.addpaymentplan', [

        ]);
    }

    public function store(Request $request)
    {
        $plan = new PaymentPlan;

        $plan->plan_provider      = $request->provider;
        $plan->plan_title         = $request->title;
        $plan->plan_price         = $request->price;
        $plan->plan_points_amount = $request->points_amount;

        $plan->save();

        $this->addLog(
            $this->getLoggedinUser()->id,
            "admin:addpayplan", "PaymentPlan ADDED: " . $request->provider . " | " . $request->price . " with " . $request->points_amount
        );

        return redirect()->route('paymentplan.index');
    }

    public function show($id)
    {
        return redirect()->route('paymentplan.index');
    }

    public function edit($id)
    {
        $plan = PaymentPlan::find($id);

        return view('manage.admin.paymentplan.editpaymentplan', [
            'plan' => $plan,
        ]);
    }

    public function update(Request $request, $id)
    {

        $item = PaymentPlan::find($id);

        $item->update([

            'plan_provider' => $request->provider,
            'plan_title' => $request->title,
            'plan_price' => $request->price,
            'plan_points_amount' => $request->points_amount,

        ]);

        return redirect()->route('paymentplan.index');
    }

    public function destroy($id)
    {
        PaymentPlan::find($id)->delete();

        return redirect()->route('paymentplan.index');
    }
}
