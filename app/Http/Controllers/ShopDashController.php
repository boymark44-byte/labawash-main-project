<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopDashController extends Controller
{
    public function shop_dash(Request $request){
        if(isset($_GET['query'])){
            $search_text=$_GET['query'];
            $customers = DB::table('customers')->where('shop_id','LIKE','%' .$search_text.'%')->paginate(100);
            return view('shop_dash',['customers'=>$customers]);
        }else{
             return view('shop_dash');
        }
    }
}
