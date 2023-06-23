<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    
    public function create()
    {
        $accounts = Account::get();
        return view('accounts.create',compact('accounts'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'account_id' => 'required',
            'name' => 'required',
            'desc' => 'required',
        ]);
    
        $accounts = Account::create(
            ['account_id' => $request->input('account_id')],
            ['name' => $request->input('name')],
            ['desc' => $request->input('desc')],
        );

        return redirect()->route('accounts.index')
                        ->with('success','Account created successfully');
    }

    public function show($id)
    {
        $accounts = Account::find($id);
    
        return view('accounts.show',compact('accounts'));
    }

    public function edit($id)
    {
        $accounts = Account::find($id);    
        return view('accounts.edit',compact('accounts'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'account_id' => 'required',
            'name' => 'required',
            'desc' => 'required',
        ]);
    
        $account = Account::find($id);
        $account->account_id = $request->input('account_id');
        $account->name = $request->input('name');
        $account->desc = $request->input('desc');
        $account->save();
    
        return redirect()->route('accounts.index')
                        ->with('success','Account updated successfully');
    }

    public function destroy($id)
    {
        DB::table("accounts")->where('id',$id)->delete();
        return redirect()->route('accounts.index')
                        ->with('success','Account deleted successfully');
    }
}
