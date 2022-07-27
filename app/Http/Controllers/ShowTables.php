<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Load;
use App\Models\Shop;

use function Ramsey\Uuid\v1;

class ShowTables extends Controller
{
    // when role is 2, this will display the loads of customer with id = $id
    public function showloads($id)
    {
        $customers = Customer::where('id', $id)->with('loads')->get();
        $loads = Load::with('customer')->where('customers_id', $id)->get();


        return view('tables.customerLoad')->with('loads', $loads);
    }

    // this will display the customer and load information after saving
    public function customertransaction($id)
    {

        $customers = Customer::where('id', $id)->with('loads')->get();
        $loads = Load::with('customer')->where('customers_id', $id)->get();
        $index = Customer::where('id', $id)->with('loads')->select('id')->first();

        return view('loads.index', compact('customers', 'loads', 'index'));
    }

    public function mycart()
    {
        $user = auth()->user()->customer()->get();
        $customers = Customer::with('loads')->get();

        // dd($customers);
        return view('tables.mycart', compact('customers'));
    }
}
