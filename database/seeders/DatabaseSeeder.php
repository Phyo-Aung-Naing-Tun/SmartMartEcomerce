<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Product;
use App\Models\User;
use Database\Seeders\Admin\AdminSeeder;
use Database\Seeders\Permission\PermissionSeeder;
use Database\Seeders\Role\RoleSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();
        Company::factory(20)->create();
        Product::factory(20)->create();
        $this->call([RoleSeeder::class,PermissionSeeder::class,AdminSeeder::class]);

        

        // User::factory()->create([
        //     'name' => 'PhyoLay',
        //     'email' => 'test@example.com',
        // ]);
    }
}