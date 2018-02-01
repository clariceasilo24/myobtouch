<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class CustomAuthController extends Controller
{

    public function username()
    {
    return 'username';
    }

    public function showRegisterForm()
    {
    	return view('custom.register');
    }

    public function register(Request $request)
    {
    	$this->validation($request);
        $request['password'] = bcrypt($request->password);
        User::create($request->all());
    	//return $request->all();
        return redirect('/');
    }

    public function showLoginForm()
    {
        return view('custom.login');
    }

    public function login(Request $request)
    {

        $this->validate($request, [

        'username' => 'required|max:255',
        'password' => 'required|max:255',
        ]);
        if (Auth::attempt(['username' => $request ->username, 'password' => $request ->password])) {
            // Authentication passed...
            //return redirect()->intended('dashboard');
            $username = $request['username'];
            $user = User::where('username',$username) -> first();
            $account_type = $user->account_type;
            if($account_type == 'admin')
            {
                return redirect('/admin/home');
            }
            else if($account_type == 'secretary')
            {
                return redirect('/admin/home');
            }
            else
            {
                return redirect('/');
            }
            //$user = user::find(1);
            return $account_type; 
            return 'logged in';
            

        }
        else
        {
            
            return redirect()->back()->withErrors(['email'=>'These credentials do not match our records.', 'failed'=>'These credentials do not match our records.'])->withInput($request->only('email', 'remember'));
        }
        
    }

    public function validation($request)
    {
    	return $validatedData = $request->validate([
        'username' => 'required|unique:users|max:255',
        'password' => 'required|confirmed|max:255',
        ]);
    }


}
