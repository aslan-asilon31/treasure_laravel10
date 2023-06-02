<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
// use App\Models\Role;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'aslansuperadmin', 
            'email' => 'aslansuperadmin@gmail.com',
            'password' => bcrypt('aslansuperadmin')
        ]);
    
        $role = Role::create(['name' => 'superadmin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
// =============================
        $user = User::create([
            'name' => 'aslanadmin', 
            'email' => 'aslanadmin@gmail.com',
            'password' => bcrypt('aslanadmin')
        ]);
    
        $role = Role::create(['name' => 'admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
// =============================
        $user = User::create([
            'name' => 'aslanmanager', 
            'email' => 'aslanmanager@gmail.com',
            'password' => bcrypt('aslanmanager')
        ]);
    
        $role = Role::create(['name' => 'manager']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
