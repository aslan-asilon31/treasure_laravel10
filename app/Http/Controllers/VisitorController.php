<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Product;

class VisitorController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('visitor.landingpage' , compact('categories','products'));
    }


}
