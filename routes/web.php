<?php

use App\Http\Controllers\MembersController;
use App\Http\Controllers\ArisanController;
use App\Http\Controllers\TransactionsController;

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

// Rute untuk Members
Route::get('/members', [App\Http\Controllers\MembersController::class, 'index'])->name('members.index');
Route::get('/members/create', [App\Http\Controllers\MembersController::class, 'create'])->name('members.create');
Route::post('/members', [App\Http\Controllers\MembersController::class, 'store'])->name('members.store');
Route::get('/members/{members}/edit', [App\Http\Controllers\MembersController::class, 'edit'])->name('members.edit');
Route::put('/members/{members}', [App\Http\Controllers\MembersController::class, 'update'])->name('members.update');
Route::delete('/members/{members}', [App\Http\Controllers\MembersController::class, 'destroy'])->name('members.destroy');

// Rute untuk Arisan
Route::get('/arisan', [App\Http\Controllers\ArisanController::class, 'index'])->name('arisan.index');
Route::get('/arisan/create', [App\Http\Controllers\ArisanController::class, 'create'])->name('arisan.create');
Route::post('/arisan', [App\Http\Controllers\ArisanController::class, 'store'])->name('arisan.store');
Route::get('/arisan/{arisan}/edit', [App\Http\Controllers\ArisanController::class, 'edit'])->name('arisan.edit');
Route::put('/arisan/{arisan}', [App\Http\Controllers\ArisanController::class, 'update'])->name('arisan.update');
Route::delete('/arisan/{arisan}', [App\Http\Controllers\ArisanController::class, 'destroy'])->name('arisan.destroy');

// Rute untuk Transactions
Route::get('/transactions', [App\Http\Controllers\TransactionsController::class, 'index'])->name('transactions.index');
Route::get('/transactions/create', [App\Http\Controllers\TransactionsController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [App\Http\Controllers\TransactionsController::class, 'store'])->name('transactions.store');
Route::get('/transactions/{transactions}/edit', [App\Http\Controllers\TransactionsController::class, 'edit'])->name('transactions.edit');
Route::put('/transactions/{transactions}', [App\Http\Controllers\TransactionsController::class, 'update'])->name('transactions.update');
Route::delete('/transactions/{transactions}', [App\Http\Controllers\TransactionsController::class, 'destroy'])->name('transactions.destroy');

// Route logout
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
