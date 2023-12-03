<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Home/Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



/////////////////
Route::get('/RentCar', function (){
    return Inertia::render('Home/RentCar');
})->name('RentCar');
////////////////
Route::get('/tires',\App\Http\Controllers\TiresController::class)->name('tires');


////
Route::get('/equipment', \App\Http\Controllers\EquipmentController::class)->name('equipment');
Route::get('/parts', \App\Http\Controllers\PartsController::class)->name('parts');
Route::get('/details', function(){
    return Inertia::render('Home/Details');
})->name('details');
Route::get('/cars', function (){
    return Inertia::render('Home/Cars');
})->name('cars');

Route::get('/about', function (){
    return Inertia::render('Home/About');
})->name('about');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class,'index'])->name('profile.index');
    Route::resource('ads', \App\Http\Controllers\AdController::class)->except(['show', 'index']);

});
//Ads handling
Route::resource('ads', \App\Http\Controllers\AdController::class)->only(['show']);
Route::get('/home', [\App\Http\Controllers\AdController::class, 'index'])->name('home');
require __DIR__.'/auth.php';
