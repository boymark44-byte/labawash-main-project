<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Load;
use App\Models\User;

class ApprovalController extends Controller
{

    public function accept($id)
    { 
        $user = Shop::with('user')->where('id', $id)->first();
        $user->approve = 1;
        $user->user->role = 2;
        $user->save();
        $user->user->save();

        return redirect()->route('shops.index');
    }

    public function cancel($id)
    {
        $data = User::with('shops')->where('id', $id)->first();
       $status = $data->status ==0 ;
        $user = Shop::with('user')->where('approve', '1')->where('id', $id)->first();
        // dd($status == 0);
        // dd(count($data->shops) < 1);
        if(count($data->shops)>0){
            $user->approve = 0;
            $user->save();
            return redirect()->route('shops.index');
        } else {
            $user->approve = 0;
            $user->user->role = 3;
            $user->save();
            $user->user->save();
            return redirect()->route('shops.index');
        }
       
        return redirect()->route('shops.index');
    }

    public function receive($id)
    {
       $data = Load::find($id);
       $data->receive = 0;
       $data->save();

       return redirect()->route('mycart');
    }
}
