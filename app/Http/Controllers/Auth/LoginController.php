<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

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

    protected function redirectTo()
    {
        if(Auth::user()->account_type != 'patient') {
            return redirect('/admin/home');
        }else{
            return redirect('/');
        }
    }
    protected function authenticated(Request $request, $user)
    {
        if(Auth::user()->account_type != 'patient') {
            return redirect()->intended('/admin/home');
        }else{
            return redirect()->intended('/');
        }
    }
}
