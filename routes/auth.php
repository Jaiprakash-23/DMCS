<?php
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
Route::middleware(['guest'])->group(function(){

            // login route
            Route::get('/login', [LoginController::class, 'ShowLog'])->name('login');
            Route::post('/login_match', [LoginController::class, 'LoginMatch'])->name('loginMatch');
});


      Route::post('/logout',[LoginController::class,'logout'])->middleware("auth")->name('logout');

