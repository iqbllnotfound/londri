<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[AdminController::class,'home'])->name('home');
Route::post('/search/pesanan',[AdminController::class,'searchNoHp'])->name('search.noHp');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin',[AdminController::class,'index'])->name('dashboard.admin');
    Route::get('/input',[AdminController::class,'create'])->name('create');
    Route::post('/input/data',[AdminController::class,'store'])->name('store');
    Route::get('/edt/data/{id}',[AdminController::class,'edit'])->name('edit');
    Route::put('/input/data/{id}',[AdminController::class,'update'])->name('update');
    Route::delete('/delete/{id}',[AdminController::class,'destroy'])->name('delete');
});


Route::middleware('role:owner')->group(function () {
    Route::get('/home/owner',[AdminController::class,'owner'])->name('home.owner');
    Route::get('/search/date',[AdminController::class,'searchDate'])->name('search.date');
    
});



require __DIR__.'/auth.php';
