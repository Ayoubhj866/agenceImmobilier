<?php

use App\Http\Controllers\AdminPanel\OptionController;
use App\Http\Controllers\AdminPanel\PropertyController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


// admin routes

Route::prefix('admin')->controller(PropertyController::class)->name('admin.')->group(function () {
    Route::resource("property", PropertyController::class)->except(["show"]);
    Route::resource("option", OptionController::class)->except('show');
});
