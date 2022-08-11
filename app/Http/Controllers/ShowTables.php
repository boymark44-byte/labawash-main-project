<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Load;
use App\Models\Shop;
use App\Models\Expense;
use App\Models\User;

use function Ramsey\Uuid\v1;

class ShowTables extends Controller
{
    // when role is 2, this will display the loads of customer with id = $id
    public function showloads($id)
    {
        $customers = Customer::where('id', $id)->with('loads')->get();
        $loads = Load::with('customer')->where('customers_id', $id)->get();


        return view('tables.showloads')->with('loads', $loads);
    }

    // this will display the customer and load information after saving
    public function customertransaction($id)
    {

        $customers = Customer::where('id', $id)->with('loads')->get();
        $loads = Load::with('customer')->where('customers_id', $id)->get();
        $index = Customer::where('id', $id)->with('loads')->select('id')->first();

        // return response()->json($customers  , 200);
        return view('loads.index', compact('customers', 'loads', 'index'));
    }

    public function mycart()
    {
        $id = auth()->user()->id;
        $customers = Customer::with('loads', 'shops')->where('user_id', $id)->get();

        return view('tables.mycart', compact('customers'));

    }
}
