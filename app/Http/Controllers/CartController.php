<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Cart;
use App\Models\Payment;
use App\Models\ProductDetail;
use App\Models\MultiplePrice;

class CartController extends Controller
{
    public function cartList()
    {

        $productdetails = ProductDetail::all();
        $multipleprices = MultiplePrice::all();
        $cartItems = \Cart::getContent();
        return view('visitor.cart', compact('cartItems','productdetails','multipleprices'));
    }

    public function productCheckout(Request $request)
    {
        $cartItems = \Cart::getContent();
        dd($request);

        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        $products = Product::all();
        $categories = Category::all();
        return view('visitor.landingpage', compact('products','categories'));
    }


    public function addToCart(Request $request)
    {
        // dd($request);
        $multipleprices = MultiplePrice::all();
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);

        // $payment = Payment::create([
        //     'order_id' => $request->id,
        //     'payment_code' => $request->id,
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'quantity' => $request->quantity,
        //     'amount' => $amounts,
        // ]);

        foreach($multipleprices as $mp)
        {
            if($mp->id == $request->id ){
    
        
                // $amounts = $request->price * $request->quantity;
        
                $payment = Payment::create([
                    'product_id' => $request->id,
                    'order_id' => $request->id,
                    'payment_code' => $request->id,
                    'name' => $request->name,
                    'price' => $request->price,
                    'discount' => $request->discount,
                    'total_price' => $request->total_price,
                    'quantity' => $request->quantity,
                ]);

            }

        }

        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        // dd($request->id);
        $multipleprices = MultiplePrice::all();

        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );


        $payment = Payment::where('order_id',$request->id)->firstOrFail();
        // dd($payment);
        if ($payment) {
            $payment->update([
                'quantity' => $request->quantity,
            ]);
        }

        $multipleprice = MultiplePrice::where('product_id',$request->id)->firstOrFail();
        // dd($multipleprice);
        if ($multipleprice) {
            $multipleprice->update([
                'price' => $request->price,
                'discount' => $request->discount,
                'total_price' => $request->total_price,
            ]);
        }

        
        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        $payment = Payment::where('order_id',$request->id);
        $payment->delete();
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart(Request $request)
    {
        \Cart::clear();
        $payment->truncate();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
