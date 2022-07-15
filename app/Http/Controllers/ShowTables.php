<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;

class ShowTables extends Controller
{
    public function showCustomer($id)
    {
        // return view('tables.customer', [
        //     'ctable' => Customer::findOrFail($id)
        // ]);

        $customerloads = Customer::where('id', $id)->with('loads')->first();
        return $customerloads;
    }
}
