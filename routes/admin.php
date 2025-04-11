<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/dashboard', [App\Http\Controllers\Auth\LoginController::class, 'admin_dashboard'])->name('dashboard')->withoutMiddleware('guest');
