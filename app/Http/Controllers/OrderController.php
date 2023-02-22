<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    function index(){
        $products = DB::table('products')->get();
        $orders = DB::table('orders')->get();
        $lastID = DB::table('order_details')->max('order_id');
        $order_receipt = Order_Detail::where('order_id', $lastID)->get();

        return view('orders.index',[
            'products' => $products,
            'orders' => $orders,
            'order_receipt' => $order_receipt,
        ]);

    }
    function store(Request $request){
        // dd($request->all());
        DB::transaction(function() use ($request) {

            //oder modal
            $order = new Order;
            $order->name = $request->customer_name;
            $order->address = "phnompenh";
            $order->save();
            $order_id = $order->id;

            //oder detail modal
            for($i = 0; $i < count($request->product_id); $i++)
            {
                $order_detail = new Order_Detail;
                $order_detail->order_id = $order_id;
                $order_detail->product_id = $request->product_id[$i];
                $order_detail->quantity = $request->quantity[$i];
                $order_detail->unitprice= $request->price[$i];
                $order_detail->amount = $request->total[$i];
                $order_detail->discount = $request->discount[$i];
                $order_detail->save();
            }

            // transaction modal
            $transaction = new Transaction;
            $transaction->order_id = $order_id;
            $transaction->paid_amount = $request->payment;
            $transaction->balance = $request->cash_return;
            $transaction->payment_method = 'cash';
            $transaction->user_id = session()->get('user')->id;
            $transaction->transac_date = date("Y-m-d");
            $transaction->transac_amount = $request->total_amount;
            $transaction->save();

            Cart::where('user_id', session()->get('user')->id)->delete();

            //last order history
            // $products = DB::tabele('products')->get();
            // $order_details = DB::tabele('order_details')->where('order_id', $order_id)->get();
            // $orderedBy = DB::tabele('orders')->where('id', $order_id)->get();


            // return view('orders.index', [
            //     'products' => $products,
            //     'order_details' => $order_details,
            //     'customer_orders' => $orderedBy,
            // ]);

        });
        return redirect()->route('order.index');
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
