<?php

use App\Http\Controllers\Admin\Common\SettingsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Pages\HospitalController;
use App\Http\Controllers\Admin\Pages\HotelController;
use App\Http\Controllers\Admin\Pages\LaboratoryController;
use App\Http\Controllers\Admin\Pages\PageController;
use App\Http\Controllers\Admin\Pages\TeamsController;
use App\Http\Controllers\Admin\Users\ProfileController;
use App\Http\Controllers\Admin\Users\UserController;
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

Route::group(['prefix' => env('ADMIN_PREFIX', 'admin'), 'as' => 'admin.'], function () {

    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::middleware(['auth', 'auth.session'])->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // Search in dashboard
        Route::get('/search', [DashboardController::class, 'search'])->name('search');

        // Logged-in user profile
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/profile', function () {
                return view('admin.users.profile');
            })->name('profile');

            Route::put('/password-update', [ProfileController::class, 'updatePassword'])->name('password-update');
            Route::put('/profile-update', [ProfileController::class, 'updateProfile'])->name('profile-update');
            Route::post('/logout-everywhere', [ProfileController::class, 'logoutEverywhere'])->name('logout-everywhere');
        });


        Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
            Route::get('/', [SettingsController::class, 'index'])->name('index');
            Route::post('/update', [SettingsController::class, 'update'])->name('update');
        });

        // All Users 
        Route::resource('users', UserController::class);

        // Hotels
        Route::resource('rooms', HotelController::class)->except(['show'])->parameters(['rooms' => 'hotel']);

        // Hospital
        Route::resource('hospital', HospitalController::class)->except(['show']);

        // Laboratory
        Route::resource('laboratory', LaboratoryController::class)->except(['show']);

        // Teams
        Route::resource('teams', TeamsController::class)->except(['show']);

        // Teams
        Route::resource('page', PageController::class)->only(['index', 'update', 'edit']);
    });
});
