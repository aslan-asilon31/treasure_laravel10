<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductImage;
use Storage;

class ProductImageController extends Controller
{
    public function index()
    {
        $productimages = ProductImage::all();
        return view('productimage.index', compact('productimages'));
    }
}
