<?php

use App\Http\Controllers\AuthController;
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

// Guest Panel Routes
Route::controller(GuestPanelController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/not-available', 'notAvailable')->name('not-available');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/our-offers', 'offers')->name('offers');
    Route::post('/webhook-zahls', 'webhookZahls')->name('webhook-zahls')
        ->middleware('verify.zahls.origin');
    Route::get('/offer/{id}', 'offer')->name('offer');
    Route::get('/kindergarten-und-schulfotografie', 'kindergarden')->name('kindergarden');
    Route::get('/upload', 'upload');
    Route::get('/team', 'team')->name('team');
    Route::get('/partners', 'partners')->name('partners');
    Route::get('/view-for-testing-purposes', 'viewForTestingPurposes')->name('view-for-testing-purposes');

    Route::get('/impressum', 'impressum')->name('impressum');
    Route::get('/cookie-policy', 'cookiePolicy')->name('cookie-policy');
    Route::get('/privacy-policy', 'privacyPolicy')->name('privacy-policy');
    Route::get('/agb', 'generalTermsAndConditions')->name('general-terms-and-conditions');
    Route::get('/haeufig-gestellte-fragen-faq', 'frequentlyAskedQuestions')->name('frequently-asked-questions');
    Route::get('/login', 'login')->name('login');
    Route::post('/contact/submit', 'postContactForm')->name('contact.submit')->middleware('throttle:1,0.1');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware(['auth:student'])->group(function () {
    Route::controller(GuestPanelController::class)->group(function () {
        Route::get('/webshop/{slug?}', 'webshop')->name('webshop');
        Route::get('/product', 'product')->name('product');
        Route::get('/gallery-code', 'galleryCode')->name('gallery-code');
    });

    Route::post('/students/sync-photos', 'StudentController@syncPhotos')->name('students.sync-photos');

    Route::controller(CartController::class)->group(function () {
        Route::post('/add-to-cart', 'addToCart')->name('add.to.cart');
        Route::get('/cart', 'index')->name('cart');
        Route::post('/cart/forget', 'forgetCart')->name('cart.forget');
        Route::post('/cart/payment', 'createPaymentForm')->name('cart.payment');
        Route::post('/cart/payment/bank', 'createBankPayment')->name('cart.payment.bank_transfer');
        Route::get('/cart/count', 'countDistinctProducts')->name('cart.count');
        Route::post('/cart/remove/{productId}', 'removeFromCart')->name('cart.remove');
        Route::get('/cart/items', 'getCartItems')->name('cart.items');
        Route::post('/cart/update-quantity/{productId}', 'updateQuantity')->name('cart.update-quantity');

        Route::get('/payment-success', 'paymentSuccess')->name('payment-success');
        Route::get('/payment-failed', 'paymentFailed')->name('payment-failed');
    });
});

Route::get('robots.txt', function () {
    $robotsContent = "User-agent: *\nDisallow: /private/\nDisallow: /tmp/\nDisallow: /cache/\nDisallow: /admin/\n\nSitemap: ".url('sitemap.xml');

    return response($robotsContent, 200)->header('Content-Type', 'text/plain');
});

Route::get('sitemap.xml', function () {
    return response()->file(public_path('sitemap.xml'), ['Content-Type' => 'application/xml']);
});
