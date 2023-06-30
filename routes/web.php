<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\ImagenesController;

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

//Home-Vistas
Route::get('/', [HomeController::class, 'login'])->name('home.login');
Route::get('/index', [HomeController::class, 'index'])->name('home.index');

//Home (posts, deletes, put)
Route::post('/login', [CuentasController::class, 'authUser'])->name('user.authUser');
Route::get('/logout', [CuentasController::class, 'logoutUser'])->name('user.logoutUser');

//Artista-Vistas
Route::get('/artista/create_user', [CuentasController::class, 'artistaCreateUser'])->name('artista.create_user');
Route::get('/artista/create_imagen', [ImagenesController::class, 'artistaCreateImagen'])->name('artista.create_imagen');
Route::get('/artista/edit_imagen/{imagen}', [ImagenesController::class, 'artistaEditImagen'])->name('artista.edit_imagen');

//Artista (posts, deletes, put)
Route::post('/artista/storeUser', [CuentasController::class, 'artistaStoreUser'])->name('artista.storeUser');
Route::post('/artista/storeImagen', [ImagenesController::class, 'artistaStoreImagen'])->name('artista.storeImagen');
Route::delete('/artista/deleteImagen/{imagen}', [ImagenesController::class, 'artistaDestroyImagen'])->name('artista.destroyImagen');
Route::put('/artista/updateImagen/{imagen}', [ImagenesController::class, 'artistaUpdateImagen'])->name('artista.updateImagen');


//Publico-Vistas
Route::get('/public/index', [ImagenesController::class, 'publicoShowImagenes'])->name('publico.index');

//Publico (posts,deletes, puts)
Route::post('/public/login', [CuentasController::class, 'publicoStoreLoginUser'])->name('publico.StoreLoginUser');
Route::delete('/public/logout', [CuentasController::class, 'publicoDestroyLogoutUser'])->name('publico.DestroyLogoutUser');


//Admin
Route::get('/admin/index', [CuentasController::class, 'adminIndex'])->name('admin.index');
Route::delete('/admin/deleteUser/{user}', [CuentasController::class, 'adminDeleteUser'])->name('admin.deleteUser');
Route::get('/admin/create_user', [CuentasController::class, 'adminCreateUser'])->name('admin.create_user');
Route::post('/admin/storeUser', [CuentasController::class, 'adminStoreUser'])->name('admin.storeUser');
Route::get('/admin/edit_user/{user}',[CuentasController::class, 'adminEditUser'])->name('admin.edit_user');
Route::put('/admin/updateUser/{user}', [CuentasController::class, 'adminUpdateUser'])->name('admin.updateUser');
Route::put('/admin/banImagen/{imagen}', [ImagenesController::class, 'adminBanImagen'])->name('admin.banImagen');
Route::put('/admin/unBanImagen/{imagen}', [ImagenesController::class, 'adminUnBanImagen'])->name('admin.UnBanImagen');
