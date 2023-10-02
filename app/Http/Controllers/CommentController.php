<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Sodium\compare;

class CommentController extends Controller
{
    //
    public function index()
    {
        $comment = Comment::with('product','user')->get();

        return view('admins.comment.index', compact('comment'));
    }

    public function insertForm()
    {
        $product = Product::all();
        return view('admins.comment.insert-comment', compact('product'));
    }

    public function insert(Request $request)
    {
        $comment = new Comment();

        $comment->comment = $request->comment;
        $comment->product_id = $request->product_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return redirect('/comment/index');
    }

    public function getUpdate($id)
    {
        $comment = Comment::with('product')->find($id);
        $product = Product::all();
        return view('admins.comment.update',compact('comment','product'));
    }

    public function update(Request $request)
    {
        $comment =  Comment::find($request->id);

        $comment->comment = $request->comment;
        $comment->product_id = $request->product_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return redirect('/comment/index');
    }

    public function delete($id){
        $product = Comment::find($id);
        $product->delete();

        return redirect('/comment/index');

    }
}
