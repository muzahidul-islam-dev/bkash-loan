<?php

namespace App\Http\Controllers;

use App\Models\PaymentConfigure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function paymentConfigure()
    {
        $paymentData = PaymentConfigure::first();
        return view('admin.pages.payment.configure', compact('paymentData'));
    }
    public function paymentConfigureSave(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'app_key' => 'required',
            'secret_key' => 'required'
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                notyf()->error($error);
            }
            return back()->withInput();
        }

        PaymentConfigure::updateOrCreate(['id' => 1], $request->only('username', 'password', 'app_key', 'secret_key'));
        notyf()->success('Settings save successfully');
        return back();

    }
}
