<?php

namespace App\Http\Helpers;

use App\School;
use App\Group;
use Illuminate\Support\Str;

class SchoolHelper 
{
    public static function getAllWithGroups()
    {
        $allSchools = School::all();
        $schools = [];

        foreach ($allSchools as $school)
        {
            $group = Group::where('school_id', '=', $school->id)->get();

            $school->groups = $group;
            array_push($schools, $school);
        }

        return $schools;
    }

    public static function getSingleButWithUsernameAsSlug(School $school)
    {
        $school->name = Str::slug($school->name);

        return $school;
    }

    public static function getSchoolWithGroupsAndUsers(School $school)
    {
        $school->secretaries = $school->users()->where('role_id', '=', '4')->get();
        $groups = [];

        foreach ($school->groups()->get() as $group) {
            $group->tutors = $group->users()->where('role_id', '=', '3')->get();
            $group->students = $group->users()->where('role_id', '=', '2')->get();
            $group->correctTutors = [];

            array_push($groups, $group);
        }

        $school->groups = $groups;

        return $school;
    }
}