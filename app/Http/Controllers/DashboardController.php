<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $brand = Brand::all()->count();
        $product = Product::all()->count();
        $comment = Comment::all()->count();

        return view(compact('product', 'brand', 'comment'));
    }
}
