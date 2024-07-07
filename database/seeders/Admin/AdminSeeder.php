<?php

namespace Database\Seeders\Admin;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $user =   User::create([
            'name' => "Phyo Aung Naing Tun",
            'email' => "phyotun24@gmail.com",
            'phone' => "09783538348",
            'password' => Hash::make('admin@123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]
        );
        $role = Role::create(['name' => 'Admin']);
         
        $permissions = ModelsPermission::pluck('id','id')->all();
       
        $role->syncPermissions($permissions);
         
        $user->assignRole([$role->id]);
    }
}