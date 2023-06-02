<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Midtrans\CreateSnapTokenService;

class OrderController extends Controller
{
    public function index(){
        return view('visitor.checkout');
    }
    public function show(Order $order)
    {
        dd($order);
        $snapToken = $order->snap_token;
        if (empty($snapToken)) {
            // Jika snap token masih NULL, buat token snap dan simpan ke database
 
            $midtrans = new CreateSnapTokenService($order);
            $snapToken = $midtrans->getSnapToken();
 
            $order->snap_token = $snapToken;
            $order->save();
        }
 
        return view('visitor.checkout', compact('order', 'snapToken'));
    }

    public function checkout( Request $request)
    {
        dd($request);
        // $this->validate($request,[

        // ])
        $request->request->add(['total_price' => $request->qty * 100000, 'status' => 'unpaid' ]);
        // dd($request);
        $order = Order::create($request->all());

        
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ),
            'customer_details' => array(
                'name' => $request->name,
                'phone' => $request->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);
        return view('checkout', compact('snapToken', 'order'));
    }
}
