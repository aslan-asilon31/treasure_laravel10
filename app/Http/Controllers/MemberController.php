<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Storage;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('member.index', compact('members'));
    }
}
