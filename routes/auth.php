<?php
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
Route::middleware(['guest'])->group(function(){
            //code with sanchit singh
            // login route
            Route::get('/login', [LoginController::class, 'ShowLog'])->name('login');
            Route::post('/login_match', [LoginController::class, 'LoginMatch'])->name('loginMatch');
});


   // logout route code with sanchit singh
      Route::post('/logout',[LoginController::class,'logout'])->middleware("auth")->name('logout');

