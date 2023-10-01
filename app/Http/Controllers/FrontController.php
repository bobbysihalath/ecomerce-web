<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index(){

        $brand = Brand::with('product')->get();
        $product = Product::all();
        return view('front.index',compact('brand','product'));
    }
}
