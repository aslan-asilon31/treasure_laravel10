<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Product;
use \Cart;

class VisitorController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $cartItems = \Cart::getContent();
        return view('visitor.landingpage' , compact('cartItems','categories','products'));
    }


}
