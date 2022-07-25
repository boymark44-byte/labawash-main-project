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
    public function showLoads($id)
    {
        // return view('tables.customer', [
        //     'ctable' => Customer::findOrFail($id)
        // ]);

        // $customerloads = Customer::where('id', $id)->with('loads')->first();
        // return $customerloads;

        // return view('tables.customerLoad', compact('customerloads'));

        // return redirect()->route('shop_dashboard');

        $customers = Customer::where('id', $id)->with('loads')->get();
        $loads = Load::with('customer')->where('customers_id', $id)->get();


        return view('tables.customerLoad')->with('loads', $loads);
    }

    public function customertransaction($id)
    {
        $customers = Customer::where('id', $id)->with('loads')->get();
        $loads = Load::with('customer')->where('customers_id', $id)->get();
        $index = Customer::where('id', $id)->with('loads')->select('id')->first();


        return view('loads.index', compact('customers', 'loads', 'index'));
    }
}
