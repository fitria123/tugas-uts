<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\TransaksiController;

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
    
    Route::get('/', function () {
        return view('dashboard.index');
    });
    
    // Kasir
    Route::get('/kasir', [KasirController::class, 'index']);

    //Transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::delete('destroy/{id}', [TransaksiController::class,'destroy'])->name('transaksi.destroy');
     
    Route::group(['middleware' => ['cek_login:admin']], function ()
    {
        //Dashboard
        Route::get('/dashboard', [DashboardController::class,'index']);
        
        //User
        Route::get('/user', [UserController::class,'index'])->name('users.index');
        Route::get('/user/create', [UserController::class,'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');;
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        
        //Menu using AJAX
        Route::get('/menu', [MenuController::class,'index'])->name('menu.index');
        Route::post('/menu/tambah', [MenuController::class,'tambah'])->name('menu.tambah');
        Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menu.show');
        Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
        Route::delete('/menus/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');


       
    });
});


