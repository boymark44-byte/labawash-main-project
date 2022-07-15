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

        // $customer = Customer::findOrFail($request->customers_id);
        // $customer->loads()->create([
        //     'load_quantity' => $request->load_quantity,
        //     'additional_expenses' => $request->additional_expenses,
        //     'color_type' => $request->color_type,
        //     'load_selector' => $request->load_selector,
        //     'load_type' => $request->load_type,
        //     'description' => $request->description,
        // ]);
        // return redirect()->route('customers.index');

        Load::create([
            'customers_id' => $customers_id,
            'load_quantity' => $request->load_quantity,
            'additional_expenses' => $request->additional_expenses,
            'color_type' => $request->color_type,
            'load_selector' => $request->load_selector,
            'load_type' => $request->load_type,
            'description' => $request->description,
        ]);

        // $load = new Load();
        // $load->load_quantity = $request->load_quantity;
        // $load->additional_expenses = $request->additional_expenses;
        // $load->color_type = $request->color_type;
        // $load->load_selector = $request->load_selector;
        // $load->load_type = $request->load_type;
        // $load->description = $request->description;

        // auth()->customer()->loads()->create([
        //     'load_quantity' => $request -> load_quantity,
        //     'additional_expenses' => $request -> additional_expenses,
        //     'color_type' => $request -> color_type,
        //     'load_selector' => $request -> load_selector,
        //     'load_type' => $request -> load_type,
        //     'description' => $request -> description,
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($load)
    {
        $customer = Customer::get($load);
        return view('loads.create', compact('customer'));
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
