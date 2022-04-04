<?php

declare(strict_types=1);

use App\Http\Controllers\InviteUrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InviteUrlController::class, 'index'])->name('home');
Route::post('/', [InviteUrlController::class, 'store'])->name('short.url.post');
Route::get('{code}', [InviteUrlController::class, 'redirectByCode'])->name('short.url');
