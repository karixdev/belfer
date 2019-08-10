<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\School;
use App\Group;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.index', [
            'schools' => School::all()
        ]);
    }
}
