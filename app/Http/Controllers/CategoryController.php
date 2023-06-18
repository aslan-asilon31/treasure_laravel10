<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Storage;
use App\Http\Requests\CategoryRequest;
use Yajra\DataTables\Facades\Datatables;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::select('*');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function($category) {
                    return '<img src="'.Storage::url('public/categories/').$category->image.'" class="rounded" style="width: 50px">';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('categories.show', $row->id) . '" class="detail btn btn-info btn-sm" style="color:white;"> <i class="fa fa-eye"></i> </a>';
                    $actionBtn .= '<a href="' . route('categories.edit', $row->id) . '" class="edit btn btn-success btn-sm"> <i class="fa fa-edit"></i> </a>';
                    $actionBtn .= '<a href="' . route('categories.destroy', $row->id) . '" class="delete btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>';
                    return $actionBtn;
                })
                ->rawColumns(['image','action'])
                ->make(true);
        }

        return view('category.index');
    }
    
    public function create()
    {
        return view('category.create');
    }


    public function store(CategoryRequest $request)
    {
        $validatedData = $request->validated();

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
            'slug'   => $request->slug,
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
        // dd($CategoryRequest);
        // $validatedData = $request->validated();


        //get data Category by ID
        $category = Category::findOrFail($category->id);

        if($request->file('image') == "") {

            $category->update([
                'name'     => $request->name,
                'retro_model'   => $request->retro_model,
                'collaboration'   => $request->collaboration,
                'limited_edition'   => $request->limited_edition,
                'slug'   => $request->slug,
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
                'slug'   => $request->slug,
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
