<?php

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
//////user urls////
Route::group(['middleware' => 'guest:web'], function () {
    Route::get('/login',[App\Http\Controllers\UserController::class, 'login'])->name('login');
    Route::post('/login',[App\Http\Controllers\UserController::class, 'postLogin'])->name('login.post');
    Route::get('/register',[App\Http\Controllers\UserController::class, 'register'])->name('register');
    Route::post('/register',[App\Http\Controllers\UserController::class, 'postRegister'])->name('register.post');
    Route::get('/',[App\Http\Controllers\UserController::class, 'index'])->name('index');
});
Route::group(['middleware' => ['auth:web', 'user.auth']], function () {
    Route::get('/home',[App\Http\Controllers\UserController::class, 'home'])->name('home');
    Route::post('/add-form',[App\Http\Controllers\UserController::class, 'addForm'])->name('add.form');
    Route::get('/logout',[App\Http\Controllers\UserController::class, 'logout'])->name('logout');
});



//////admin urls////
Route::prefix('admin')->group(function (){
    Route::group(['middleware' => 'guest:admin'], function () {
        Route::get('/login',[App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');
        Route::post('/login',[App\Http\Controllers\AdminController::class, 'postLogin'])->name('admin.login.post');
    });
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/',[App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/approve/{id}',[App\Http\Controllers\AdminController::class, 'approve'])->name('admin.approve');
        Route::get('/disapprove/{id}',[App\Http\Controllers\AdminController::class, 'disapprove'])->name('admin.disapprove');
        Route::get('/operation',[App\Http\Controllers\AdminController::class, 'operation'])->name('admin.operation');
        Route::post('/add-operation',[App\Http\Controllers\AdminController::class, 'addOperation'])->name('admin.add.operation');
        Route::get('/delete-operation/{id}',[App\Http\Controllers\AdminController::class, 'deleteOperation'])->name('admin.delete.operation');
        Route::get('/security',[App\Http\Controllers\AdminController::class, 'security'])->name('admin.security');
        Route::post('/add-security',[App\Http\Controllers\AdminController::class, 'addSecurity'])->name('admin.add.security');
        Route::get('/delete-security/{id}',[App\Http\Controllers\AdminController::class, 'deleteSecurity'])->name('admin.delete.security');
        Route::get('/forms',[App\Http\Controllers\AdminController::class, 'forms'])->name('admin.forms');
        Route::get('/logout',[App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
    });
});


//////operation urls////
Route::prefix('operation')->group(function (){
    Route::group(['middleware' => 'guest:operation'], function () {
        Route::get('/login',[App\Http\Controllers\OperationController::class, 'login'])->name('operation.login');
        Route::post('/login',[App\Http\Controllers\OperationController::class, 'postLogin'])->name('operation.login.post');
    });
    Route::group(['middleware' => 'auth:operation'], function () {
        Route::get('/',[App\Http\Controllers\OperationController::class, 'index'])->name('operation.dashboard');
        Route::get('/approve/{id}',[App\Http\Controllers\OperationController::class, 'approve'])->name('operation.approve');
        Route::get('/logout',[App\Http\Controllers\OperationController::class, 'logout'])->name('operation.logout');
    });
});

//////security urls////
Route::prefix('security')->group(function (){
    Route::group(['middleware' => 'guest:security'], function () {
        Route::get('/login',[App\Http\Controllers\SecurityController::class, 'login'])->name('security.login');
        Route::post('/login',[App\Http\Controllers\SecurityController::class, 'postLogin'])->name('security.login.post');
    });
    Route::group(['middleware' => 'auth:security'], function () {
        Route::get('/',[App\Http\Controllers\SecurityController::class, 'index'])->name('security.dashboard');
        Route::get('/logout',[App\Http\Controllers\SecurityController::class, 'logout'])->name('security.logout');
    });
});
