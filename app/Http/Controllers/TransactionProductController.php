<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionProduct;
use Storage;

class TransactionProductController extends Controller
{
    public function index()
    {
        $transactionproducts = TransactionProduct::all();
        return view('transactionproduct.index', compact('transactionproducts'));
    }
}
