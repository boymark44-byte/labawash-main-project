<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('shops.index', [
            'shops' => Shop::all()

        ]);
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
        // $newImageName = time() . '-' . $request->name . '.' . $request-> image->extension();

        // $request->image->move(public_path('images'), $newImageName);
        // $shop = Shop::create([
        //     'shop_name' =>$request->input('shop_name'),
        //     'shop_address' =>$request->input('shop_address'),
        //     'description' =>$request->input('description'),
        //     'image' =>  $newImageName
        // ]);


        // if($request->hasFile('image')) {
        //     $shop['image'] = $request->file('image')->store('images', 'public');
        // }

        // Shop::create($shop);


        $shop->shop_name = strip_tags($request->input('shop_name'));
        $shop->shop_address = strip_tags($request->input('shop_address'));
        $shop->description = strip_tags($request->input('description'));


        $shop->save();
        // $shop = $request->all();
        // $fileName = time().$request->file('image');
        // $path = $request->file('image')->storeAs('images', $fileName, 'public');
        // $shop["image"]='/storage/' .$path;
        // Shop::create($shop);



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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
