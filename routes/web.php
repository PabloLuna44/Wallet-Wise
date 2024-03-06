<?php


use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EarningController;
use App\Http\Controllers\LoanController;
use App\Models\Loan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EarningController;
use App\Http\Controllers\InvestmentController;
use App\Models\Investment;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\TransactionController;


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

Route::resource('transactions', TransactionController::class);
Route::resource('accounts', AccountController::class);
Route::resource('earnings', EarningController::class);
Route::resource('expenses', ExpenseController::class);
Route::resource('/investment',InvestmentController::class);
Route::resource('/loans',LoanController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing', function () {
    return view('landingPage');
});

Route::middleware(['auth'])->group(function(){

    Route::resource('/investment',InvestmentController::class);

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});