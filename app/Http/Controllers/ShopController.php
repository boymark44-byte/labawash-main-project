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
    /*  display shops needed to be approve when role is 1 and displays all approved shops
        when role is customer */

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

    //view shop create form
    public function create()
    {

        return view('shops.create');
    }

    //store data from create form
    public function store(Request $request)
    {

        $this->validate($request, [
            'shop_name' =>'required',
            'shop_address' =>'required',
            'price' =>'required',
            'description' =>'required',
            // 'file' => [],

        ]);
        // $url = $uploadedFileUrl;
        $shop = new Shop();
        if( ! $request->file('image')){
            $shop->user_id = Auth::user()->id;
            $shop->shop_name = ($request->input('shop_name'));
            $shop->shop_address = ($request->input('shop_address'));
            $shop->price = ($request->input('price'));
            $shop->description = ($request->input('description'));
        $shop->save();

        return redirect('/');
        }
        else{
        $uploadedFileUrl = Cloudinary::upload($request->file('image')->getPathname())->getSecurePath();
        }
        $url = $uploadedFileUrl;
        $shop->user_id = Auth::user()->id;
        $shop->shop_name = ($request->input('shop_name'));
        $shop->shop_address = ($request->input('shop_address'));
        $shop->price = ($request->input('price'));
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

    public function update(Request $request, $id)
    {
        // $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        // $url = $uploadedFileUrl;
        $image = $request->image;
        if ($image) {
        $shop_name = $request->input('shop_name');
        $shop_address = $request->input('shop_address');
        $price = $request->input('price');
        $description = $request->input('description');
        $image = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        DB::update('update shops set shop_name = ?, shop_address = ?, price = ?, description = ?, image = ? where id = ?', [$shop_name, $shop_address, $price, $description, $image, $id]);
        }
        else {

        $shop_name = $request->input('shop_name');
        $shop_address = $request->input('shop_address');
        $price = $request->input('price');
        $description = $request->input('description');
        DB::update('update shops set shop_name = ?, shop_address = ?, price = ?, description = ? where id = ?', [$shop_name, $shop_address, $price, $description, $id]);
        }


        // DB::update('update shops set shop_name = ?, shop_address = ?, description = ? where id = ?', [$shop_name, $shop_address, $description, $id]);
        return redirect()->route('shop_dashboard', ['id'=>Auth::id()]);
    }

    public function destroy($id)
    {

    }

}
