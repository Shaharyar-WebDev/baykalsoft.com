<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageShowController;
use App\Http\Controllers\Shop\CartController;
use App\Http\Controllers\Shop\HomeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Shop\CompareController;
use App\Http\Controllers\Shop\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Shop\CategoryController;
use App\Http\Controllers\Shop\CheckoutController;
use App\Http\Controllers\Shop\WishlistController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Shop\Order\OrderController;
use App\Http\Controllers\Shop\Account\GarageController;
use App\Http\Controllers\Shop\Account\AddressController;
use App\Http\Controllers\Shop\Account\DashboardController;
use App\Http\Controllers\Shop\Order\OrderTrackingController;
use App\Http\Controllers\Shop\Account\OrderDetailsController;
use App\Http\Controllers\Shop\Account\OrderHistoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([])->group(function () {

    Route::get('/home', [HomeController::class, 'index']);


    Route::resource('/products', ProductController::class)->only([
        'index',
        'show'
    ]);

    Route::get('/categories', [CategoryController::class, 'index']);

    Route::get('/cart', [CartController::class, 'index']);

    Route::get('/checkout', [CheckoutController::class, 'index']);

    Route::get('/wishlist', [WishlistController::class, 'index']);

    Route::get('/compare', [CompareController::class, 'index']);

    Route::prefix('order')->group(function () {

        Route::get('/success', [OrderController::class, 'index'])->name('order.success');

        Route::get('/track', [OrderTrackingController::class, 'index'])->name('order.track');
    });

    Route::prefix('account')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index']);

        Route::get('/garage', [GarageController::class, 'index'])->name('account.garage');

        Route::get('/orders/history', [OrderHistoryController::class, 'index'])->name('account.orders.history');

        Route::get('/orders/{id}', [OrderDetailsController::class, 'index'])->name('account.orders.details');

        Route::get('/addresses', [AddressController::class, 'index'])->name('account.adresses');
    });
});


Route::prefix('admin')->middleware('adminLocale')->as('admin.')->group(function () {

    Route::get('/locale/{locale}', function ($locale) {
        if (!in_array($locale, config('locale.supported_locales'))) {
            abort(403);
        }
        session(['locale' => $locale]);
        App::setLocale($locale);
        return back();
    })->name('locale');

    Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/test', [AdminDashboardController::class, 'index'])->name('test');

    Route::get('/dashboard/new', [AdminDashboardController::class, 'index'])->name('new');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings');

    Route::get('/products', [AdminProductController::class, 'index'])->name('products');

    Route::resource('/pages', PageController::class);
});


Route::get('/pages/{slug}', PageShowController::class)->name('pages.show')->middleware(['adminLocale', 'cacheResponse:3000']);
