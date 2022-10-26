<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Home\HomeSliderController;

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


//exercicio
Route::controller(DemoController::class)->group(function(){
        Route::get('/about',  'Index')->name('about.page')->middleware('check');
        Route::get('/contact',  'ContactMethod');
});
//Admin All Route
Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/logout',  'destroy')->name('admin.logout');
        Route::get('/admin/profile',  'Profile')->name('admin.profile');
        Route::get('/edit/profile',  'EditProfile')->name('edit.profile');
        Route::post('/store/profile',  'StoreProfile')->name('store.profile');

        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password',  'UpdatePassword')->name('update.password');


});

//Home Slide All Route
Route::controller(HomeSliderController::class)->group(function(){
        Route::get('/home/slide',  'HomeSlider')->name('home.slide');
        Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
});


// Route::get('/about', [DemoController::class, 'Index']);
// Route::get('/contact', [DemoController::class, 'Contact']);

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';