<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;
use Illuminate\Support\Facades\Validator;

class SchoolController extends Controller
{
    public function index()
    {
        return view('admin.school.index', [
            'schools' => School::all()
        ]);
    }

    public function create()
    {
        return view('admin.school.create');
    }

    public function getValidator(Request $request)
    {
        $errorMessages = [
            'required' => 'Nazwa jest wymagana',
            'min' => 'Nazwa szkoły musi mieć co najmniej 3 znaki'
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3'
        ], $errorMessages);

        return $validator;
    }

    public function update(School $school, Request $request)
    {
        $validator = $this->getValidator($request);
        if ($validator->fails()) return redirect()->route('admin.school.edit', ['school' => $school])->withErrors($validator)->withInput();

        $school->name = $request->input('name');
        $school->save();

        return redirect()->route('admin.school.index');
    }

    public function edit(School $school)
    {
        return view('admin.school.edit', [
            'school' => $school
        ]);
    }

    public function store(Request $request)
    {
        $validator = $this->getValidator($request);
        if ($validator->fails()) return redirect()->route('admin.school.create')->withErrors($validator)->withInput();

        $newSchool = new School();
        $newSchool->name = $request->input('name');
        $newSchool->save();

        return redirect()->route('admin.school.single', ['school' => $newSchool]);
    }

    public function single(School $school)
    {
        return view('admin.school.single', [
            'school' => $school
        ]);
    }

    public function delete(School $school)
    {
        $school->delete();
        return response()->json([
            'id' => $school->id
        ]);
    }
}