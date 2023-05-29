<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductImage;
use App\Models\Product;
use App\Models\User;
use App\Models\ActivityLog;
use Storage;
use Alert;
use App\Http\Requests\ProductRequest;
use DB;


class ProductImageController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $productimages = ProductImage::all();
        $users = User::all();
        $productActivities = ActivityLog::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('productimage.index1', compact('products','productimages','users','productActivities'));
    }
    

    public function productColor(Request $request)
    {
        $color = $request->color;
        $productcolors = ProductImage::where('color', $color)->get();
        // return view('productimage.index1', compact('productcolors'));


        return response()->json($productcolors);

    }
    
        
    public function create()
    {
        $products = Product::all();
        return view('productimage.create', compact('products'));
    }


    public function store(Request $request)
    {
        // dd($request);
        // $validatedData = $request->validated();

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/productimages', $image->hashName());

        $productimage = ProductImage::create([
            'id'     => $request->id,
            'product_id'     => $request->product_id,
            'image'     => $image->hashName(),
            'title'   => $request->title,
            'color'   => $request->color,
            'description'     => $request->description,
            'slug'   => $request->slug,
        ]);



        if($productimage){
            //redirect dengan pesan sukses
            Alert::success('Congrats', 'You\'ve Successfully Add Product');
            return redirect()->route('productimages.index');
        }else{
            //redirect dengan pesan error
            Alert::error('Error', 'You\'ve Data Product Error to Add');
            return redirect()->route('productimages.index');
        }
    }

    // public function show(Product $product)
    // {
    //     return view('product.detail');
    // }

    public function edit(ProductImage $productimage)
    {
        return view('productimage.edit', compact('productimage'));
    }

    public function update(Request $request, ProductImage $productimage)
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
        $productimage = ProductImage::findOrFail($productimage->id);

        if($request->file('image') == "") {

            $productimage->update([
                'id'     => $request->id,
                'product_id'     => $request->product_id,
                'title'   => $request->title,
                'description'     => $request->description,
                'slug'   => $request->slug,
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/productimages/'.$productimage->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/productimages', $image->hashName());

            $productimage->update([
                'id'     => $request->id,
                'product_id'     => $request->product_id,
                'image'     => $image->hashName(),
                'title'   => $request->title,
                'description'     => $request->description,
                'slug'   => $request->slug,
            ]);

        }

        if($productimage){
            //redirect dengan pesan sukses
            // Alert::success('Congrats', 'You\'ve Successfully Updated Product');
            return redirect()->route('productimages.index');
        }else{
            //redirect dengan pesan error
            // Alert::error('Error', 'You\'ve Data Product Error to Update');
            return redirect()->route('productimages.index');
        }
    }


    public function deleteAllImage(Request $request)
    {
        $ids = $request->ids;
        DB::table("product_images")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Product Image Deleted successfully."]);
    }

}
