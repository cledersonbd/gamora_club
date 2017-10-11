<?php

namespace App\Http\Controllers;

use App\Plans;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminPlansController extends Controller
{
	public function index(){
	    $plans = Plans::all();
		return view('admin.plans.index',compact('plans'));
	}

    public function edit($id)
    {
        $plan = Plans::findOrFail($id);
        return view('admin.plans.edit',compact('plan'));
	}

    public function update(Request $request,$id)
    {
        $plan = Plans::findOrFail($id);

        $plan->description = $request->input("description",'');
        $plan->name = $request->input("name",'');
        $plan->hash = $request->input("hash",'');
        $plan->active = $request->input("active",0);


        $plan->save();
        return back();
	}

    public function create()
    {
        $plan = new Plans();
        return view('admin.plans.new',compact('plan'));
    }
    public function store(Request $request)
    {
        $plan = Plans::create($request->all());


        return redirect()->to('/admin/plans');
    }

    public function delete($id)
    {
        $plan = Plans::findOrFail($id);
        $plan->delete($id);
        return redirect()->to('/admin/plans');

    }
}

