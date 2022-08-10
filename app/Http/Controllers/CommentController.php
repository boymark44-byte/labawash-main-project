<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    //
    public function index()
    {

    }

    //
    public function create()
    {
        return view('others.rating');
    }

    //
    public function store(Request $request)
    {
        $this->validate($request, [
            'comment_body' => 'required'
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->shop_id = $request->shop_id;
        $comment->comment_body = $request->comment_body;
        $comment->save();

        return redirect("api/mycart");
    }

    //
    public function show($id)
    {
        return view('others.rating')->with('shop_id', $id);
    }

    //
    public function edit($id)
    {
        //
    }

    //
    public function update(Request $request, $id)
    {
        //
    }

    //
    public function destroy($id)
    {
        //
    }
}
