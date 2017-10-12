<?php

namespace App\Http\Controllers;

use App\Payment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminPaymentsController extends Controller
{
    public function index(){
        $payments = Payment::all();
        return view('admin.payments.index',compact('payments'));
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        return view('admin.payments.edit',compact('payment'));
    }

    public function update(Request $request,$id)
    {
        $payment = Payment::findOrFail($id);

        $payment->description = $request->input("description",'');
        $payment->name = $request->input("name",'');
        $payment->class = $request->input("class",'');
        $payment->active = $request->input("active",0);


        $payment->save();
        return back();
    }

    public function create()
    {
        $payment = new Payment();
        return view('admin.payments.new',compact('payment'));
    }
    public function store(Request $request)
    {
        $payment = Payment::create($request->all());


        return redirect()->to('/admin/payments');
    }

    public function delete($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete($id);
        return redirect()->to('/admin/payments');

    }
}

