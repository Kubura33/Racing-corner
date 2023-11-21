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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/home', function(){
    return Inertia::render('Home/Home');
})->name('home');
/////////////////
Route::get('UserHome', function(){
    return Inertia::render('Profile/UserHome');
})->name('UserHome');
Route::get('/CreateAds', function (){
    return Inertia::render('Home/CreateAds');
})->name('CreateAds');
////////////////
Route::get('/tires', function (){
    return Inertia::render('Home/TiresPage');
})->name('tires');

Route::get('/equipment', function (){
    return Inertia::render('Home/EquipmentPage');
})->name('equipment');
Route::get('/parts', function (){
    return Inertia::render('Home/PartsPage');
})->name('parts');
Route::prefix('discipline')->group(function (){
    Route::get('/rally', function (){
        return Inertia::render('Discipline/Rally');
    })->name('rally');
    Route::get('/lap-races', function (){
        return Inertia::render('Discipline/LapRaces');
    })->name('lap-races');
    Route::get('/hill-races', function (){
        return Inertia::render('Discipline/HillRaces');
    })->name('hill-races');
    Route::get('/slalom', function (){
        return Inertia::render('Discipline/Slalom');
    })->name('slalom');
    Route::get('/karting', function (){
        return Inertia::render('Discipline/Karting');
    })->name('karting');
    Route::get('/autocross', function (){
        return Inertia::render('Discipline/Autocross');
    })->name('autocross');
    Route::get('/drift', function (){
        return Inertia::render('Discipline/Drift');
    })->name('drift');
});
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
});

require __DIR__.'/auth.php';
