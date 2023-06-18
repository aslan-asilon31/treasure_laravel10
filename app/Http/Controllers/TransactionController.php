<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Storage;
use Yajra\DataTables\Facades\Datatables;


class TransactionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Transaction::select('*');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('transactions.show', $row->id) . '" class="detail btn btn-info btn-sm" style="color:white;"> <i class="fa fa-eye"></i> </a>';
                    $actionBtn .= '<a href="' . route('transactions.edit', $row->id) . '" class="edit btn btn-success btn-sm"> <i class="fa fa-edit"></i> </a>';
                    $actionBtn .= '<a href="' . route('transactions.destroy', $row->id) . '" class="delete btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('transaction.index');
    }
}
