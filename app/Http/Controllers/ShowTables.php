<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Load;

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
        // $record = Customer::find($id);
        // $customers = $record->loads()->get();

        $customers = Customer::where('id', $id)->with('loads')->get();
        $loads = Load::with('customer')->where('customers_id', $id)->get();
        $index = Customer::where('id', $id)->with('loads')->select('id')->first();

        return view('loads.index', compact('customers', 'loads', 'index'));

        // dd($index);
    }

    public function shopcustomers($id)
    {
        // $record = Customer::find($id);
        // $customers = $record->loads()->get();

        $shops = Shop::where('id', $id)->with('customers')->get();
        $customers = Customer::with('shop')->where('shop_id', $id)->get();
        $index = Shop::where('id', $id)->with('customers')->select('id')->first();

        return view('loads.index', compact('customers', 'loads', 'index'));

        // dd($index);
    }
}
