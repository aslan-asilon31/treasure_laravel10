<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
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
        return view('visitor.productdetail', compact('product'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'price'   => 'required',
            // 'size'   => 'required',
            // 'color'   => 'required',
            // 'status'   => 'required',
            'description'   => 'required',
            'image'     => 'required|image|mimes:png,jpg,jpeg',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        $product = Product::create([
            'id'     => $request->id,
            'name'     => $request->name,
            'price'   => $request->price,
            // 'size'   => $request->size,
            // 'color'   => $request->color,
            // 'status'   => $request->status,
            'description'   => $request->description,
            'image'     => $image->hashName(),
        ]);

        if($product){
            //redirect dengan pesan sukses
            return redirect()->route('products.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('products.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name'     => 'required',
            'price'   => 'required',
            // 'size'   => 'required',
            // 'color'   => 'required',
            // 'status'   => 'required',
            'description'   => 'required',
            'image'     => 'required|image|mimes:png,jpg,jpeg',
        ]);

        //get data Product by ID
        $product = Product::findOrFail($product->id);

        if($request->file('image') == "") {

            $product->update([
                'id'     => $request->id,
                'name'     => $request->name,
                'price'   => $request->price,
                // 'size'   => $request->size,
                // 'color'   => $request->color,
                // 'status'   => $request->status,
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
                'price'   => $request->price,
                // 'size'   => $request->size,
                // 'color'   => $request->color,
                // 'status'   => $request->status,
                'description'   => $request->description,
                'image'     => $image->hashName(),
            ]);

        }

        if($product){
            //redirect dengan pesan sukses
            return redirect()->route('products.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('products.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }


    public function destroy($id)
    {
    $product = Product::findOrFail($id);
    Storage::disk('local')->delete('public/products/'.$product->image);
    $product->delete();

    if($product){
        //redirect dengan pesan sukses
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('products.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }


}
