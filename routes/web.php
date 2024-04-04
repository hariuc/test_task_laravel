<?php

use App\Application\Modules\Currency\Controllers\Web\CurrencyWebController;
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

Route::get("/currency", [CurrencyWebController::class, 'index'])->name("currency");
Route::get("/currency/{id}", [CurrencyWebController::class, 'show'])->name("currency.show");
