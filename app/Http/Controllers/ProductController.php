<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

        
    public function create()
    {
        return view('product.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'price'   => 'required',
            'size'   => 'required',
            'color'   => 'required',
            'status'   => 'required',
            'description'   => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        $product = Product::create([
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
            return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('categories.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Category $product)
    {
        return view('product.edit', compact('category'));
    }

    public function update(Request $request, Category $product)
    {
        $this->validate($request, [
            'name'     => 'required',
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'price'   => 'required',
            'size'   => 'required',
            'color'   => 'required',
            'status'   => 'required',
            'description'   => 'required',
        ]);

        //get data Product by ID
        $product = Product::findOrFail($product->id);



        
        if($request->file('image') == "") {

            $product->update([
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
            return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('categories.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }


    public function destroy($id)
    {
    $product = Product::findOrFail($id);
    Storage::disk('local')->delete('public/categories/'.$product->image);
    $product->delete();

    if($product){
        //redirect dengan pesan sukses
        return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('categories.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }


}
