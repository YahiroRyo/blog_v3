<?php

use App\Http\Controllers\User\AdminUserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function() {
    dd( env('MYSQL_ATTR_SSL_CA'));
});

Route::prefix('/users')->group(function () {
    Route::get('/isLoggedIn', [AdminUserController::class, 'isLoggedIn']);
    Route::post('/create', [AdminUserController::class, 'createUser'])->name('register');
    Route::post('/login', [AdminUserController::class, 'login'])->name('login');
    Route::post('/logout', [AdminUserController::class, 'logout'])->name('logout');
});
