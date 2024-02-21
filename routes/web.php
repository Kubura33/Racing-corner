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

Route::middleware(['auth', 'verified'])->group(function () {
    //User ROUTES
    Route::get('/profile/created-ads', \App\Http\Controllers\CreatedAdvertisementsController::class)->name('created-ads');
    Route::get('/profile/followed-ads', \App\Http\Controllers\FollowedAdvertisementsController::class)->name('followed-ads');
    Route::get('/profile/notifications', [\App\Http\Controllers\NotificationController::class, 'index'])->name('notification.index');
    Route::post('/profile/{notification}/notifications', [\App\Http\Controllers\NotificationController::class, 'update'])->name('notification.mark-as-read');
    Route::delete('/profile/notifications', [\App\Http\Controllers\NotificationController::class, 'destroy'])->name('notification.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/settings', [ProfileController::class, 'edit'])->name('settings');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/change-password', [\App\Http\Controllers\Auth\PasswordController::class, 'index'])->name('change-password');
    Route::put('profile/change-password', [\App\Http\Controllers\Auth\PasswordController::class, 'update'])->name('password.update');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::resource('ads', \App\Http\Controllers\AdController::class)->except(['show', 'index']);
    Route::post('/follow-advert', \App\Actions\FollowAdvert::class)->name('follow-advert');
    Route::post('/advert-has-been-sold/{ad}', \App\Actions\SetAdverToSold::class)->name('advert-has-been-sold');
///////////////////////////////////////////////////////////////////



    //Admin routes
    Route::middleware('role:2')->group(function () {
        Route::get('/admin/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/users', [\App\Http\Controllers\UserController::class, 'index'])->name('admin.users');
        Route::get('/admin/ads', [\App\Http\Controllers\AdminController::class, 'ads'])->name('admin.ads');
        Route::prefix('admin')->group(function () {
            Route::resource('users', \App\Http\Controllers\UserController::class)->only(['edit', 'update', 'destroy']);
        });
        Route::post('/set-ad-to-premium/{ad}', \App\Actions\SetAdvertToPremium::class)->name('set-advert-to-premium');
        Route::put('/set-user-to-premium/{user}', \App\Actions\SetUserPremium::class)->name('set-user-to-premium');
    });
////////////////////////////////////////////////////////////////////////////
///
});
//Ads handling
//ROUTES USED FOR HOME ROUTES
Route::get('/tires', \App\Http\Controllers\TiresController::class)->name('tires');
Route::get('/equipment', \App\Http\Controllers\EquipmentController::class)->name('equipment');
Route::get('/parts', \App\Http\Controllers\PartsController::class)->name('parts');
Route::get('/cars', \App\Http\Controllers\VehicleController::class)->name('cars');
Route::get('/about', function () {
    return Inertia::render('Home/About');
})->name('about');
Route::get('/search', \App\Http\Controllers\SearchController::class)->name('search');
Route::resource('ads', \App\Http\Controllers\AdController::class)->only(['show']);
Route::get('/', [\App\Http\Controllers\AdController::class, 'index'])->name('home');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




require __DIR__ . '/auth.php';
