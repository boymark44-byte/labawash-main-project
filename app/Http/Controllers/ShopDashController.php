<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Shop;
use App\Models\User;
use App\Models\Load;
use App\Models\Expense;
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
        $customers = Customer::with('shops')->where('shop_id', $id)->get();
        $index = Shop::where('id', $id)->with('customers')->select('id')->first();


        return view('/display', compact('shops', 'customers', 'index'));
    }

    public function destroy($id){

        $customers = Customer::find($id);
        $customers->delete();
        $index = $customers->shop_id;
        return redirect()->route('display', ['id'=>$index]);
    }

    public function show($id){

        $customer = Customer::find($id);
        return view('customers.show')->with('customers', $customer);
    }

    public function shop($id){

        $shop = Shop::find($id);
        return view('shops.shop')->with('shops', $shop);
    }

    public function customer_expenses($id)
    {
        $loads = Load::where('id', $id)->with('expenses')->get();
        $expenses = Expense::with('loads')->where('loads_id', $id)->get();
        $index = Load::where('id', $id)->with('expenses')->select('id')->first();

        return view('expenses.index', compact('loads', 'expenses', 'index'));
    }

    public function earnings($id){

        $user = User::where('id', $id)->with('shops')->get();
        $shops = Shop::with('user')->where('user_id', $id)->get();
        $customers = Customer::with('shops')->where('shop_id', $id)->get();
        $loads = Load::with('customer')->where('customers_id', $id)->get();
        $index = User::where('id', $id)->with('shops')->select('id')->first();


        return view('/earnings',compact('user', 'shops', 'customers', 'loads', 'index'));
    }
}
