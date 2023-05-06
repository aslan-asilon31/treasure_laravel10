<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryDetail;

class CategoryDetailController extends Controller
{
    public function index()
    {
        $categorydetails = CategoryDetail::all();
        return view('categorydetail.index', compact('categorydetails'));
    }
    
    public function create()
    {
        return view('categorydetail.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id'     => 'required',
            'name'     => 'required',
            'description'     => 'required',
        ]);

        $categorydetail = CategoryDetail::create([
            'id'     => $request->id,
            'category_id'     => $request->category_id,
            'name'     => $request->name,
            'description'     => $request->description,
        ]);

        if($categorydetail){
            //redirect dengan pesan sukses
            return redirect()->route('categorydetails.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('categorydetails.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Category $categorydetail)
    {
        return view('categorydetail.edit', compact('category'));
    }

    public function update(Request $request, Category $categorydetail)
    {
        $this->validate($request, [
            'category_id'     => 'required',
            'name'     => 'required',
            'description'     => 'required',
        ]);

        //get data Category by ID
        $categorydetail = CategoryDetail::findOrFail($categorydetail->id);
        $categorydetail->update([
            'category_id'     => $request->category_id,
            'name'     => $request->name,
            'description'     => $request->description,
        ]);

        if($categorydetail){
            //redirect dengan pesan sukses
            return redirect()->route('categorydetails.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('categorydetails.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }


    public function destroy($id)
    {
    $categorydetail = CategoryDetail::findOrFail($id);
    $categorydetail->delete();

    if($categorydetail){
        //redirect dengan pesan sukses
        return redirect()->route('categorydetails.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('categorydetails.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }
}
