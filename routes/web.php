<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
//home
Route::get('', [ App\Http\Controllers\Website\HomeController::class,'index' ])->name('Home');
Route::get('help', [ App\Http\Controllers\Website\HomeController::class,'help' ])->name('Help');
Route::get('checkout/{id}',[ App\Http\Controllers\Website\HomeController::class,'checkout'])->name('Checkout')->middleware('auth');
Route::get('about',[ App\Http\Controllers\Website\HomeController::class,'about'])->name('About');
Route::get('privacy',[ App\Http\Controllers\Website\HomeController::class,'privacy'])->name('Privacy');
Route::get('contacts',[ App\Http\Controllers\Website\HomeController::class,'contacts'])->name('Contacts');
Route::get('404',[ App\Http\Controllers\Website\HomeController::class,'error404'])->name('Error404');
Route::post('search',[ App\Http\Controllers\Website\HomeController::class,'search'])->name('Search');



// user
Route::get('login', [ App\Http\Controllers\Users\UserController::class,'login' ])->name('login');
Route::post('sign-in', [ App\Http\Controllers\Users\UserController::class,'postLogin' ])->name('PostSignIn');
Route::get('sign-up', [ App\Http\Controllers\Users\UserController::class,'SignUp' ])->name('SignUp');
Route::post('sign-up', [App\Http\Controllers\Users\UserController::class, 'create'])->name('PostSignUp');
Route::get('forgot-password', [ App\Http\Controllers\Users\UserController::class,'Fpassword' ])->name('ForgotPassword');
Route::get('profile',[ App\Http\Controllers\Users\UserController::class,'profile'])->name('Profile')->middleware('auth');
Route::post('profile',[ App\Http\Controllers\Users\UserController::class,'change_info'])->name('change_Info')->middleware('auth');
Route::get('logout',[ App\Http\Controllers\Users\UserController::class,'logout'])->name('Logout');

//product
Route::get('detail/{id}', [ App\Http\Controllers\Website\ProductController::class,'detail' ])->name('product.detail');
Route::get('all-product', [ App\Http\Controllers\Website\ProductController::class,'index' ])->name('AllProducts');
Route::get('favorites',[ App\Http\Controllers\Website\ProductController::class,'favorites'])->name('Favorites')->middleware('auth');
Route::get('add_favorites/{id}',[ App\Http\Controllers\Website\ProductController::class,'add_favorites'])->name('AddFavorites')->middleware('auth');
Route::get('delete_favourites/{id}',[ App\Http\Controllers\Website\ProductController::class,'delete_favourites'])->name('DeleteFavourites')->middleware('auth');
Route::get('purchans/{id}',[ App\Http\Controllers\Website\ProductController::class,'purchans'])->name('Purchans')->middleware('auth');
Route::get('payment_success',[ App\Http\Controllers\Website\ProductController::class,'payment_success'])->name('Payment_success')->middleware('auth');

//admin

Route::group(['prefix' => 'admin','middleware'=>['auth'] ], function () {
    
    Route::get('index',[App\Http\Controllers\Admin\AdminController::class,'index'])->name('Admin');
    Route::resource('products',App\Http\Controllers\Admin\ProductController::class);
    Route::resource('systems',App\Http\Controllers\Admin\SystemController::class);
    Route::resource('systemsplus',App\Http\Controllers\Admin\SystemplusController::class);
    Route::resource('users',App\Http\Controllers\Admin\UserController::class);
    Route::resource('orders',App\Http\Controllers\Admin\NguoiDungController::class);
    Route::resource('news',App\Http\Controllers\Admin\NewController::class);
});

//new
Route::get('news', [ App\Http\Controllers\Website\NewsController::class,'index' ])->name('News');
Route::get('new_detail/{id}', [ App\Http\Controllers\Website\NewsController::class,'detail' ])->name('new.detail');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
