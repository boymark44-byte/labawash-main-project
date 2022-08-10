<?php

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Middleware\Role;
use App\Http\Controllers\ShowTables;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoadController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;



use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShopDashController;

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

Route::get('/', function () {
    $images = Shop::where('approve', '1')->get();
    return view('welcome')->with('images', $images);
})
// // ->middleware('auth:api')
;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     // header('Accept: application/json');
//     // header('Authorization: Bearer' .$request->str('access_token'));
    
//     return $request->user();
// })->group('users');

Route::middleware('auth:api')->group(function(){
    //view current authorized user
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    //sample route for authorized
    Route::get('/home', function(){
        return 'Authorized';
    });

    Route::post('/logout',
    [UserController::class, 'logout']);
});

// Route::post('/login', 'UserController@login');

// //Show Register Form
// Route::get('/register',
// [UserController::class, 'create']);

//Create New User
Route::post('/users',
[UserController::class, 'store']);

//Logout
// Route::post('/logout',
// [UserController::class, 'logout']);

// //Show Log in Form
// Route::get('/login',
// [UserController::class, 'login']);


Route::resource('/shops', ShopController::class);

Route::resource('/customers', CustomerController::class);

Route::resource('/loads', LoadController::class);

Route::resource('comment', CommentController::class);

Route::get('/shop_dashboard/{id}', [ShopDashController::class, 'shop_dashboard']);

Route::get('/mycart', [ShowTables::class, 'mycart']);

Route::get('/display/{id}', [ShopDashController::class, 'display']);

Route::get('/showloads/{id}', [ShowTables::class, 'showloads']);

Route::get('/earnings/{id}', [ShopDashController::class, 'earnings']);

Route::get('/customertransaction/{id}', [ShowTables::class, 'customertransaction']);



//Login User
Route::post('users/auth',
[UserController::class, 'auth']);

// });

Route::get('/search', [ShopDashController::class, 'search']);

