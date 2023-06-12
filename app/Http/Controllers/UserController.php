<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Storage;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Model_has_roles;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $users = User::orderBy('id','DESC')->paginate(5);
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('user.index', compact('users','roles','permissions'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function export_excel() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function export_csv() 
    {
        return Excel::download(new UsersExport, 'users.csv');
    }

    public function export_pdf() 
    {
        return Excel::download(new UsersExport, 'users.pdf');
    }

        public function is_online(Request $request)
    {
        $last_seen = User::select("*")
                        ->whereNotNull('last_seen')
                        ->orderBy('last_seen', 'DESC')
                        ->paginate(10);
        return view('user.index', compact('last_seen'));
    }
          
      
    
    public function show()
    {

    }
    
    public function create()
    {
        $roles = Role::all();
        return view('user.create',compact('roles'));
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validated();

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/users', $image->hashName());

        $add_slug = $request->slug;

        $change_slug = str_replace(' ', '-', $add_slug);

        $user = User::create([
            'id'     => $request->id,
            'name'     => $request->name,
            'email'     => $request->email,
            'password'     => bcrypt($request->password),
            'image'     => $image->hashName(),
            'role'   => $request->role,
            'phone'   => $request->phone,
            'address'   => $request->address,
            'status'   => $request->status,
            'is_active'   => $request->is_active,
            'desc'   => $request->desc,
            'slug'   => 'user-index',
        ]);

        

        $user->assignRole($request->role);

        if($user){
            //redirect dengan pesan sukses
            return redirect()->route('users.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('users.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    
    public function edit(User $user)
    {
        // dd($user);
        $roles = Role::all();
        return view('user.edit', compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
        $roles = $request->get('roles', []);
        $rolesString = implode(', ', $roles);
        // dd($roles);
        // $validatedData = $request->validated();


        //get data User by ID
        $user = User::findOrFail($user->id);

        $add_slug = $request->slug;

        $change_slug = str_replace(' ', '-', $add_slug);

        if($request->file('image') == "") {

            $user->update([
                'name'     => $request->name,
                'email'   => $request->email,
                'password'   => $request->password,
                'role'   => $rolesString,
                'phone'   => $request->phone,
                'address'   => $request->address,
                'status'   => $request->status,
                'is_active'   => $request->is_active,
                'desc'   => $request->desc,
                'slug'   => $change_slug,
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/users/'.$user->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/users', $image->hashName());

            $user->update([
                'name'     => $request->name,
                'email'   => $request->email,
                'password'   => $request->password,
                'image'     => $image->hashName(),
                'role'   => $request->role,
                'phone'   => $request->phone,
                'address'   => $request->address,
                'status'   => $request->status,
                'is_active'   => $request->is_active,
                'desc'   => $request->desc,
                'slug'   => $request->slug,
            ]);

        }

        if($user){
            //redirect with success message
            return redirect()->route('users.index')->with(['success' => 'Data Success Updated!']);
        }else{
            //redirect with error message
            return redirect()->route('users.index')->with(['error' => 'Data GaFailedgal to Update!']);
        }
    }


    public function destroy($id)
    {
    $user = User::findOrFail($id);
    Storage::disk('local')->delete('public/users/'.$user->image);
    $user->delete();

    if($user){
        //redirect dengan pesan sukses
        return redirect()->route('users.index')->with(['success' => 'Data Success to Delete!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('users.index')->with(['error' => 'Data Failed to Delete!']);
    }
    }
}
