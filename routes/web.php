<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/create', [UserController::class, 'index'])->name('create');
Route::post('/create/user', [UserController::class, 'create'])->name('create.user');
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [UserController::class, 'store'])->name('update');
Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('delete');
