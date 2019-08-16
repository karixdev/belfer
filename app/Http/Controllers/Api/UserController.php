<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Group;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin_api:api');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:2',
            'password' => 'required',
            'role_id' => 'required',
            'school_id' => 'required',
        ]);

        if ($validator->fails()) return response()->json(['errors'=>$validator->errors()]);

        $user = new User;
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = $request->input('role_id');
        $user->school_id = $request->input('school_id');
        $user->group_id = $request->input('group_id');
        $user->first_name = $request->input('first_name');
        $user->surname = $request->input('surname');

        if (!$user->save()) {
            return response()->json(['message' => 'User has not been created'], 500);
        }
        
        return response()->json(['message' => 'User has been created'], 201);
    }

    public function group(Group $group)
    {
        $users = User::where('group_id', '=', $group->id);

        return response()->json($users);
    }

    public function delete(Request $request, User $user)
    {
        if ($user->delete()) {
            return response()->json(['message' => 'User has been deleted'], 200);
        }

        return response()->json(['message' => 'User has not been deleted'], 500);
    }
}
