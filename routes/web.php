<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LoadController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopDashController;
use App\Http\Controllers\ShowTables;
use App\Http\Controllers\ApprovalController;


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

//Role Legends 1 = Admin, 2 = Shop, 3 = Customer

Route::get('/', function () {
    return view('welcome');
});

//Reditected to admin dashboard
Route::get('/admin',
[ShopController::class, 'index']
)->middleware('role:1');

//Redirected to customer dashboard
Route::get('/customer_dashboard',
 [ShopController::class, 'index'])->middleware('role:3');


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

//Customer's form
Route::resource('customers', CustomerController::class)->middleware('role:3');


//Shop's Form
Route::resource('shops', ShopController::class);
Route::put('edit/{id}', [ShopController::class, 'edit'])->name('edit');
Route::put('update/{id}', [ShopController::class, 'update'])->name('update');

//Show Shop Details
Route::resource('details', DetailController::class);

//For Customer's Load Transaction
Route::resource('loads', LoadController::class)->middleware('role:2,3');

Route::get('/dashboard', function () {
    return view('dashboard');
});
//shop dashboard
Route::get('/shop_dashboard', [ShopDashController::class, 'shop_dashboard'])->name('shop_dashboard')->middleware('role:2');

//For showing table for customers loads
Route::get('/showLoads/{id}', [ShowTables::class, 'showLoads'])->name('showLoads');


//For showing joined tables of customer and load
Route::get('/customertransaction/{id}', [ShowTables::class, 'customertransaction'])->name('customertransaction');

//admin's approval
Route::get('/accept/{id}', [ApprovalController::class, 'accept'])->name('accept');
Route::get('/cancel/{id}', [ApprovalController::class, 'cancel'])->name('cancel');
