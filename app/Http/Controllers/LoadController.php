<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Load;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class LoadController extends Controller
{
    //not used at the moment
    public function index()
    {

        return view('loads.rating');
    }

    //not used at the moment
    public function create()
    {
        $customer = Customer::all();
        return view('loads.create', compact('customer'));
    }

    //store load data
    public function store(Request $request)
    {
        $this->validate($request, [
            'load_quantity' => ['required', 'integer'],
            'additional_expenses' => ['required', 'integer'],
            'color_type' => 'required',
            'load_selector' => 'required',
            'load_type' => 'required',
            'description' => 'required',
        ]);

        $customer = Customer::findOrFail($request->customers_id);
        $customer->loads()->create([
            'load_quantity' => $request->load_quantity,
            'additional_expenses' => $request->additional_expenses,
            'color_type' => $request->color_type,
            'load_selector' => $request->load_selector,
            'load_type' => $request->load_type,
            'description' => $request->description,
        ]);
        $id = $customer->id;
        return redirect()->route('customertransaction', $id);
    }

    // passing foreign key to create load under customers_id
    public function show($id)
    {
        // $customer = Customer::get($id);
        // return view('loads.create', compact('customer'));
        return view('loads.create')->with('customers_id', $id);
    }

    //VIEW EDIT FORM
    public function edit($id)
    {
        // $load = Load::findOrFail($id);
        // dd($load->id);

        return view('loads.edit', [
            'load' => Load::findOrFail($id)
        ]);

    }

    //STORE EDITTED DATA
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required'
        ]);
        $load = Load::where('id', $id);
        $load->update(['status' => $request->status]);
        $id = $load->first()->customers_id;

        return redirect()->route('showloads', $id);
    }

    //
    public function destroy($id)
    {
        //
    }
}
