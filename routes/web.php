<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CuentasController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [HomeController::class, 'login'])->name('home.login');
Route::get('/index', [HomeController::class, 'index'])->name('home.index');

Route::post('/login', [CuentasController::class, 'authUser'])->name('user.authUser');
Route::get('/logout', [CuentasController::class, 'logoutUser'])->name('user.logoutUser');
Route::get('/admin/index', [CuentasController::class, 'adminIndex'])->name('admin.index');
Route::delete('/admin/deleteUser/{user}', [CuentasController::class, 'adminDeleteUser'])->name('admin.deleteUser');
Route::get('/admin/create_user', [CuentasController::class, 'adminCreateUser'])->name('admin.create_user');
Route::post('/admin/storeUser', [CuentasController::class, 'adminStoreUser'])->name('admin.storeUser');
Route::get('/admin/edit_user/{user}',[CuentasController::class, 'adminEditUser'])->name('admin.edit_user');
Route::put('/admin/updateUser/{user}', [CuentasController::class, 'adminUpdateUser'])->name('admin.updateUser');