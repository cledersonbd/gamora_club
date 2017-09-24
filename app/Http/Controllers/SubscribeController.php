<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressAjaxRequest;
use App\Http\Requests\ConfirmSubscriptionAjaxRequest;
use App\Http\Requests\PaymentAjaxRequest;
use App\PaymentGateway;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $address = auth()->user()->address;
        $paymentSession = PaymentGateway::getBrowserToken($request);

        return view('subscribe.index',compact('address','paymentSession'));
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
        return 'payment';
    }

    public function confirmAjax(ConfirmSubscriptionAjaxRequest $request)
    {
        return 'confirm';
    }
}
