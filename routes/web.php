<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PresetController;
Route::get('/', function () {
    return view('home');
});
// Route::get('/', function () {
//     return view('history');
// });

Route::get('/history',[EntryController::class, 'index']);
Route::get('/categories',[CategoryController::class, 'index']);
Route::get('/presets',[PresetController::class, 'index']);
