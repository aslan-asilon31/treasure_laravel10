<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Storage;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('payment.index', compact('payments'));
    }
}
