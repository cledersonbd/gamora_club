<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
	public function index(){
	    $users = User::all();
		return view('admin.users.index',compact('users'));
	}

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit',compact('user'));
	}

    public function update(Request $request,$id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->input("name",'');
        $user->email = $request->input("email",'');
        $user->phone = $request->input("phone",'');
        $user->address->cep = $request->input("cep",'');
        $user->address->street = $request->input("street",'');
        $user->address->number = $request->input("number",'');
        $user->address->extra = $request->input("extra",'');
        $user->address->city = $request->input("city",'');
        $user->address->state = $request->input("state",'');

        $user->save();
        $user->address->save();
        return back();
	}

    public function create()
    {
        return view('admin.users.new');
    }
    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->input("name",'');
        $user->email = $request->input("email",'');
        $user->phone = $request->input("phone",'');
        $user->password = Hash::make(time());
        $user->save();

        $user->address()->create([
            'user_id' => $user->id,
            'cep' => $request->input("cep",''),
            'street' => $request->input("street",''),
            'number' => $request->input("number",''),
            'extra' => $request->input("extra",''),
            'city' => $request->input("city",''),
            'state' => $request->input("state",''),
        ]);



        return redirect()->to('/admin/users');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete($id);
        return redirect()->to('/admin/users');

    }
}

