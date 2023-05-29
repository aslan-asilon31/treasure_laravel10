<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\Product;
use Alert;

class ProductDetailController extends Controller
{
    public function index()
    {
        $productdetails = ProductDetail::latest()->get();
        return view('productdetail.index',compact('productdetails'));
    }
        
    public function create()
    {
        $products = Product::all();
        return view('productdetail.create', compact('products'));
    }

    public function store(Request $request)
    {
        // dd($request);

        //upload image

        $product = ProductDetail::create([
            'id'     => $request->id,
            'product_id'     => $request->product_id,
            'sold'     => $request->sold,
            'size'   => $request->size,
            'color'   => $request->color,
            'rating'   => $request->rating,
            'wishlist'   => $request->wishlist,
            'description'   => $request->description,
            'slug'   => $request->slug,
        ]);



        if($product){
            //redirect dengan pesan sukses
            Alert::success('Congrats', 'You\'ve Successfully Add Product');
            return redirect()->route('productdetails.index');
        }else{
            //redirect dengan pesan error
            Alert::error('Error', 'You\'ve Data Product Error to Add');
            return redirect()->route('productdetails.index');
        }
    }

    public function show()
    {
        $productdetails = ProductDetail::all();
        $products = Product::all();

        if (!$products) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        return view('productdetail.detail', compact('products'));
    }


    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        //get data Product by ID
        $product = ProductDetail::findOrFail($product->id);


        $product->update([
            'id'     => $request->id,
            'sold'     => $request->sold,
            'size'   => $request->size,
            'color'   => $request->color,
            'rating'   => $request->rating,
            'wishlist'   => $request->wishlist,
            'description'   => $request->description,
            'slug'   => $request->slug,
        ]);


        if($product){
            //redirect dengan pesan sukses
            // Alert::success('Congrats', 'You\'ve Successfully Updated Product');
            return redirect()->route('products.index');
        }else{
            //redirect dengan pesan error
            // Alert::error('Error', 'You\'ve Data Product Error to Update');
            return redirect()->route('products.index');
        }
    }
        
        public function deleteAllDetail(Request $request)
    {
        $ids = $request->ids;
        DB::table("product_details")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Product Details Deleted successfully."]);
    }

}
