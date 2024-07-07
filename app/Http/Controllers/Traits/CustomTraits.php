<?php

namespace App\Http\Controllers\Traits;

use Spatie\Permission\Models\Permission;

trait CustomTraits{

    public function getPermission($id){
        $permission = Permission::find($id);
        return $permission;
    }
}