<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CarController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\PageController;
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



Route::prefix('pages')->group(function () {
Route::get('/index',[PageController::class ,'index']);
Route::get('/listing', [PageController::class ,'CarsListing_testimonials']);
Route::get('/about', function () {
    return view('about');
});
Route::get('/testimonials', [PageController::class ,'allTestimonials']);
Route::get('/blog', [PageController::class ,'allCars']);
Route::get('/single/{id}', [PageController::class ,'single'])->name('single');
Route::get('/contact', function () {
    return view('contact');
});
Route::post('/contact/sendMail',[PageController::class ,'store_sendMAil'])->name('contact.sendMail');
});
/////////
Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware(['auth','verified','fetch.data'])->group(function () {
    Route::get('/dashboard',[MessageController::class,'getDashboard']
      );

    Route::get('/index', function () {
        return  redirect('pages/index');
    })->name('admin.index');
    //cars routes with (admin) prefix
    Route::prefix('cars')->group(function () {
        Route::get('/',[CarController::class ,'index'])->name('cars');
        Route::get('/create',[CarController::class ,'create'])->name('cars.create');
        Route::post('/store',[CarController::class ,'store'])->name('cars.store');
        Route::get('/edit/{id}',[CarController::class ,'edit'])->name('cars.edit');
        Route::put('/update/{id}',[CarController::class ,'update'])->name('cars.update');
        Route::get('/delete/{id}',[CarController::class ,'destroy'])->name('cars.delete');

    });
    Route::prefix('categories')->group(function () {
        Route::get('/',[CategoryController::class ,'index'])->name('categories');
        Route::get('/create',[CategoryController::class ,'create'])->name('categories.create');
        Route::post('/store',[CategoryController::class ,'store'])->name('categories.store');
        Route::get('/edit/{id}',[CategoryController::class ,'edit'])->name('categories.edit');
        Route::put('/update/{id}',[CategoryController::class ,'update'])->name('categories.update');
        Route::get('/delete/{id}',[CategoryController::class ,'destroy'])->name('categories.delete');

    });
    Route::prefix('testimonials')->group(function () {
        Route::get('/',[TestimonialController::class ,'index'])->name('testimonials');
        Route::get('/create',[TestimonialController::class ,'create'])->name('testimonials.create');
        Route::post('/store',[TestimonialController::class ,'store'])->name('testimonials.store');
        Route::get('/edit/{id}',[TestimonialController::class ,'edit'])->name('testimonials.edit');
        Route::put('/update/{id}',[TestimonialController::class ,'update'])->name('testimonials.update');
        Route::get('/delete/{id}',[TestimonialController::class ,'destroy'])->name('testimonials.delete');

    });
Route::prefix('users')->group(function () {
    Route::get('/',[UserController::class ,'index'])->name('users');
    Route::get('/create',[UserController::class ,'create'])->name('users.create');
    Route::post('/store',[UserController::class ,'store'])->name('users.store');
    Route::get('/edit/{id}',[UserController::class ,'edit'])->name('users.edit');
    Route::put('/update/{id}',[UserController::class ,'update'])->name('users.update');
    Route::get('/delete/{id}',[UserController::class ,'destroy'])->name('users.delete');
});
Route::prefix('messages')->group(function () {
    Route::get('/',[MessageController::class,'index'])->name('messages');
    Route::get('showMessage/{id}',[MessageController::class ,'show'])->name('messages.show');
    Route::get('/deleteMessage/{id}',[MessageController::class ,'destroy'])->name('messages.delete');
});

});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
