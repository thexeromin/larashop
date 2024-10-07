<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('product', ProductController::class);
Route::resource('cart', CartController::class);

Route::post('/payment-intent', [PaymentController::class, 'createIntent'])->name('paymentIntent.create');
Route::get('/checkout/{token}', [PaymentController::class, 'checkoutView'])->name('checkout.index');
Route::get('/complete', [PaymentController::class, 'complete'])->name('complete.index');

require __DIR__.'/auth.php';
