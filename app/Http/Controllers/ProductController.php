<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\User;
use App\Models\ActivityLog;
use Storage;
use Alert;
use App\Http\Requests\ProductRequest;
use DB;
use \Cart;
use Http;
use Yajra\DataTables\Facades\Datatables;

class ProductController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    // public function index()
    // {
    //     $productdetails = ProductDetail::all();
    //     $products = Product::all();
    //     $users = User::all();
    //     $cartItems = \Cart::getContent();
    //     $productActivities = ActivityLog::all();
    //     $title = 'Delete User!';
    //     $text = "Are you sure you want to delete?";
    //     confirmDelete($title, $text);
    //     return view('product.index', compact(
    //         'products',
    //         'users',
    //         'cartItems',
    //         'productActivities',
    //         'productdetails'
    //     ));
    // }

    //using yajra data tables
    // public function index(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = Product::select('*');

    //         return Datatables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('image', function($product) {
    //                 return '<img src="'.Storage::url('public/products/').$product->image.'" class="rounded" style="width: 50px">';
    //             })
    //             ->addColumn('action', function ($row) {
    //                 $actionBtn = '<a href="' . route('products.show', $row->id) . '" class="detail btn btn-info btn-sm" style="color:white;"> <i class="fa fa-eye"></i> </a>';
    //                 $actionBtn .= '<a href="' . route('products.edit', $row->id) . '" class="edit btn btn-success btn-sm"> <i class="fa fa-edit"></i> </a>';
    //                 $actionBtn .= '<a href="' . route('products.destroy', $row->id) . '" class="delete btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>';
    //                 return $actionBtn;
    //             })
    //             ->rawColumns(['image','action'])
    //             ->make(true);
    //     }

    //     return view('product.index');
    // }

    public function index()
    {
        $response = Http::get('http://localhost:8000/api/product');
        // $response = Http::get('https://jsonplaceholder.typicode.com/todos');
        $products1 = json_decode($response->body());
        $products = json_decode(json_encode($products1));
        
        // dd($product);

        return view('product.indexi', compact('products'));
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

    public function show($id)
    {
        $productdetails = ProductDetail::all();
        $products = Product::find($id);

        if (!$products) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        return view('productdetail.detail', compact('products','productdetails'));
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validated();

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        $product = Product::create([
            'id'     => $request->id,
            'name'     => $request->name,
            'image'     => $image->hashName(),
            // 'price'   => $request->price,
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
    //     return view('product.detail');
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
                'stock'   => $request->stock,
                'discount'   => $request->discount,
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


    // public function destroy($id)
    // {
    //     $product = Product::findOrFail($id);
    //     Storage::disk('local')->delete('public/products/'.$product->image);
    //     $product->delete();
    //         return redirect()->route('products.index');

    // }
        
        public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $productimage = $request->image;

        if($productimage == 'product-blank.png' ){
            DB::table("products")->whereIn('id',explode(",",$ids))->delete();
            return response()->json(['success'=>"Products Deleted successfully."]);
        }else{
            Storage::disk('local')->delete('public/products/'.$productimage);
            DB::table("products")->whereIn('id',explode(",",$ids))->delete();
            return response()->json(['success'=>"Products Deleted successfully."]);
        }


    }


            
    public function deleteAllDetail(Request $request)
    {
        $ids = $request->ids;
        DB::table("product_details")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Product Details Deleted successfully."]);
    }


}
