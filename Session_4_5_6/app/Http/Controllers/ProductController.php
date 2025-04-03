<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProducts()
    {
        $product = Product::all();
        return view('welcome', compact('product'));
    }


    public function createProductPage(){
        $brands = Brand::all();
        return view('layout.createproduct', compact('brands'));
    }

    public function createProduct(Request $request){
        $validatedData = $request->validate([
            'Name' => ['required', 'min:5'],
            'Description' => ['required', 'min:20'],
            'Stock' => ['required', 'integer', 'min:0'],
            'Price' => ['required', 'integer', 'min:100'],
            'Production_Date' => ['required', 'date'],
            'brand_id' => 'required',
        ]);

        Product::create($validatedData);
        // return redirect()->route('product.view')->with('success', 'Product successfully created');
        return redirect()->route('product.view');
    }

    public function updateProductPage($id){
        $product = Product::find($id);
        $brands = Brand::all();
        return view('layout.update', compact('product', 'brands'));
    }

    public function updateProduct(Request $request, $id){
        $product = Product::find($id);

        $validatedData = $request->validate([
            'Name' => ['required', 'min:5'],
            'Description' => ['required', 'min:20'],
            'Stock' => ['required', 'integer', 'min:0'],
            'Price' => ['required', 'integer', 'min:100'],
            'Production_Date' => ['required', 'date'],
            'brand_id' => 'required',
        ]);

        $product->update($validatedData);
        return redirect()->route('product.view')->with('success', 'Product successfully updated');
    }

    public function deleteProduct($id){
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('product.view')->with('error', 'Product not found');
        }
        $product->delete();
        return redirect()->route('product.view')->with('success', 'Product successfully deleted');
    }

    public function searchProduct(Request $request){
        $product = Product::where('Name', 'like', '%' . $request->Name . '%')->get();
        return view('welcome', compact('product'));
    }
}
