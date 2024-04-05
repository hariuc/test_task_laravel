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
    Route::get("/currency/show/{id}", "show")->name("currency.show.item");

    Route::middleware(["web", "auth"])->group(function (){
        Route::get("/currency/edit/{id}", "edit")->name("currency.edit.item");
        //Route::post("/currency/edit/{id}", "edit")->name("currency.edit.item");
        Route::put("/currency/update/{id}", "update")->name("currency.update.item");
    });

});

Route::controller(AuthController::class)->group(function () {
    Route::get("/register", 'register')->name("register");
    Route::get("/login", 'login')->name("login");
    Route::post("/user-store", "store")->name("user.store");
    Route::post("user-authenticate", "authenticate")->name("user.authenticate");
    Route::post("/user-logout", 'logout')->name("user.logout");
});


