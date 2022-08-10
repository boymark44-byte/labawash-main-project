<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Passport\Client;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Dotenv\Dotenv;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
// use App\Http\Middleware\OnlyAcceptJsonMiddleware;
use Config;

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

        // $accessToken = $user->createToken('MyAccess')->accessToken;

        //Mao ni siya ang pagkuha sa Oauth access and refresh token
        $response = Http::asForm()->post('http://labawash-main-project.com.ph/oauth/token', [
          //if e try sa postman kay ibutang ni body sa oauth/token
          'grant_type' => 'password',
          'client_id' => '2',
          'client_secret' => 'x4C8FeXVHRtX4rXDNh8TypBu680DVKoCFR7wmahS',
          'username' => $request->email,
          'password' => $request->password,
          'scope' => '',
      ]);

      // access_token only
      $accessToken = $response->json('access_token');
      $value = $accessToken;
      $cookie = cookie('jwt', $value ,minutes:60*24);
      //suppose to be header
      $token = Http::withHeaders([
        'Accept' => 'application/json',
        'Authorization' => 'Bearer '.$accessToken,
    ])->get('http://labawash-main-project.com.ph/api/user');


        //Login
        auth()->login($user);

        return redirect('/api')->withCookie($cookie);
    }

    // public function bearer()
    // {
    //   header('Accept: application/json');
    //   header('Authorization: Bearer' .$accessToken);
    // }

    public function logout(Request $request) {
      $response = Http::asForm()->post('http://labawash-main-project.com.ph/oauth/token', [
        'grant_type' => 'password',
        'client_id' => config('passport.personal_access_client.id'),
          'client_secret' => config('passport.personal_access_client.secret'),
        'username' => $request->email,
        'password' => $request->password,
        'scope' => '',
      ]);
      $accessToken = $response->json('access_token');
      $token = Http::withHeaders([
        'Accept' => 'application/json',
        'Authorization' => 'Bearer '.$accessToken,
    ])->get('https://labawash-main-project.com.ph/api/user');
    // $cookie = cookie('jwt', 'FORGOTTEN');
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();



        return redirect('/api')->with('message', 'You have been logged out')
        ->withoutCookie('jwt');
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
// dd($secret = config('passport.personal_access_client.secret'));
        $response = Http::asForm()->post('http://labawash-main-project.com.ph/oauth/token', [
          'grant_type' => 'password',
          'client_id' => config('passport.personal_access_client.id'),
          'client_secret' => config('passport.personal_access_client.secret'),
          'username' => $request->email,
          'password' => $request->password,
          'scope' => '',
      ]);
      $accessToken = $response->json('access_token');
      $value = $accessToken;
      $cookie = cookie('jwt', $value ,minutes:60*24);
      // dd($cookie);
      // header('Accept: application/json');
      // header('Authorization: Bearer' .$accessToken);
      //  dd('Bearer '.$accessToken);
      // return $response->json();
      $token = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$accessToken,
        ])->get('http://labawash-main-project.com.ph/api/user');

        // dd($response);

        // new OnlyAcceptJsonMiddleware((string)$accessToken);

        // $user = Auth::user()->$token;
        // return [$token->json()];

        if(auth()->attempt($formFields)) {

          $token = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$accessToken,
          ])->post('http://labawash-main-project.com.ph/api/user');
// dd($token);

            $request->session()->regenerate();
            // auth()->login($json);
            $role = Auth::user()->role;
        switch ($role) {
          case '1':
            return redirect('/api')->withCookie($cookie);
            break;
          case '2':
            return redirect('/api')->withCookie($cookie);
            break;
          case '3':
            // dd('Bearer ' .$accessToken);
            Auth::user();
            return redirect('/api')->withCookie($cookie)
            ;
              break;

          default:
            return redirect('/api/login');
          break;
        }


  }
  else{
    return back()->withErrors(['email' => 'Invalid'])->onlyInput('email');
}

     }
 }
