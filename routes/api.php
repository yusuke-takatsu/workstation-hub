<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', LoginController::class)->name('login');
Route::post('/register', RegisterController::class)->name('register');
Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->name('verification.verify');
Route::post('forgot-password', PasswordResetLinkController::class)->name('password.email');
Route::post('reset-password', NewPasswordController::class)->name('password.reset');
Route::post('/logout', LogoutController::class)->name('logout');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
