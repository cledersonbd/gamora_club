<?php

namespace App\Http\Controllers;

use App\User;

class AdminController extends Controller
{
	public function index(){
		return 'index';
	}

    public function grant($id)
    {
        $user = User::findOrFail($id);
        $user->admin = !$user->admin;
        $user->save();
        return back();
	}
}

