<?php

namespace App\Http\Controllers;


use App\Models\Brand;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class BrandController extends Controller
{
     /**
     * Show the form for insert a new resource.
     *
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function insert(Request $request){
        $rules = [
            'name' => 'required|unique:brands',
        ];

        $brand = new Brand();
        $brand->name = $request->name;

        $brand->save();

        return redirect('/manage-brand');
    }

    public function insertBrand(){
        return view('admins.insert-brand');
    }

    public function getAll(){
        $brands = Brand::all();

        return view('admins.manage-brand', compact('brands'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        //
        $brand = Brand::find($id);
        $brand->delete();

        return redirect('/manage-brand');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {

        $brand = Brand::find($request->id);

        $brand->name = $request->name;
        $brand->save();

        return redirect('/manage-brand');
    }

    public function updateBrand($id){
        $brand = Brand::find($id);

        return view('admins.update-brand', compact('brand'));
    }


}
