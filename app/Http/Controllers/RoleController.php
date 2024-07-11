<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CustomTraits;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use function PHPUnit\Framework\isTrue;

class RoleController extends Controller
{
    use CustomTraits;

    public function create(Request $request){
        $request->validate([
            "role" => "required|min:4|max:20"
        ]);
       try{
        Role::create(['name' => $request->role]);
        return Redirect::back()->with('success' , 'Created Role Successfully' );
       }catch(Exception $e){
            return Redirect::back()->with('error' , $e->getMessage());
       };

    }

    public function index(){
        $roles = Role::with(['permissions'])->get();
        return view("roles.index",compact('roles'));
    }


    public function show(Role $role){
        $permissions = Permission::all();
    //permissions ထဲက role မှာရှိပြီးသားပါမစိရှင် တွေကိုစစ်ထုတ်ပြီး array သစ်ပြုလုပ်သည်။
        $roleNotHavePermissions = collect([]); 
        $permissions->map(function (object $permission) use($role,$roleNotHavePermissions):void {
            if(!$role->permissions->contains($permission)){
                $roleNotHavePermissions->push($permission);
            }
        });
        return view("roles.show",compact("role","roleNotHavePermissions"));
    }

    public function assign(Role $role,Request $request){
        $request->validate([
            "permission" => 'required'
        ]);
        $permission = $this->getPermission($request->permission);
        $role->givePermissionTo($permission);
        return Redirect::back()->with('success','Successfully gave permission to role');
    }

    public function revoke(Role $role , Permission $permission){
        $role->revokePermissionTo($permission);
        return Redirect::back()->with('success','Successfully revoke permission to role');

    }

    public function destory(Role $role){
        try{
            $role->delete();
            return Redirect::back()->with('success' , 'Deleted Role Successfully' );
           }catch(Exception $e){
                return Redirect::back()->with('error' , $e->getMessage());
           };
    }
}