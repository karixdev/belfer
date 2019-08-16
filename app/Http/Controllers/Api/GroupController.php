<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;
use App\School;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin_api:api');        
    }

    public function index(Request $request)
    {
        return response()->json(Group::all());
    }

    public function school(Request $request, School $school)
    {
        return response()->json(
            Group::where('school_id', '=', $school->id)->get()
        );
    }

    public function single(Request $request, Group $group)
    {
        return response()->json($group);
    }
}
