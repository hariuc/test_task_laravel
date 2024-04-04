<?php

use App\Application\Modules\Currency\Controllers\Web\CurrencyWebController;
use App\Application\Modules\Currency\Models\CurrencyModel;
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

Route::get("/currency/", [CurrencyWebController::class, 'index'])->name("currency.list");
Route::get("/currency/{id}/", [CurrencyWebController::class, 'show'])->name("currency.item");

//Route::get("admin-panel/currency/", CurrencyModel::class);
