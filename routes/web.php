<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
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

Route::resource('admin/customers', AdminController::class);

Route::post('admin/customers/{detail}/approve', [AdminController::class, 'approve'])->name('customers.approve');
Route::post('admin/customers/{detail}/reject', [AdminController::class, 'reject'])->name('customers.reject');
Route::get('admin/customers/{detail}/edit', [AdminController::class, 'edit'])->name('customers.edit');
Route::post('admin/customers/{detail}/update', [AdminController::class, 'update'])->name('customers.update');

});

require __DIR__.'/auth.php';

// Route::get('/', function () {
//     return redirect('customer');
// });
// Route::middleware('role:admin')->group(function () {
   

// });

   Route::resource('customer',CustomerController::class);
   Route::get('customer-login',[CustomerController::class,'login']);
   Route::post('customer-logout',[CustomerController::class,'logout'])->name('customer.logout');
   Route::get('customer-dashboard',[CustomerController::class,'dashboard']);
   Route::post('customer-login',[CustomerController::class,'custLogin'])->name('customer.cust-login');




