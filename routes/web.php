<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\FormRestoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReqRestoController;
use App\Http\Controllers\RestoController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


// Route::get('kategori', function () {
//     return view('kategori');
// })->name('kategori');

Route::get('/', [RestoController::class, 'welcome'])->name('welcome');
Route::get('kategori', [RestoController::class, 'kategori'])->name('kategori');
Route::get('favorit', [RestoController::class, 'favorit'])->name('favorit')->middleware('auth');
Route::get('history', [BookingController::class, 'history'])->name('history')->middleware('auth');
Route::get('dashboard', [RestoController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('admin', [RestoController::class, 'create'])->name('admin.create')->middleware('auth');
Route::post('admin/create', [RestoController::class, 'store'])->name('admin.store');
Route::get('details/{id}', [BookingController::class, 'show'])->name('details.show');
Route::post('/booking/checkout', [BookingController::class, 'checkout'])->name('booking.checkout');
Route::get('/resto-register', [FormRestoController::class, 'create'])->name('register.resto');
Route::post('/resto-store', [FormRestoController::class, 'store'])->name('resto.store');
Route::get('/request-resto', [FormRestoController::class, 'index'])->name('resto.index');
Route::get('/live-search', [RestoController::class, 'liveSearch'])->name('liveSearch');
Route::get('/register/admin/resto', [ReqRestoController::class, 'registeradminresto'])->name('register.admin.resto');
Route::post('/register/admin/resto/store', [ReqRestoController::class, 'adminuser'])->name('store.admin.resto');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
