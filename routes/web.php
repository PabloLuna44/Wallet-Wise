<?php

use App\Http\Controllers\ExpenseController;
use App\Models\Expense;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EarningController;

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

Route::resource('earnings', EarningController::class);
Route::get('/', function () {
    return view('welcome');
});


Route::resource('/expense',ExpenseController::class);
