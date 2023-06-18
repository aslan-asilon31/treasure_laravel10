<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Midtrans\CreateSnapTokenService;
use App\Models\Order;
use App\Models\Payment;
use \Cart;
use App\Models\ProductDetail;
use App\Models\MultiplePrice;
use Yajra\DataTables\Facades\Datatables;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::select('*');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('orders.show', $row->id) . '" class="detail btn btn-info btn-sm" style="color:white;"> <i class="fa fa-eye"></i> </a>';
                    $actionBtn .= '<a href="' . route('orders.edit', $row->id) . '" class="edit btn btn-success btn-sm"> <i class="fa fa-edit"></i> </a>';
                    $actionBtn .= '<a href="' . route('orders.destroy', $row->id) . '" class="delete btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('order.index');
    }

    public function create(){

    }

    public function show(Order $order)
    {
        // dd($order);
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
        $productdetails = ProductDetail::all();
        $multipleprices = MultiplePrice::all();
        $cartItems = \Cart::getContent();

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
                        'order_id' => 12345, // New value for order_id
                        'gross_amount' => 100.00, // New value for gross_amount
                    ),
                );
                
        
                $snapToken = \Midtrans\Snap::getSnapToken($params);
                //   dd($snapToken);
                $payment = Payment::create([
                    'qty'     => $request->item_id,
                    'payment_total'     => $request->price_total,
                    'status'     => 'Unpaid',
                    'snap_token'     => $snapToken,
                ]);

                return view('visitor.order.checkout', compact('snapToken','cartItems','productdetails','multipleprices'));
    }
}
