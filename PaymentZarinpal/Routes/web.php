<?php
use Illuminate\Support\Facades\Route;
use Modules\PaymentZarinpal\Http\Controllers\PaymentZarinpalController;

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




Route::prefix('/payment_zarinpal')->group(function() {
    Route::get('/verifyPayment' , [PaymentZarinpalController::class , 'verifyPayment'])->name('verifyPayment');
});

