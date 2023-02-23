<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Picqer\Barcode\BarcodeGeneratorHTML;

class ProductController extends Controller
{
    function index(){
        $products = DB::table('products')->get();

        return view('products.index')
                ->with('products', $products);
    }
    function store(Request $request){

        $product_code = rand(106890122, 100000000);
        // return $product_code;

        $redColor = '255, 0, 0';
        $generator = new BarcodeGeneratorHTML();
        $barcode =  $generator->getBarcode($product_code, $generator::TYPE_STANDARD_2_5, 2, 60);

        $product = new Product;
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->brand = $request->brand;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->alert_stock = $request->alert_stock;
        $product->product_code = $product_code;
        $product->barcode = $barcode;
        $product->save();

        return redirect()->route('product.index');
    }

    function edit($id){
        $product = DB::table('products')->find($id);
        return $product;
    }

    function update(Request $request){
        $product_code = rand(106890122, 100000000);

        $redColor = '255, 0, 0';
        $generator = new BarcodeGeneratorHTML();
        $barcode =  $generator->getBarcode($product_code, $generator::TYPE_STANDARD_2_5, 2, 60);

        DB::table('products')->where('id', $request->id)->update([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'brand' => $request->brand,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'alert_stock' => $request->alert_stock,
            'product_code' => $product_code,
            'barcode' => $barcode,
        ]);

        return redirect()->route('product.index');

    }

    function destroy($id){
        // return "delete";
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('product.index');
    }
    function productBarcode(){
        $products_barcode = Product::select('barcode', 'product_code')->get();
        // return $products;
        return view('products.barcode.index', ['products_barcode' => $products_barcode]);
    }
}
