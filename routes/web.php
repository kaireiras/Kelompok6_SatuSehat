<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SatuSehatController;

Route::get('/', function () {
    return view('welcome');
});

// Endpoint untuk mendapatkan Access Token SATUSEHAT
Route::get('/satusehat/token', [SatuSehatController::class, 'getAccessToken']);
