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
use Cache;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Model_has_roles;
use Yajra\DataTables\Facades\Datatables;

class UserController extends Controller
{
    // public function index(Request $request)
    // {
    //     $roles = Role::all();
    //     $permissions = Permission::all();
    //     $users = User::orderBy('id','DESC')->paginate(5);
    //     $title = 'Delete User!';
    //     $text = "Are you sure you want to delete?";
    //     confirmDelete($title, $text);
    //     return view('user.index', compact('users','roles','permissions'))
    //     ->with('i', ($request->input('page', 1) - 1) * 5);
    // }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');

            // Add online status indicator to each user
            $data->each(function ($user) {
                $user->online = Cache::has('user-is-online-' . $user->id);
            });

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function($user) {
                    return '<img src="'.Storage::url('public/users/').$user->image.'" class="rounded" style="width: 50px">';
                })
                ->addColumn('role', function($user) {
                    if ($user->role == 'superadmin') {
                        return '<p style="background-color: violet; border-radius: 3px; color: white; font-weight: bold;">super admin</p>';
                    } elseif ($user->role == 'admin') {
                        return '<p style="background-color: purple; border-radius: 3px; color: white; font-weight: bold;">admin</p>';
                    } elseif ($user->role == 'supervisor') {
                        return '<p style="background-color: rgb(122, 23, 81); border-radius: 3px; color: white; font-weight: bold;">supervisor</p>';
                    } elseif ($user->role == 'merchant') {
                        return '<p style="background-color: rgb(87, 27, 27); border-radius: 3px; color: white; font-weight: bold;">merchant</p>';
                    } elseif ($user->role == 'manager') {
                        return '<p style="background-color: rgb(21, 61, 73); border-radius: 3px; color: white; font-weight: bold;">manager</p>';
                    } elseif ($user->role == 'productmanager') {
                        return '<p style="background-color: rgb(128, 223, 40); border-radius: 3px; color: white; font-weight: bold;">product manager</p>';
                    } elseif ($user->role == 'marketingteam') {
                        return '<p style="background-color: rgb(201, 145, 23); border-radius: 3px; color: white; font-weight: bold;">marketing team</p>';
                    } elseif ($user->role == 'customerserviceteam') {
                        return '<p style="background-color: rgb(136, 25, 136); border-radius: 3px; color: white; font-weight: bold;">customer service team</p>';
                    } elseif ($user->role == 'dataanalyst') {
                        return '<p style="background-color: rgb(34, 152, 199); border-radius: 3px; color: white; font-weight: bold;">data analyst</p>';
                    } else {
                        return '<p>None</p>';
                    }
                })
                ->addColumn('status', function($user) {
                    if ($user->status == 'active') {
                        return '<p style="background-color: rgb(10, 216, 10); border-radius: 3px; color: white; font-weight: bold;">Active</p>';
                    } elseif ($user->status == 'inactive') {
                        return '<p style="background-color: red; border-radius: 3px; color: white; font-weight: bold;">Inactive</p>';
                    } elseif ($user->status == 'blocked') {
                        return '<p style="background-color: #000; border-radius: 3px; color: white; font-weight: bold;">Blocked</p>';
                    } else {
                        return '<p>None</p>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('users.show', $row->id) . '" class="detail btn btn-info btn-sm" style="color:white;"> <i class="fa fa-eye"></i> </a>';
                    $actionBtn .= '<a href="' . route('users.edit', $row->id) . '" class="edit btn btn-success btn-sm"> <i class="fa fa-edit"></i> </a>';
                    $actionBtn .= '<a href="' . route('users.destroy', $row->id) . '" class="delete btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>';
                    return $actionBtn;
                })
                ->rawColumns(['image','role','status','action'])
                ->make(true);
        }

        return view('user.index');
    }



    // public function user_search(Request $req){
    //     $roles = Role::all();
    //     $permissions = Permission::all();
    //     $users = User::orderBy('id','DESC')->paginate(5);
    //     $data = User::where('name', 'like', '%'.$req->input('query'). '%')
    //     ->get();


    //     $title = 'Delete User!';
    //     $text = "Are you sure you want to delete?";
    //     confirmDelete($title, $text);

    //     return Response($data);
    //     // return view('user.index', ['users' => $data]);

    // }

    public function user_search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $users = DB::table('users')->where('name', 'LIKE', '%' . $request->search . "%")->get();
        
            if ($users->isEmpty()) {
                $output .= '<tr>' .
                    '<td>' . 'There is no data' . '</td>' .
                    '</tr>';
            } else {
                foreach ($users as $key => $user) {
                    $output .= '<tr>' .
                        // '<td>' . $user->id . '</td>' .
                        '<td><img src="' . Storage::url('public/users/') . $user->image . '" class="rounded" style="width: 50px;"></td>' .
                        '<td>' . $user->name . '</td>' .
                        '<td>' . $user->role . '</td>' .
                        '<td>' . $user->status . '</td>' .

                        '<td>';
                        if (Cache::has('user-is-online-' . $user->id)) {
                            $output .= '<div class="ring-container">' .
                                '<div class="ringring"></div>' .
                                '<div class="circle"></div>' .
                                '</div>';
                        } else {
                            $output .= '<div class="ring-container">' .
                                '<div class="circle-offline"></div>' .
                                '</div>';
                        }
                        $output .= '</td>' .

                        '<td>' . Carbon::parse($user->last_seen)->diffForHumans() . '</td>' .
                        '<td>' . $user->slug . '</td>' .
                        '<td>' .
                        '<form data-confirm-delete="true" action="' . route('users.destroy', $user->id) . '" method="POST">' .
                        '<a href="' . route('users.show', $user->id) . '" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>' .
                        '<a href="' . route('users.edit', $user->id) . '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>' .
                        csrf_field() .
                        method_field('DELETE') .
                        '<button class="btn btn-sm btn-danger" onclick="deleteItem(' . $user->id . ')"><i class="fa fa-trash"></i></button>' .
                        '</form>' .
                        '</td>' .
                        '</tr>';
                }
            }
        }
        
        return Response($output);
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
