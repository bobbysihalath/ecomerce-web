<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Brand;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(8);

        return view('users.phone-list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function insert(Request $request)
    {
        //
        $rules = [
            'name' => 'required|min:3',
            'brand' => 'required',
            'image' => 'required',
            'description' => 'required',
            'price' => 'required|numbers|min:1000',
            'discount' => 'required',
            'stock' => 'required',
        ];

        $request = request();
        $image = $request->file('image');

        $imageSaveAs = $image->getClientOriginalExtension();

        $upload_path = 'img/';
        $product_image = $upload_path.$imageSaveAs;
        $success = $image->move($upload_path, $imageSaveAs);

        $products = new Product();
        $products->name = $request->name;
        $products->brand = $request->brand;
        $products->image = $product_image;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->discount = $request->discount;
        $products->stock = $request->stock;
        $products->save();

        return redirect('/manage-product');
    }

    public function insertProduct()
    {
        $brand = Brand::all();
        return view('admins.insert-product',compact('brand'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        //
        $product = Product::find($request->id);

        $request = request();
        $image = $request->file('image');

        $imageSaveAs = $image->getClientOriginalExtension();

        $upload_path = 'img/';
        $product_image = $upload_path.$imageSaveAs;
        $success = $image->move($upload_path, $imageSaveAs);

        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->image = $product_image;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->stock = $request->stock;
        $product->save();

        return redirect('/manage-product');

    }

    public function updateProduct($id)
    {
        //
        $product = Product::find($id);
        $brand = Brand::all();

        return view('admins.update-product', compact('product','brand'));

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function delete($id){
        $product = Product::find($id);
        $product->delete();

        return redirect('/manage-product');

    }

    public function getAll(){
        $products = Product::all();
        $products = Product::paginate(8);

        return view('admins.manage-product', compact('products'));
    }

    public function edit($id){
        return view('admins.update-product', compact('id'));
    }

    public function insertComment(Request $request){

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->product_id = $request->product_id;
        $comment->user_id = Auth::user()->id;
        $comment->date = date('Y-m-d H:i:s');

        $comment->save();

        return redirect()->back();
    }

    public function searchProduct(Request $request){

        $query = $request->input('query');

        $products = Product::where('name', 'LIKE', "%$query%")->get();

        return view('search-result')->with('products', $products);
    }
}
