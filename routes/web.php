<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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
    return view('dashboard.index');
});

Route::get('/welcome', function(){
    return view('welcome');
});

// metode nya get lalu masukkan namespace AuthController
// attribute name merupakan penamaan dari route yang kita buat
// kita tinggal panggil fungsi route(name) pada layout atau controller
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    // Kasir
    Route::get('/kasir', [KasirController::class, 'index']);

    Route::group(['middleware' => ['cek_login:admin']], function ()
    {
        //Dashboard
        Route::get('/dashboard', [DashboardController::class,'index']);
        
        //User
        Route::get('/user', [UserController::class,'index']);
        Route::get('/user/tambah', [UserController::class,'tambah']);
        Route::get('/user/edit/{id}', [UserController::class,'edit']);
        
        //Menu
        Route::get('/menu', [MenuController::class,'index']);
        Route::get('/menu/tambah', [MenuController::class,'tambah']);
        Route::get('/menu/edit/{id}', [MenuController::class,'edit']);
    });
});


