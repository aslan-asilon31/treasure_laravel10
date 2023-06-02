<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name'	=> 'aslansuperadmin',
            'email'	=> 'aslansuperadmin@gmail.com',
            'password'	=> bcrypt('aslansuperadmin'),
            'image'	=> 'user-blank',
            'role'	=> 'superadmin', 
            'phone'	=> '0834753485', 
            'address'	=> 'jakarta indonesia', 
            'status'	=> 'active', 
            'is_active'	=> '', 
            'last_seen'	=> '', 
            'desc'	=> 'description', 
            'slug'	=> 'user-index.png', 
        ]);
        
        // \App\Models\User::create([
        //     'name'	=> 'aslansupervisor',
        //     'email'	=> 'aslansupervisor@gmail.com',
        //     'password'	=> bcrypt('aslansupervisor'),
        //     'image'	=> 'user-blank',
        //     'role'	=> 'supervisor', 
        //     'phone'	=> '0834753485', 
        //     'address'	=> 'jakarta indonesia', 
        //     'status'	=> 'active', 
        //     'is_active'	=> '', 
        //     'last_seen'	=> '', 
        //     'desc'	=> 'description', 
        //     'slug'	=> 'user-index.png', 
        // ]);

        \App\Models\User::create([
            'name'	=> 'aslanadmin',
            'email'	=> 'aslanadmin@gmail.com',
            'password'	=> bcrypt('aslanadmin'),
            'image'	=> 'user-blank',
            'role'	=> 'admin', 
            'phone'	=> '0834753485', 
            'address'	=> 'jakarta indonesia', 
            'status'	=> 'active', 
            'is_active'	=> '', 
            'last_seen'	=> '', 
            'desc'	=> 'description', 
            'slug'	=> 'user-index.png', 
        ]);

        // \App\Models\User::create([
        //     'name'	=> 'aslanmerchant',
        //     'email'	=> 'aslanmerchant@gmail.com',
        //     'password'	=> bcrypt('aslanmerchant'),
        //     'image'	=> 'user-blank',
        //     'role'	=> 'merchant', 
        //     'phone'	=> '0834753485', 
        //     'address'	=> 'jakarta indonesia', 
        //     'status'	=> 'active', 
        //     'is_active'	=> '', 
        //     'last_seen'	=> '', 
        //     'desc'	=> 'description', 
        //     'slug'	=> 'user-index.png', 
        // ]);

        // \App\Models\User::create([
        //     'name'	=> 'aslanproductmanager',
        //     'email'	=> 'aslanproductmanager@gmail.com',
        //     'password'	=> bcrypt('aslanproductmanager'),
        //     'image'	=> 'user-blank',
        //     'role'	=> 'productmanager', 
        //     'phone'	=> '0834753485', 
        //     'address'	=> 'jakarta indonesia', 
        //     'status'	=> 'active', 
        //     'is_active'	=> '', 
        //     'last_seen'	=> '', 
        //     'desc'	=> 'description', 
        //     'slug'	=> 'user-index.png', 
        // ]);

        // \App\Models\User::create([
        //     'name'	=> 'aslanmarketingteam',
        //     'email'	=> 'aslanmarketingteam@gmail.com',
        //     'password'	=> bcrypt('aslanmarketingteam'),
        //     'image'	=> 'user-blank',
        //     'role'	=> 'marketingteam', 
        //     'phone'	=> '0834753485', 
        //     'address'	=> 'jakarta indonesia', 
        //     'status'	=> 'active', 
        //     'is_active'	=> '', 
        //     'last_seen'	=> '', 
        //     'desc'	=> 'description', 
        //     'slug'	=> 'user-index.png', 
        // ]);
    }
}
