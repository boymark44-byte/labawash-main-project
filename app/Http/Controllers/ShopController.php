<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if ( Auth::user()->role == 1){
        return view('shops.index', [
            'shops' => Shop::all()

        ]);
        } else {
            return view('shops.index', [
                'shops' => Shop::where('approve', '1')->get()

            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request ->validate([
            'shop_name' =>'required',
            'shop_address' =>'required',
            'description' =>'required',

        ]);

        $shop = new Shop();

        $shop->shop_name = strip_tags($request->input('shop_name'));
        $shop->shop_address = strip_tags($request->input('shop_address'));
        $shop->description = strip_tags($request->input('description'));


        $shop->save();



        return redirect()->route('shops.index');

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Shop::find($id);
        $data->approve = 1;
        $data->save();

        return redirect()->route('shops.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Shop::find($id);
        $data->approve = 0;
        $data->save();

        return redirect()->route('shops.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $shop->delete();
        return redirect()->route('shops.index');
    }

}
