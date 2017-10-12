<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressAjaxRequest;
use App\Http\Requests\ConfirmSubscriptionAjaxRequest;
use App\Http\Requests\PaymentAjaxRequest;
use App\Payment;
use App\PaymentGateway;
use App\Plans;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $address = auth()->user()->address;
        $plans = Plans::whereActive(1)->get();
        $paymentSession = PaymentGateway::getBrowserToken();
        $paymentMethods = Payment::whereActive(1)->get();
        return view('subscribe.index',compact('address','plans','paymentSession','paymentMethods'));
    }

    public function addressAjax(AddressAjaxRequest $request)
    {
        $address = auth()->user()->address()->first();
        if(!$address){
            $address = auth()->user()->address()->create($request->all());
        }else{
            $address->update($request->all());
        }
        return $address;
    }

    public function paymentAjax(PaymentAjaxRequest $request)
    {
        dd($request->all());
        return 'payment';
    }

    public function confirmAjax(ConfirmSubscriptionAjaxRequest $request)
    {
        return 'confirm';
    }
}
