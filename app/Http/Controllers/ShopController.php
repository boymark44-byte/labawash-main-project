<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\DB;

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
        $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $request ->validate([
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

    // display shop information
    public function show($id)
    {
        $shop = Shop::find($id);
        return view('shops.show')->with('shops', $shop);
    }

    // edit shop information
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

    public function destroy($id)
    {

    }

}
