<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(middleware: ['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::get('/', [SiteController::class, 'index'])->name('home.index');

Route::prefix('shop')->name('shop.')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('index');
    Route::get('/category/{category}', [ShopController::class, 'category'])->name('category');
    Route::get('/collection/{collection}', [ShopController::class, 'collection'])->name('collection');
    Route::get('/search', [ShopController::class, 'search'])->name('search');
});

Route::prefix('product')->name('product.')->group(function () {
    Route::get('/{slug}', [ProductController::class, 'show'])->name('show');
});

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/sitemap.xml', [SiteController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [SiteController::class, 'robots'])->name('robots');

Route::prefix('api')->name('api.')->group(function () {
    Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/product/{id}/quick-view', [ProductController::class, 'quickView'])->name('product.quick-view');
});

require __DIR__ . '/auth.php';
