<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Authen\AuthenController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'authen'], function(){
    Route::get('/register', [AuthenController::class, 'register'])->name('authen.register');
    Route::post('/register', [AuthenController::class, 'check_register']);

    Route::get('/login', [AuthenController::class, 'login'])->name('authen.login');
    Route::post('/login', [AuthenController::class, 'check_login']);

    Route::get('/logout', [AuthenController::class, 'logout'])->name('authen.logout');
});

Route::group(['prefix' => 'admin',"middleware" => "checkAdmin"], function(){
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::resources([

        'user' => UserController::class,

        'shop'=> ShopController::class,

        'comment' => CommentController::class

    ]);
});

Route::group(['prefix'=>'client'], function(){
    Route::get('/home', [HomeController::class, 'home'])->name('client.home');

    Route::get('/search', [HomeController::class, 'search'])->name('client.search');

    Route::get('/api/shop', [HomeController::class, 'getShopById']);

});
