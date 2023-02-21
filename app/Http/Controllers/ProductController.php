<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index(){
        $products = DB::table('products')->get();

        return view('products.index')
                ->with('products', $products);
    }
    function store(Request $request){

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->brand = $request->brand;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->alert_stock = $request->alert_stock;
        $product->save();

        return redirect()->route('product.index');
    }

    function edit($id){
        $product = DB::table('products')->find($id);
        return $product;
    }

    function update(Request $request){
        DB::table('products')->where('id', $request->id)->update([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'brand' => $request->brand,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'alert_stock' => $request->alert_stock,
        ]);

        return redirect()->route('product.index');

    }

    function destroy($id){
        // return "delete";
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('product.index');
    }
}
