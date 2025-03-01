<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SlideShowController;
use App\Http\Controllers\ProductTypesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\LicenseKeysController;
use App\Http\Controllers\KmeowKeyShopController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrderItemsController;
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

// Route::get('/admin', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['isAdmin', 'auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(ProductsController::class)->group(function(){
    Route::middleware(['isAdmin', 'auth'])->group(function () {
        Route::get('/IndexProducts','Index')->name('Products.Index');
        Route::get('/CreateProducts','Create')->name('Products.Create');
        Route::post('/StoreProducts','Store')->name('Products.Store');
        Route::get('/EditProducts/{products}','Edit')->name('Products.Edit');
        Route::post('/UpdateProducts/{products}','Update')->name('Products.Update');
        Route::delete('/DeleteProducts/{products}','Delete')->name('Products.Delete');
    });
});

Route::controller(SlideShowController::class)->group(function(){
    Route::middleware(['isAdmin', 'auth'])->group(function () {
        Route::get('/IndexSlideShow','Index')->name('SlideShow.Index');
        Route::get('/CreateSlideShow','Create')->name('SlideShow.Create');
        Route::post('/StoreSlideShow','Store')->name('SlideShow.Store');
        Route::get('/EditSlideShow/{slideShow}','Edit')->name('SlideShow.Edit');
        Route::post('/UpdateSlideShow/{slideShow}','Update')->name('SlideShow.Update');
        Route::delete('/DeleteSlideShow/{slideShow}','Delete')->name('SlideShow.Delete');
    });
});

Route::controller(ProductTypesController::class)->group(function(){
    Route::middleware(['isAdmin', 'auth'])->group(function () {
        Route::get('/IndexProductTypes','Index')->name('ProductTypes.Index');
        Route::get('/CreateProductTypes','Create')->name('ProductTypes.Create');
        Route::post('/StoreProductTypes','Store')->name('ProductTypes.Store');
        Route::get('/EditProductTypes/{productTypes}','Edit')->name('ProductTypes.Edit');
        Route::post('/UpdateProductTypes/{productTypes}','Update')->name('ProductTypes.Update');
        Route::delete('/DeleteProductTypes/{productTypes}','Delete')->name('ProductTypes.Delete');
    });
});

Route::controller(LicenseKeysController::class)->group(function(){
    Route::middleware(['isAdmin', 'auth'])->group(function () {
        Route::get('/IndexLicenseKeys','Index')->name('LicenseKeys.Index');
        Route::get('/CreateLicenseKeys','Create')->name('LicenseKeys.Create');
        Route::post('/StoreLicenseKeys','Store')->name('LicenseKeys.Store');
        Route::get('/EditLicenseKeys/{licenseKeys}','Edit')->name('LicenseKeys.Edit');
        Route::post('/UpdateLicenseKeys/{licenseKeys}','Update')->name('LicenseKeys.Update');
        Route::delete('/DeleteLicenseKeys/{licenseKeys}','Delete')->name('LicenseKeys.Delete');
    });
});

Route::controller(KmeowKeyShopController::class)->group(function(){
    Route::get('/','Index')->name('Index');
    Route::get('/Products/{Type}','Products')->name('Products');
    Route::get('/ProductDetail/{Type}/{products}','ProductDetail')->name('ProductDetail');
    Route::get('/Games','Games')->name('Games');
    Route::get('/Software','Software')->name('Software');
    Route::get('/GameDetail/{products}','GameDetail')->name('GameDetail');
    Route::get('/SoftwareDetail/{products}','SoftwareDetail')->name('SoftwareDetail');
    Route::get('/CreditCard','CreditCard')->name('CreditCard');
    Route::get('/search', 'Search')->name('search');
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/add-to-cart/{products}', 'addToCart')->name('add_to_cart');
    Route::patch('/update-cart', 'updateCart')->name('update_cart');
    Route::delete('/remove-from-cart', 'removeCart')->name('remove_from_cart');
});

Route::controller(OrdersController::class)->group(function(){
    Route::middleware('auth')->group(function () {
        Route::get('/StoreOrders', 'store')->name('Orders.Store');
    });
});

Route::controller(OrderItemsController::class)->group(function(){
    Route::middleware('auth')->group(function () {
        Route::get('/StoreOrderItems', 'store')->name('OrderItems.Store');
    });
});
