<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;

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

Route::controller(PermissionsController::class)->group(function () {
    Route::get('permissions','index'); //Para obtener todos
    Route::get('permissions/{id}', 'show'); //Para consultar especifico
    Route::post('permissions', 'store'); //Para guardar
    Route::put('permissions/{id}', 'update'); //Para actualizar
    Route::delete('permissions/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(ProfilesController::class)->group(function () {
    Route::get('profile','index'); //Para obtener todos
    Route::get('profile/{id}', 'show'); //Para consultar especifico
    Route::post('profile', 'store'); //Para guardar
    Route::put('profile/{id}', 'update'); //Para actualizar
    Route::delete('profile/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(RolesController::class)->group(function () {
    Route::get('role','index'); //Para obtener todos
    Route::get('role/{id}', 'show'); //Para consultar especifico
    Route::post('role', 'store'); //Para guardar
    Route::put('role/permission/{id}', 'addPermissions'); 
    Route::put('role/{id}', 'update'); //Para actualizar
    Route::delete('role/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(UsersController::class)->group(function () {
    Route::get('user','index'); //Para obtener todos
    Route::get('user/{id}', 'show'); //Para consultar especifico
    Route::post('user', 'store'); //Para guardar
    Route::put('user/{id}', 'update'); //Para actualizar
    Route::delete('user/{id}', 'destroy'); //Para eliminar un registro
});
