<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;


class Order extends Component
{
    public $count = 0, $products = [], $product_id, $message, $carts;

    public function increaseQty($id)
    {
        $cart = Cart::find($id);
        $cart->increment('product_qty', 1);
        $updatedPrice = $cart->product->price * $cart->product_qty;
        $cart->update(['product_price'=>$updatedPrice]);
        $this->mount();
    }

    public function decreaseQty($id)
    {
        $cart = Cart::find($id);
        if($cart->product_qty <= 0){
            $cart->decrement('product_qty', 1);
            $updatedPrice = $cart->product->price * $cart->product_qty;
            $cart->update(['product_price'=>$updatedPrice]);
        }
        $this->mount();

    }


    public function mount(){
        $this->products = Product::all();
        $this->carts = Cart::all();
    }

    public function insertIntoCart()
    {

        $product = Product::where('id',$this->product_id)->first();
        if(!$product){
            return $this->message = 'Product not found';
        }

        $oldcart = Cart::where('product_id', $this->product_id)->count();

        if($oldcart > 0){
            return $this->message = "Product {$product->product_name} already exists";
        }

        $newcart = new Cart;
        $newcart->product_id = $product->id;
        $newcart->product_qty = 1;
        $newcart->product_price = $product->price;
        $newcart->user_id = session()->get('user')->id;
        $newcart->save();

        $this->carts->prepend($newcart);
        $this->mount();

        return $this->message = "Product {$product->name} added";
    }

    public function removeCart( $id)
    {
        $flag = Cart::find($id)->delete();
        $this->carts->except($id);
        if($flag >0){
            return $this->message = "Product removed successfully";
        }
        return $this->message = "Failed to remove Product";
    }

    public function render()
    {
        return view('livewire.order');
    }
}
