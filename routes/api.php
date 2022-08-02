<?php

use App\Http\Middleware\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::prefix('/user')->group(['middleware' => ['web']], function(){
//     // Route::post('/login', 'UserController@login');
//     //Show Register Form
// Route::get('/register',
// [UserController::class, 'create']);

// //Create New User
// Route::post('/users',
// [UserController::class, 'store']);

// //Logout
// Route::post('/logout',
// [UserController::class, 'logout']);
// Route::get('/logout',

// [UserController::class, 'logout']);
// //Show Log in Form
// Route::get('/login',
// [UserController::class, 'login']);

// //Login User
// Route::post('users/auth',
// [UserController::class, 'auth']);
// });