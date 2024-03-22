<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\Filament\GuestPanelController::class, 'index']);
Route::get('/upload', [\App\Http\Controllers\Filament\GuestPanelController::class, 'upload']);
Route::post('/students/sync-photos', 'StudentController@syncPhotos')->name('students.sync-photos');
