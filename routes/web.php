<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LoadController;
use App\Http\Controllers\DetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Show Register Form
Route::get('/register',
 [UserController::class, 'create']);

//Create New User
Route::post('/users',
[UserController::class, 'store']);

 //Logout
 Route::post('/logout',
[UserController::class, 'logout']);
Route::get('/logout',

[UserController::class, 'logout']);
//Show Log in Form
Route::get('/login',
 [UserController::class, 'login']);

//Login User
Route::post('users/auth',
[UserController::class, 'auth']);

Route::resource('customers', CustomerController::class);
Route::resource('shops', ShopController::class);

//Show Shop Details 
Route::resource('details', DetailController::class);

Route::resource('loads', LoadController::class);



