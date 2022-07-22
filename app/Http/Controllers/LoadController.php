<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Load;
use Illuminate\Support\Facades\Auth;

class LoadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        return view('loads.create', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $customer = Customer::get($id);
        // return view('loads.create', compact('customer'));
        return view('loads.create')->with('customers_id', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
