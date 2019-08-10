<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;
use App\School;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    public function single(Group $group)
    {
        return view('admin.group.single', [
            'group' => $group
        ]);
    }

    public function create(School $school)
    {
        return view('admin.group.create', [
            'school' => $school
        ]);
    }

    private function getValidator(Request $request)
    {
        $errorMessages = [
            'required' => 'Nazwa klasy jest wymagana',
            'min' => 'Nazwa klasy musi zawierać co najmniej 2 znaki'
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2'
        ], $errorMessages);

        return $validator;
    }

    public function store(School $school, Request $request)
    {
        $validator = $this->getValidator($request);
        if ($validator->fails()) return redirect()->route('admin.group.create', ['school' => $school])->withErrors($validator)->withInput();

        $newGroup = new Group();
        $newGroup->name = $request->input('name');
        $newGroup->school_id = $school->id;
        $newGroup->save();

        return redirect()->route('admin.school.single', ['school' => $school]);
    }

    public function edit(Group $group)
    {
        return view('admin.group.edit', [
            'group' => $group,
            'school' => $group->school()->first()
        ]);
    }

    public function update(Group $group, Request $request)
    {
        $validator = $this->getValidator($request);
        if ($validator->fails()) return redirect()->route('admin.group.create', ['school' => $group->school()->first()])->withErrors($validator)->withInput();
    
        $group->name = $request->input('name');
        $group->save();

        return redirect()->route('admin.school.single', ['school' => $group->school()->first()]);
    }

    public function delete(Group $group)
    {
        $group->delete();
        return response()->json([
            'id' => $group->id
        ]);
    }
}
