<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Gallery;
use Storage;
use Alert;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('product.index', compact('products'));
    }

    public function productList()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('visitor.landingpage', compact('products','categories'));
    }

        
    public function create()
    {
        return view('product.create');
    }

    public function show(Product $product)
    {
        // $products = $product->galleries()->get();
        // dd($products);
        return view('visitor.productdetail', compact('product'));
    }

    public function store(ProductRequest $request)
    {
        $validatedData = $request->validated();

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        $product = Product::create([
            'id'     => $request->id,
            'name'     => $request->name,
            'image'     => $image->hashName(),
            'price'   => $request->price,
            'size'   => $request->size,
            'color'   => $request->color,
            'status'   => $request->status,
            'description'   => $request->description,
        ]);



        if($product){
            //redirect dengan pesan sukses
            Alert::success('Congrats', 'You\'ve Successfully Add Product');
            return redirect()->route('products.index');
        }else{
            //redirect dengan pesan error
            Alert::error('Error', 'You\'ve Data Product Error to Add');
            return redirect()->route('products.index');
        }
    }

    // public function show(Product $product)
    // {
    //     return view('product.index');
    // }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // dd($request);
        // $validatedData = $request->validated();

        // $this->validate($request, [
        //     'name'     => 'required',
        //     'image'     => 'required|image|mimes:png,jpg,jpeg',
        //     'price'   => 'required',
        //     'size'   => 'required',
        //     'color'   => 'required',
        //     'status'   => 'required',
        //     'description'   => 'required',
        // ]);

        //get data Product by ID
        $product = Product::findOrFail($product->id);

        if($request->file('image') == "") {

            $product->update([
                'id'     => $request->id,
                'name'     => $request->name,
                'price'   => $request->price,
                'size'   => $request->size,
                'color'   => $request->color,
                'status'   => $request->status,
                'description'   => $request->description,
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/products/'.$product->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());

            $product->update([
                'id'     => $request->id,
                'name'     => $request->name,
                'image'     => $image->hashName(),
                'price'   => $request->price,
                'size'   => $request->size,
                'color'   => $request->color,
                'status'   => $request->status,
                'description'   => $request->description,
            ]);

        }

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


    public function destroy($id)
    {
    $product = Product::findOrFail($id);
    Storage::disk('local')->delete('public/products/'.$product->image);
    $product->delete();

    }


}
