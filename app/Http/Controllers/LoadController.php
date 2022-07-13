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
        return view('loads.create');
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

        $customer = new Customer();
        $customer->save();

        $load = new Load();
        $load->load_quantity = $request->load_quantity;
        $load->additional_expenses = $request->additional_expenses;
        $load->color_type = $request->color_type;
        $load->load_selector = $request->load_selector;
        $load->load_type = $request->load_type;
        $load->description = $request->description;
        $load->customer()->associate($customer);
        $load->save();
        return redirect()->route('customers.index');

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
    public function show($id)
    {

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
