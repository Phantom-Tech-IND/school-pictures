<?php

use App\Http\Controllers\Filament\GuestPanelController;
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

Route::get('/', [GuestPanelController::class, 'index'])->name('home');
Route::get('/shop', [GuestPanelController::class, 'shop'])->name('shop');
Route::get('/not-available', [GuestPanelController::class, 'notAvailable'])->name('not-available');
Route::get('/gallery-code', [GuestPanelController::class, 'galleryCode'])->name('gallery-code');
Route::get('/contact', [GuestPanelController::class, 'contact'])->name('contact');
Route::get('/offers', [GuestPanelController::class, 'offers'])->name('offers');
Route::get('/kindergarten-und-schulfotografie', [GuestPanelController::class, 'kindergarden'])->name('kindergarden');
Route::get('/upload', [GuestPanelController::class, 'upload']);
Route::get('/team', [GuestPanelController::class, 'team'])->name('team');
Route::get('/partners', [GuestPanelController::class, 'partners'])->name('partners');
Route::get('/contact', [GuestPanelController::class, 'contact'])->name('contact');
Route::post('/students/sync-photos', 'StudentController@syncPhotos')->name('students.sync-photos');
