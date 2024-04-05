<?php

use App\Application\Modules\Currency\Controllers\Web\CurrencyWebController;
use App\Application\Modules\User\Controllers\AuthController;
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


Route::controller(CurrencyWebController::class)->group(function () {
    Route::get("/currency", "index")->name("currency.list");
    Route::get("/currency/{id}", "show")->name("currency.item");
});

Route::controller(AuthController::class)->group(function () {
    Route::get("/register", 'register')->name("register");
    Route::get("/login", 'login')->name("login");
    Route::post("/user-store", "store")->name("user.store");
    Route::post("/logout", 'logout')->name("logout");
});

//Route::get("/register", [AuthController::class, 'register'])->name("register");
//Route::get("/login", [AuthController::class, 'login'])->name("login");
//Route::post("/logout", [AuthController::class, 'logout'])->name("logout");

//Route::get("admin-panel/currency/", [AuthController::class, "register"]);
