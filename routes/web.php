<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class)->middleware(['auth', 'checkrole:manager']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth', 'checkrole:farm_sales_operator']], function () {
    // Routes that only farm sales operators can access
    Route::get('/orders/pending', [OrderController::class, 'pendingOrders'])->name('orders.pending');
    Route::post('/orders/{order}/deliver', [OrderController::class, 'markAsDelivered'])->name('orders.deliver');
});

require __DIR__.'/auth.php';
