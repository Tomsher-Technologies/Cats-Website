<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Users\ProfileController;
use App\Http\Controllers\Users\UserController;
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

include 'admin.php';

Route::get('/', [FrontendController::class, 'home'])->name('home');

Route::fallback([FrontendController::class, 'catchAll']);