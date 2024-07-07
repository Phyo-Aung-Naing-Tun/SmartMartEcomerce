<?php

namespace Database\Seeders\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $roles = ['user','seller'];
    public function run(): void
    {
        foreach($this->roles as $role){
        Role::create(['name' => $role]);
        }
    }
}