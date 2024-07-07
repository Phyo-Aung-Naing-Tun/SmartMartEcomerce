<?php

namespace Database\Seeders\Permission;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $permissions = ['user-create','user-read','user-update','user-delete','product-create','product-read','product-update','product-delete','company-create','company-read','company-update','company-delete'];
    
    public function run(): void
    {
        foreach($this->permissions as $permission){
            Permission::create(['name'=> $permission]);
        }

    }
}