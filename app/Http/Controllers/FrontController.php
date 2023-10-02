<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    //
    public function index(){

        $brand = Brand::with('product')->get();
        $product = Product::all();
        return view('front.index',compact('brand','product'));
    }

    public function detail($id){
        $product= Product::with('brand','comment.user')->find($id);
        return view('front.detail',compact('product'));
    }

    public function insertComment(Request $request){
        $comment= new Comment();
        $comment->product_id = $request->product_id;
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect('/client/detail/'.$request->product_id);
    }
}
