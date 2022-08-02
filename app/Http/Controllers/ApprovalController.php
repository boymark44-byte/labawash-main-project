<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Load;

class ApprovalController extends Controller
{

    public function accept($id)
    {
        $data=Shop::find($id);
        $data->approve = 1;
        $data->save();

        return redirect()->route('shops.index');
    }

    public function cancel($id)
    {
        $data=Shop::find($id);
        $data->approve = 0;
        $data->save();

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
