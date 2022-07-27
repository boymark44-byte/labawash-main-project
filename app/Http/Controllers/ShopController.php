<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\DB;
use App\Models\Shop;
use App\Models\User;
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
        $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $this->validate($request, [
            'shop_name' =>'required',
            'shop_address' =>'required',
            'description' =>'required',
            // 'file' => [],

        ]);
        $url = $uploadedFileUrl;
        $shop = new Shop();

        $shop->user_id = Auth::user()->id;
        $shop->shop_name = ($request->input('shop_name'));
        $shop->shop_address = ($request->input('shop_address'));
        $shop->description = ($request->input('description'));
        $shop->image = $url;

        $shop->save();
        return redirect('/');



    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        $shop = Shop::find($id);
        return view('shops.show')->with('shops', $shop);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        $shop = DB::select('select * from shops where id = ?', [$id]);
        return view('shops.edit', ['shop'=>$shop]);
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
        // $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        // $url = $uploadedFileUrl;
        $image = $request->image;
        if ($image) {
        $shop_name = $request->input('shop_name');
        $shop_address = $request->input('shop_address');
        $description = $request->input('description');
        $image = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        DB::update('update shops set shop_name = ?, shop_address = ?, description = ?, image = ? where id = ?', [$shop_name, $shop_address, $description, $image, $id]);
        }
        else {

        $shop_name = $request->input('shop_name');
        $shop_address = $request->input('shop_address');
        $description = $request->input('description');
        DB::update('update shops set shop_name = ?, shop_address = ?, description = ? where id = ?', [$shop_name, $shop_address, $description, $id]);
        }


        // DB::update('update shops set shop_name = ?, shop_address = ?, description = ? where id = ?', [$shop_name, $shop_address, $description, $id]);
        return redirect('/shop_dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

}
