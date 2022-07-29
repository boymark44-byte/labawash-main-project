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
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ExpenseController;
use App\Models\Shop;


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
    $images = Shop::where('approve', '1')->get();
    return view('welcome')->with('images', $images);
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

//Delete Customer's info
Route::delete('/destroy/{id}', [ShopDashController::class, 'destroy'])->name('destroy');


//Shop's Form
Route::resource('shops', ShopController::class);
Route::put('edit/{id}', [ShopController::class, 'edit'])->name('edit')->middleware('role:1,3');
Route::put('update/{id}', [ShopController::class, 'update'])->name('update');

//Show Shop Details
Route::resource('details', DetailController::class);

//For Customer's Load Transaction
Route::resource('loads', LoadController::class)->middleware('role:2,3');

Route::get('/dashboard', function () {
    return view('dashboard');
});
//display owner and the shops
Route::get('/shop_dashboard/{id}', [ShopDashController::class, 'shop_dashboard'])->name('shop_dashboard')->middleware('role:2');

//display shop and its customers
Route::get('/display/{id}', [ShopDashController::class, 'display'])->name('display')->middleware('role:2');

//For showing table for customers loads
Route::get('/showloads/{id}', [ShowTables::class, 'showloads'])->name('showloads');


//For showing joined tables of customer and load
Route::get('/customertransaction/{id}', [ShowTables::class, 'customertransaction'])->name('customertransaction');

//admin's approval
Route::get('/accept/{id}', [ApprovalController::class, 'accept'])->name('accept');
Route::get('/cancel/{id}', [ApprovalController::class, 'cancel'])->name('cancel');

//for expenses table
Route::resource('expenses', ExpenseController::class)->middleware('role:2');;

//to get my cart
Route::get('/mycart', [ShowTables::class, 'mycart'])->name('mycart')->middleware('role:3');

//for comment testimonials
Route::resource('comment', CommentController::class);
