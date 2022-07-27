<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Shop;
use App\Models\User;

class ShopDashController extends Controller
{
    public function shop_dashboard($id){

        $user = User::where('id', $id)->with('shops')->get();
        $shops = Shop::with('user')->where('user_id', $id)->get();
        $index = User::where('id', $id)->with('shops')->select('id')->first();


        return view('/shop_dashboard', compact('user', 'shops', 'index'));
    }

    public function display($id){

        $shops = Shop::where('id', $id)->with('customers')->get();
        $customers = Customer::with('shop')->where('shop_id', $id)->get();
        $index = Shop::where('id', $id)->with('customers')->select('id')->first();


        return view('/display', compact('shops', 'customers', 'index'));
    }

    public function destroy($id){

        $customers = Customer::find($id);
        $customers->delete();
        return view('/shop_dashboard');
    }

    public function show($id){

        $customer = Customer::find($id);
        return view('customers.show')->with('customers', $customer);
    }

    public function shop($id){

        $shop = Shop::find($id);
        return view('shops.shop')->with('shops', $shop);
    }
}
