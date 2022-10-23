<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Demo\DemoController;

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


// Route::get('/about', [DemoController::class, 'Index']);
// Route::get('/contact', [DemoController::class, 'Contact']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';