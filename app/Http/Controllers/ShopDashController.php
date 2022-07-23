<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopDashController extends Controller
{
    public function shop_dashboard(Request $request){
        if(isset($_GET['query'])){
            $search_text=$_GET['query'];
            $shops = DB::table('shops')->where('id','LIKE','%' .$search_text.'%')->paginate(100);
            $customers = DB::table('customers')->where('shop_id','LIKE','%' .$search_text.'%')->paginate(100);
            return view('shop_dashboard',['shops'=>$shops],['customers'=>$customers]);
        }   else{
                return view('shop_dashboard');
            }
    }
}
