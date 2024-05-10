<?php

use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EarningController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\TransactionController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Laravel\Jetstream\Rules\Role;

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




// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('landingPage');
});



Route::middleware(['auth','verified'])->group(function(){

    Route::get('/email-acountsPDF',[MailController::class,'EmailAccountsPDF'])->name('email.accounts');
    Route::get('/pdf-accounts', [PDFController::class, 'accountsPDF'])->name('pdf.accounts');
    Route::resource('investments',InvestmentController::class);
    Route::get('transactions/recycle',[TransactionController::class,'recycle'])->name('transactions.recycle');
    Route::post('transactions/restore/{id}',[TransactionController::class,'restore'])->name('transactions.restore');
    Route::delete('transactions/force-delete/{id}',[TransactionController::class,'forceDelete'])->name('transactions.force-delete');    
    Route::resource('transactions', TransactionController::class);
    Route::resource('accounts', AccountController::class);
    Route::resource('earnings', EarningController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('loans', LoanController::class);

});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard-jetstream', function () {
        return view('dashboardJetstream');
    })->name('dashboardJetstream');
});