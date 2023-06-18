<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\Datatables;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Review::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('rating', function ($data) {
                    $stars = '';
                
                    if ($data->rating == 5) {
                        $stars = '<i class="fa fa-star star-filled"></i>
                                  <i class="far fa-star star-filled"></i>
                                  <i class="fas fa-star star-filled"></i>
                                  <i class="fas fa-star star-filled"></i>
                                  <i class="fas fa-star star-filled"></i>';
                    }

                    if ($data->rating == 4) {
                        $stars = '<i class="fa fa-star star-filled"></i>
                                  <i class="far fa-star star-filled"></i>
                                  <i class="fas fa-star star-filled"></i>
                                  <i class="fas fa-star star-filled"></i>';
                    }

                    if ($data->rating == 3) {
                        $stars = '<i class="fa fa-star star-filled"></i>
                                  <i class="fas fa-star star-filled"></i>
                                  <i class="fas fa-star star-filled"></i>';
                    }

                    if ($data->rating == 2) {
                        $stars = '<i class="fa fa-star star-filled"></i>
                                  <i class="fas fa-star star-filled"></i>';
                    }

                    if ($data->rating == 1) {
                        $stars = '<i class="fa fa-star star-filled"></i>';
                    }
                
                    return $stars;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('reviews.show', $row->id) . '" class="detail btn btn-info btn-sm" style="color:white;"> <i class="fa fa-eye"></i> </a>';
                    $actionBtn .= '<a href="' . route('reviews.edit', $row->id) . '" class="edit btn btn-success btn-sm"> <i class="fa fa-edit"></i> </a>';
                    $actionBtn .= '<a href="' . route('reviews.destroy', $row->id) . '" class="delete btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->escapeColumns([])
                ->make(true);
        }

        return view('review.index');
    }
}
