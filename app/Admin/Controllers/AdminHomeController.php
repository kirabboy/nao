<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Admins;

class AdminHomeController extends Controller
{
    
    public function index(){
        return view('admin.dashboard');
    }

    public function roles() {
        // $role = Role::find(2);
        // $permission = Permission::find(2);
        // $permission->assignRole($role);

        // Auth::guard('admin')->user()->assignRole(['admin'],['kho'],['ketoan']);
        // Auth::guard('admin')->user()->givePermissionTo('read');
        
        $admin = Admins::find(2);
        $admin->givePermissionTo('read');
        return view('admin.roles.index');
    }
}
