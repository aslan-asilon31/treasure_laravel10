<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }
    
    public function create()
    {
        return view('category.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'retro_model'   => 'required',
            'collaboration'   => 'required',
            'limited_edition'   => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/categories', $image->hashName());

        $category = Category::create([
            'id'     => $request->id,
            'name'     => $request->name,
            'image'     => $image->hashName(),
            'retro_model'   => $request->retro_model,
            'collaboration'   => $request->collaboration,
            'limited_edition'   => $request->limited_edition,
        ]);

        if($category){
            //redirect dengan pesan sukses
            return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('categories.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name'     => 'required',
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'retro_model'   => 'required',
            'collaboration'   => 'required',
            'limited_edition'   => 'required'
        ]);

        //get data Category by ID
        $category = Category::findOrFail($category->id);

        if($request->file('image') == "") {

            $category->update([
                'name'     => $request->name,
                'retro_model'   => $request->retro_model,
                'collaboration'   => $request->collaboration,
                'limited_edition'   => $request->limited_edition,
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/categories/'.$category->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/categories', $image->hashName());

            $category->update([
                'name'     => $request->name,
                'image'     => $image->hashName(),
                'retro_model'   => $request->retro_model,
                'collaboration'   => $request->collaboration,
                'limited_edition'   => $request->limited_edition,
            ]);

        }

        if($category){
            //redirect dengan pesan sukses
            return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('categories.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }


    public function destroy($id)
    {
    $category = Category::findOrFail($id);
    Storage::disk('local')->delete('public/categories/'.$category->image);
    $category->delete();

    if($category){
        //redirect dengan pesan sukses
        return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('categories.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }
}
