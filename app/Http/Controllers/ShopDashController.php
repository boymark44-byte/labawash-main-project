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

        $user = User::where('id', $id)->with('shops')->first();
        $shops = Shop::with('user')->where('approve', '1')->where('user_id', $id)->get();
        $index = User::where('id', $id)->with('shops')->select('id')->first();

        // return response()->json($user, 200);
        return view('/shop_dashboard', compact('user', 'shops', 'index'));

    }

    public function display($id){

        $shops = Shop::where('id', $id)->with('customers')->get();
        $customers = Customer::with('shops')->where('shop_id', $id)->get();
        $index = Shop::where('id', $id)->with('customers')->select('id')->first();

        // return response()->json($shops, 200);
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



    public function earnings($id){

        $user = User::where('id', $id)->with('shops')->get();
        $shops = Shop::with('user')->where('user_id', $id)->get();
        $customers = Customer::with('shops')->where('shop_id', $id)->get();
        $loads = Load::with('customer')->where('customers_id', $id)->get();
        $index = User::where('id', $id)->with('shops')->select('id')->first();

        return view('/earnings',compact('user', 'shops', 'customers', 'loads', 'index'));
    }

    public function search(Request $request){
        if(isset($_GET['query'])){
            $search_text=$_GET['query'];
            $shops = DB::table('shops')->where('shop_name','LIKE','%' .$search_text.'%')->where('approve', '1')->get();
            // $shops = DB::table('shops')->where('description','LIKE','%' .$search_text.'%')->get();
            // $shops = DB::table('shops')->where('category','LIKE','%' .$search_text.'%')->get();
            return view('search',['shops'=>$shops]);
        }else{
             return view('search');
        }
    }

}
