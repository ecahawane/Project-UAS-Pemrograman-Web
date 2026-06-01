<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InfokusController;
use App\Http\Controllers\PeminjamanController;

/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return redirect('/login');

});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

// LOGIN
Route::get('/login', [AuthController::class, 'login'])
    ->middleware('guest');

Route::post('/login', [AuthController::class, 'authenticate'])
    ->middleware('guest');

// REGISTER
Route::get('/register', [AuthController::class, 'register'])
    ->middleware('guest');

Route::post('/register', [AuthController::class, 'storeRegister'])
    ->middleware('guest');

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| SETELAH LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard',
        [DashboardController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::view('/profile', 'profile.index');

    /*
    |--------------------------------------------------------------------------
    | INFOCUS
    |--------------------------------------------------------------------------
    | USER & ADMIN BISA MELIHAT
    |--------------------------------------------------------------------------
    */

    // LIST INFOCUS
    Route::get('/infokus',
        [InfokusController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | INFOCUS ADMIN ONLY
    |--------------------------------------------------------------------------
    */

    Route::middleware(['admin'])->group(function () {

        // CREATE
        Route::get('/infokus/create',
            [InfokusController::class, 'create']);

        // STORE
        Route::post('/infokus',
            [InfokusController::class, 'store']);

        // EDIT
        Route::get('/infokus/{infokus}/edit',
            [InfokusController::class, 'edit']);

        // UPDATE
        Route::put('/infokus/{infokus}',
            [InfokusController::class, 'update']);

        // DELETE
        Route::delete('/infokus/{infokus}',
            [InfokusController::class, 'destroy']);

    });

    /*
    |--------------------------------------------------------------------------
    | DETAIL INFOCUS
    |--------------------------------------------------------------------------
    */

    Route::get('/infokus/{infokus}',
        [InfokusController::class, 'show']);

    /*
    |--------------------------------------------------------------------------
    | PEMINJAMAN
    |--------------------------------------------------------------------------
    */

    // LIST PEMINJAMAN
    Route::get('/peminjaman',
        [PeminjamanController::class, 'index']);

    // TAMBAH PEMINJAMAN
    Route::get('/peminjaman/create',
        [PeminjamanController::class, 'create']);

    // SIMPAN PEMINJAMAN
    Route::post('/peminjaman',
        [PeminjamanController::class, 'store']);

    // DETAIL PEMINJAMAN
    Route::get('/peminjaman/{peminjaman}',
        [PeminjamanController::class, 'show']);

    /*
    |--------------------------------------------------------------------------
    | PEMINJAMAN ADMIN ONLY
    |--------------------------------------------------------------------------
    */

    Route::middleware(['admin'])->group(function () {

        // EDIT
        Route::get('/peminjaman/{peminjaman}/edit',
            [PeminjamanController::class, 'edit']);

        // UPDATE STATUS
        Route::put('/peminjaman/{peminjaman}',
            [PeminjamanController::class, 'update']);

        // KEMBALIKAN SEKALI KLIK
        Route::patch('/peminjaman/{peminjaman}/kembalikan',
            [PeminjamanController::class, 'kembalikan'])
            ->name('peminjaman.kembalikan');

    });

    /*
    |--------------------------------------------------------------------------
    | DELETE PEMINJAMAN
    |--------------------------------------------------------------------------
    */

    // USER & ADMIN BISA DELETE
    Route::delete('/peminjaman/{peminjaman}',
        [PeminjamanController::class, 'destroy']);

});