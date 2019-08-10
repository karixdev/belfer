<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function redirectTo()
    {
        $role = auth()->user()->role()->first()->name();

        switch ($role) {
            case 'admin':
                return reidrect()->route('admin.index');
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    protected function credentials(Request $request)
    {
        $field = $this->field($request);

        return [
            $field => $request->get($this->username()),
            'password' => $request->get('password'),
        ];
    }

    public function field(Request $request)
    {
        return 'username';
    }

    protected function validateLogin(Request $request)
    {
        $field = $this->field($request);

        $messages = ["{$this->username()}.exists" => 'The account you are trying to login is not registered or it has been disabled.'];

        $this->validate($request, [
            $this->username() => "required|exists:users,{$field}",
            'password' => 'required',
        ], $messages);
    }
}
