<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $roleName = Auth::user()->role()->first()->name;

            switch ($roleName) {
                case 'admin':
                    return redirect()->route('admin.index');
                    break;
            }
                 
        } catch (\Throwable $th) {
            return view('index');
        }
    }
}
