<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function getBrand(){
        $brands = Brand::all();
        return view('.layout/createbrand', compact('brands'));
    }

    public function createBrand(Request $request){
        $request->validate([
            'name'=>'required',
            'description'=>'required'
        ]);

        $brand = Brand::create([
            'name'=>$request->name
        ]);

        $brand->detail()->create([
            'description'=> $request->description
        ]);
        
        return redirect()->route('product.view');
    }
}
