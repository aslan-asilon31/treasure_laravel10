<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryDetail;
use Yajra\DataTables\Facades\Datatables;

class CategoryDetailController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CategoryDetail::select('*');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('categorydetails.show', $row->id) . '" class="detail btn btn-info btn-sm" style="color:white;"> <i class="fa fa-eye"></i> </a>';
                    $actionBtn .= '<a href="' . route('categorydetails.edit', $row->id) . '" class="edit btn btn-success btn-sm"> <i class="fa fa-edit"></i> </a>';
                    $actionBtn .= '<a href="' . route('categorydetails.destroy', $row->id) . '" class="delete btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('categorydetail.index');
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
