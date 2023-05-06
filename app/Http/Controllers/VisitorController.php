<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Category;

class VisitorController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('visitor.landingpage' , compact('categories'));
    }
}
