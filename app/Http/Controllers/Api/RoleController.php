<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin_api:api');        
    }

    public function index(Request $request)
    {
        $roles = Role::where('name', '!=', 'admin')->get();

        return response()->json($roles);
    }

    public function single(Role $role)
    {
        return response()->json($role);
    }
}
