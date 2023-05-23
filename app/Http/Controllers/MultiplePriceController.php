<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MultiplePrice;
use Storage;

class MultiplePriceController extends Controller
{
    public function index()
    {
        $multiprices = MultiplePrice::all();
        return view('multipleprice.index', compact('multiprices'));
    }

    public function create()
    {
        return view('multipleprice.create');
    }
}
