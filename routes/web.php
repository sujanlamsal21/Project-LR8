<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MultipleController;
use App\Models\User;
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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('category.all');

//Route::get('/category/all', [CategoryController::class, 'CatDisplay'])->name('category.display');

Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('category.add');
Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
Route::post('/category/edit/{id}', [CategoryController::class, 'update'])->name('category.update');

Route::get('/category/delete/{id}', [CategoryController::class, 'softDelete']);
Route::get('/category/restore/{id}', [CategoryController::class, 'restore']);
Route::get('/category/pdelete/{id}', [CategoryController::class, 'pdelete']);


//brand route start

Route::get('/brand/all', [BrandController::class, 'index'])->name('brand.all');

Route::post('/brand/add', [BrandController::class, 'brandstore'])->name('brand.store');

Route::get('/brand/edit/{id}', [BrandController::class, 'edit']);

Route::post('/brand/edit/{id}', [BrandController::class, 'brandupdate'])->name('brand.update');


Route::get('/brand/delete/{id}', [BrandController::class, 'branddelete']);

Route::get('/user/logout', [BrandController::class , 'Logout'])->name('user.logout');

//multiple image controller

Route::get('/multiple/all', [MultipleController::class , 'multipleimage'])->name('multiple.all');

Route::post('/multiple/store', [MultipleController::class , 'multipleimagestore'])->name('multiple.store');




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();
    return view('admin.index');
})->name('dashboard');
