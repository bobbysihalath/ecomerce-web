<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();

        $brand = Brand::all()->count();
        $product = Product::all()->count();
        $comment = Comment::all()->count();

        $widget = [
            'users' => $users,
            //...
        ];

        return view('home', compact('widget','brand','product','comment'));

    }
}
