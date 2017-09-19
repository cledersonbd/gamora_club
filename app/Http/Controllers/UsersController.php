<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeEmailRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ChangePhoneRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function settings(Request $request)
    {
//        $request->session()->flash('status', 'Task was successful!');
        return view('user.settings');
    }

    public function email(ChangeEmailRequest $request)
    {
        $user = Auth::user();
        $user->email = $request->input('email');
        Auth::user()->save();
        return redirect()->to('/settings');
    }

    public function phone(ChangePhoneRequest $request)
    {
        $user = Auth::user();
        $user->phone = $request->input('phone');
        $user->save();
        return redirect()->to('/settings');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $request->validate();
        $user = Auth::user();
        $user->password = Hash::make($request->input('new-password'));
        $user->save();
        Session::flash('status','Sua senha foi alterada com sucesso!');
        return redirect()->to('/settings');
    }
}
