<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;
use App\Http\Helpers\SchoolHelper;

class SchoolController extends Controller
{
    public function index()
    {
        return response()->json(SchoolHelper::getAllWithGroups());
    }

    public function single(School $school)
    {
        return response()->json(SchoolHelper::getSingleButWithUsernameAsSlug($school));
    }

    public function group(School $school)
    {
        return response()->json(SchoolHelper::getSchoolWithGroupsAndUsers($school));
    }
}
