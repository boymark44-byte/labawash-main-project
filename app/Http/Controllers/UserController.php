<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    //Create Form
    public function create() {
        return view('users.register');
    }

    //Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            'username' => ['required', 'min:3'],
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);
        // Hash Pass
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        //$accessToken = $user->createToken('remember_token')->accessToken;
        //Login
        auth()->login($user);

        return redirect('/');
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
    }

    //Show Login Form
    public function login() {
        return view('users.login');
    }


    //Login
    public function auth(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;
        switch ($role) {
          case '1':
            return redirect('/')->with('message', 'You are now logged in');
            break;
          case '2':
            return redirect('/')->with('message', 'You are now logged in');
            break;
          case '3':
            return redirect('/')->with('message', 'You are now logged in');
              break;

          default:
            return '/login';
          break;
        }
        
  }
  else{
    return back()->withErrors(['email' => 'Invalid'])->onlyInput('email');
}
    
     }
 }
