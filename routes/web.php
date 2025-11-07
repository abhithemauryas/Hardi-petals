<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Added Controllers
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TransformationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
Route::controller(OrderController::class)->group(function(){
    Route::get('/pay',  'createPayment')->name('payment.start');
    Route::get('/payment-success',  'paymentSuccess')->name('payment.success');
    Route::post('/payment-webhook',  'webhook')->name('payment.webhook');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductController::class, 'publicProducts'])->name('products.public');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.details');
Route::get('/products/sort', [ProductController::class, 'sort'])->name('products.sort');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/coupon', [CartController::class, 'applyCoupon'])->name('cart.coupon');

Route::post('/place-order', [OrderController::class, 'create'])->name('order.create');

// CART ROUTES
Route::view('/checkout', 'checkout')->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout-success', function () {
    return view('checkout-success');
})->name('checkout.success');


// Route::get('/product/{id}', function ($id) {
//     $product = \App\Models\Product::findOrFail($id);
//     return view('03_product', compact('product'));
// })->name('product.details');



Route::get('/view/{name}', function($view){
    return view($view);
})->name('view');

Route::get('02', function () {
    return view('_shop');
})->name('_shop');

// Route::get('shop/grid', [ProductController::class, 'publicProducts'])->name('products.index');

Route::get('about', function () {
    return view('about');
})->name('about');
// Blog listing
Route::get('/blog', [BlogController::class, 'blogPage'])->name('blogweb');

// Single blog by slug
Route::get('/blog/{blog:slug}', [BlogController::class, 'blogSingle'])->name('blog.single');


Route::get('contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');


Route::get('login',function(){
    return view('login');
})->name('login');

Route::get('register',function(){
    return view('register');
})->name('register');

Route::controller(AuthController::class)->group(function(){
    Route::post('register','register')->name('register.post');
});

Route::controller(AuthController::class)->group(function(){
     Route::get('login','showinForm')->name('login');
     Route::post('login','login')->name('login.post');
     Route::post('logout','logout')->name('logout');
});


// ✅ Admin Routes
Route::group(['prefix' => '/admin', 'as'=>'admin.'], function () {
    require __DIR__.'/admin.php';
    Route::middleware(['admin'])->group(function () {

        Route::get('', [RoutingController::class, 'index'])->name('root');
        Route::view('/dashboard', 'admin.dashboards.index')->name('dashboard');
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::view('/products/create', 'admin.general.products.create')->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/delete/{product}', [ ProductController::class, 'remove' ])->name('products.remove');
        Route::get('/orders', [ OrderController::class, 'index'])->name('orders');
        Route::post('/update-order', [ OrderController::class, 'update'])->name('orders.update');
        Route::get('/delete-order/{id}', [ OrderController::class, 'delete'])->name('orders.remove');
        Route::get('/invoices', [ InvoiceController::class, 'index'])->name('invoices');
        Route::get('/invoice-detail/{id}', [ InvoiceController::class, 'detail'])->name('invoice.detail');
        Route::post('/upload', [DropzoneController::class,'upload'])->name('upload');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::view('/settings', 'admin.general.settings')->name('settings');
        Route::post('/settings/update', [SettingController::class, 'update'] )->name('updateSettings');
        Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
        Route::any('/general/products/{product}', [ProductController::class, 'edit'])->name('products.edit');

        Route::group(['prefix' => '/transformations', 'as' => 'transformations.', 'controller'=> TransformationController::class], function(){
            Route::get('/', 'index')->name('index');
            Route::post('/create', 'store')->name('store');
            Route::get('/remove/{id}', 'delete')->name('remove');
        });

        Route::group(['prefix' => '/blogs', 'as' => "blogs.", 'controller' => BlogController::class], function(){
            Route::get('/',  'index')->name('index');
            Route::get('/view/{blog}',  'view')->name('view');
            Route::get('/create',  'create')->name('create');
            Route::get('/edit/{blog}',  'edit')->name('edit');
            Route::post('/update',  'update')->name('update');
            Route::post('/store',  'store')->name('store');
            Route::get('/delete/{blog}',  'destroy')->name('delete');
        });

        Route::post('update-seq/{product}', [ProductController::class, 'updateSequence'])->name('seq');

    });
});
