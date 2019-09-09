<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use OmiseCharge;
use App\PaymentTransaction;
use App\User;

class PaymentOmiseController extends Controller
{

    public function checkout(Request $request)
    {
        define('OMISE_API_VERSION', '2015-11-17');
        define('OMISE_PUBLIC_KEY', 'pkey_test_5h47rit3tz99ojp7mbj');
        define('OMISE_SECRET_KEY', 'skey_test_5h47rit45r0fqwwg1jc');

        $charge = OmiseCharge::create([
        'amount' => $this->toSatang(243.75),
        'currency' => 'thb',
        'card' => $request->omiseToken
        ]);

        if(!empty($charge)){

            $buyer = $this->getLoggedinUser();
            $user = User::find($buyer->id);

            $user->update([
                'points_balance' => ($user->points_balance + $this->toBaht($charge['amount'])),
            ]);

        }else {

        }

        $this->saveTransaction($charge);
        return redirect()->route('store');
    }

    public function saveTransaction($data)
    {
        $payment = new PaymentTransaction;

        $payment->payment_provider = "omise";
        $payment->payment_method = $data['card']['object'];
        $payment->payment_payer = $data['card']['name'];
        $payment->payment_amount = $this->toBaht($data['amount']);
        $payment->payment_status = $data['status'];

        $payment->save();

        return true;
    }

    public function toBaht($amount)
    {
        return $amount / 100;
    }

    public function toSatang($amount)
    {
        return $amount * 100;
    }
}
