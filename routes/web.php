<?php

use App\Http\Controllers\CartController;
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

Route::controller(GuestPanelController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/product', 'product')->name('product');
    Route::get('/not-available', 'notAvailable')->name('not-available');
    Route::get('/gallery-code', 'galleryCode')->name('gallery-code');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/our-offers', 'offers')->name('offers');
    Route::get('/offer/{id}', 'offer')->name('offer');
    Route::get('/kindergarten-und-schulfotografie', 'kindergarden')->name('kindergarden');
    Route::get('/upload', 'upload');
    Route::get('/team', 'team')->name('team');
    Route::get('/partners', 'partners')->name('partners');
    Route::get('/view-for-testing-purposes', 'viewForTestingPurposes')->name('view-for-testing-purposes');

    // Routes for legal and informational pages
    Route::get('/impressum', 'impressum')->name('impressum');
    Route::get('/cookie-policy', 'cookiePolicy')->name('cookie-policy');
    Route::get('/privacy-policy', 'privacyPolicy')->name('privacy-policy');
    Route::get('/agb', 'generalTermsAndConditions')->name('general-terms-and-conditions');
    Route::get('/haeufig-gestellte-fragen-faq', 'frequentlyAskedQuestions')->name('frequently-asked-questions');

    Route::post('/contact/submit', 'postContactForm')->name('contact.submit');
    Route::get('/category/{slug}', 'showCategoryProducts')->name('category.products');
});

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/cart/count', [CartController::class, 'countItems'])->name('cart.count');
Route::post('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/students/sync-photos', 'StudentController@syncPhotos')->name('students.sync-photos');
Route::get('/cart/items', [CartController::class, 'getCartItems'])->name('cart.items');
