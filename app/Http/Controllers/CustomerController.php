<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //

    public function index()
    {

        return view('customers.index', [
            'customers' => Customer::all()

        ]);
    }

    //
    public function create()
    {
        $shop = Shop::all();
        return view('customers.create', compact('shop'));
    }

    //
    public function store(Request $request)
    {
        $this ->validate($request, ['name' =>'required', 'address' =>'required', 'contact_number' =>'required']);

        // $shop = Shop::findOrFail($request->shop_id);
        // $shop->customers()->create([
        //     'name' => $request -> name,
        //     'address' => $request -> address,
        //     'contact_number' => $request -> contact_number
        // ]);

        $customer = new Customer();

        $customer->user_id = Auth::user()->id;
        $customer->shop_id = $request->shop_id;
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->contact_number = $request->contact_number;
        $customer->save();

        $id = DB::getPdo()->lastInsertId();
        return redirect()->route('loads.show', ['load'=> $id]);
    }

    //
    public function show($id)
    {
        return view('customers.create')->with('shop_id', $id);
    }

    //
    public function edit($id)
    {
        //
    }

    //
    public function update(Request $request, $id)
    {
        //
    }

    //
    public function destroy($id)
    {
        //
    }
}
