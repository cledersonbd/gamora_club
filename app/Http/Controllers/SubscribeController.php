<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressAjaxRequest;
use App\Http\Requests\ConfirmSubscriptionAjaxRequest;
use App\Http\Requests\PaymentAjaxRequest;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('subscribe.index');
    }

    public function addressAjax(AddressAjaxRequest $request)
    {
        return 'address';
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
