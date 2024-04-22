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
Route::get('/offer', [GuestPanelController::class, 'offer'])->name('offer');
Route::get('/product', [GuestPanelController::class, 'product'])->name('product');
Route::get('/not-available', [GuestPanelController::class, 'notAvailable'])->name('not-available');
Route::get('/gallery-code', [GuestPanelController::class, 'galleryCode'])->name('gallery-code');
Route::get('/contact', [GuestPanelController::class, 'contact'])->name('contact');
Route::get('/offers', [GuestPanelController::class, 'offers'])->name('offers');
Route::get('/kindergarten-und-schulfotografie', [GuestPanelController::class, 'kindergarden'])->name('kindergarden');
Route::get('/upload', [GuestPanelController::class, 'upload']);
Route::get('/team', [GuestPanelController::class, 'team'])->name('team');
Route::get('/partners', [GuestPanelController::class, 'partners'])->name('partners');
Route::get('/view-for-testing-purposes', [GuestPanelController::class, 'viewForTestingPurposes'])->name('view-for-testing-purposes');
Route::get('/agb', [GuestPanelController::class, 'frequentlyAskedQuestion'])->name('frequently-asked-question');
Route::get('/impressum', [GuestPanelController::class, 'impressum'])->name('impressum');
Route::get('/haeufig-gestellte-fragen-faq', [GuestPanelController::class, 'generalTermsAndConditions'])->name('general-terms-and-conditions');
Route::post('/students/sync-photos', 'StudentController@syncPhotos')->name('students.sync-photos');
Route::post('/contact/submit', [GuestPanelController::class, 'postContactForm'])->name('contact.submit');
