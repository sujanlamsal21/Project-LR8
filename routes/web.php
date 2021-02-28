<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePass;
use App\Http\Controllers\MultipleController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\HomeAboutController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialsController;

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
    $brands = DB::table('brands')->get();

    $servicesdata = DB::table('services')->get();

    $multipledata = DB::table('multiples')->get();

    $aboutdata = DB::table('home_abouts')->first();

    $slidervalue = DB::table('sliders')->get();

    return view('home', compact('brands', 'aboutdata', 'servicesdata', 'multipledata', 'slidervalue'));
})->name('home');

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

Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');

Route::post('/brand/edit/{id}', [BrandController::class, 'brandupdate'])->name('brand.update');


Route::get('/brand/delete/{id}', [BrandController::class, 'branddelete']);

Route::get('/user/logout', [BrandController::class , 'Logout'])->name('user.logout');

//multiple image controller

Route::get('/multiple/all', [MultipleController::class , 'multipleimage'])->name('multiple.all');

Route::post('/multiple/store', [MultipleController::class , 'multipleimagestore'])->name('multiple.store');

// slidercontroller

Route::get('home/slider', [SliderController::class, 'SliderPage'])->name('home.slider');

Route::get('slider/add', [SliderController::class, 'SliderAdd'])->name('slider.addpage');

Route::post('slider/add', [SliderController::class, 'SliderAddPage'])->name('slider.add');

Route::get('slider/edit/{id}', [SliderController::class, 'Slidereditpage'])->name('slider.editpage');

Route::post('slider/update/{id}', [SliderController::class, 'SliderUpdate'])->name('slider.update');

Route::get('slider/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');


//HomeAbout Controller

Route::get('home/about', [HomeAboutController::class, 'index'])->name('home.about');

Route::get('home/about/add', [HomeAboutController::class, 'AboutAddPage'])->name('about.addpage');

Route::post('home/about/add', [HomeAboutController::class, 'AboutAdd'])->name('about.add');

Route::get('home/about/edit/{id}', [HomeAboutController::class, 'AboutEditPage'])->name('about.editpage');

Route::post('home/about/edit/{id}', [HomeAboutController::class, 'AboutEdit'])->name('about.edit');

Route::get('home/about/delete/{id}', [HomeAboutController::class, 'AboutDelete'])->name('about.delete');

//services controller

Route::get('home/services', [ServicesController::class, 'index'])->name('serviceshome');

Route::get('home/services/add', [ServicesController::class, 'servicesAddPage'])->name('services.addpage');

Route::post('home/services/add', [ServicesController::class, 'servicesAdd'])->name('services.add');

Route::get('home/services/edit/{id}', [ServicesController::class, 'serviceseditpage'])->name('services.editpage');

Route::post('home/services/edit/{id}', [ServicesController::class, 'servicesedit'])->name('services.edit');

Route::get('home/services/delete/{id}', [ServicesController::class, 'servicesdelete'])->name('services.delete');

//contact controller


Route::get('contact', [ContactController::class, 'index'])->name('contact');



Route::get('contact/all', [ContactController::class, 'admincontact'])->name('contact.all');

Route::get('contact/addpage', [ContactController::class, 'admincontactaddpage'])->name('contact.addpage');

Route::post('contact/add', [ContactController::class, 'adminContactadd']);

Route::get('contact/edit/{id}', [ContactController::class, 'admineditpage'])->name('contact.editpage');

Route::post('contact/edit/{id}', [ContactController::class, 'adminedit'])->name('contact.edit');

Route::get('contact/delete/{id}', [ContactController::class, 'admincontactdelete'])->name('contact.delete');

Route::post('contactform/submit', [ContactController::class, 'admincontactform'])->name('contactform.submit');

Route::get('contactdetails', [ContactController::class, 'contactdetails'])->name('contact.details');


//changepass

Route::get('Password/Update', [ChangePass::class, 'index'])->name('change.password');

Route::post('Password/Update', [ChangePass::class, 'updatepassword'])->name('update.password');

//teams controller

Route::get('teams/all', [TeamController::class, 'index'])->name('teams.all');

//testimonialscontroller

Route::get('testimonials/all', [TestimonialsController::class, 'index'])->name('testimonials.all');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();
    return view('admin.index');
})->name('dashboard');
