<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/')->group(function (){
    Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');

    Route::get('/cart/add/{id}',[\App\Http\Controllers\Frontend\CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [\App\Http\Controllers\Frontend\CartController::class, 'cart'])->name('cart');
    Route::get('/cart/delete/{id}', [\App\Http\Controllers\Frontend\CartController::class, 'deleteItem'])->name('cart.item.delete');

    Route::prefix('/shop')->group(function(){
        Route::get('/', [\App\Http\Controllers\Frontend\ShopController::class, 'index'])->name('shop');
        Route::get('/category={slug}', [\App\Http\Controllers\Frontend\HomeController::class, 'catShop'])->name('shop_cat');
    });
    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);

    Route::get('/register', [\App\Http\Controllers\Frontend\UserController::class, 'index'])->name('register');
    Route::post('/register', [\App\Http\Controllers\Frontend\UserController::class, 'store']);
    Route::get('/login/facebook', [\App\Http\Controllers\LoginController::class, 'facebook'])->name('facebook');
    Route::get('/callback/facebook', [\App\Http\Controllers\LoginController::class, 'facebookRedirect']);
    Route::get('/login/google', [\App\Http\Controllers\LoginController::class, 'google'])->name('google');
    Route::get('/callback/google', [\App\Http\Controllers\LoginController::class, 'googleRedirect']);

    Route::get('/forgot', [\App\Http\Controllers\ForgotController::class, 'index'])->name('forgot');
    Route::post('/forgot', [\App\Http\Controllers\ForgotController::class, 'forgot']);
    Route::get('/update-password/{token}', [\App\Http\Controllers\ForgotController::class, 'updateView'])->name('update.password');
    Route::post('/update-password/{token}', [\App\Http\Controllers\ForgotController::class, 'updatePassword']);

});

Route::middleware('auth')->group(function(){
    Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

    Route::prefix('/customer')->group(function(){
        Route::get('/dashboard',[\App\Http\Controllers\Frontend\CustomerController::class, 'index'])->name('customer.dashboard');
        Route::get('/profile',[\App\Http\Controllers\Frontend\CustomerController::class, 'profile'])->name('customer.profile');
        Route::post('/profile',[\App\Http\Controllers\Frontend\CustomerController::class, 'update']);

        Route::get('/orders',[\App\Http\Controllers\Frontend\CustomerController::class, 'orders'])->name('customer.orders');
        Route::get('/orders/{id}',[\App\Http\Controllers\Frontend\OrderController::class, 'orderView'])->name('customer.order.view');
    });
    Route::get('/checkout',[\App\Http\Controllers\Frontend\CartController::class, 'checkout'])->name('checkout');
    Route::post('/checkout',[\App\Http\Controllers\Frontend\CartController::class, 'order']);

    Route::middleware('isAdmin')->group(function(){
        Route::prefix('/admin')->group(function(){

            Route::get('/', [\App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('admin.dashboard');

            /* **************  Category route ********************* */

            Route::prefix('/category')->group(function(){
                Route::get('/', [\App\Http\Controllers\Backend\CategoryController::class, 'index'])->name('admin.category');
                Route::get('/add', [\App\Http\Controllers\Backend\CategoryController::class, 'create'])->name('admin.add.category');
                Route::post('/add', [\App\Http\Controllers\Backend\CategoryController::class, 'store']);
                Route::get('/edit/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'edit'])->name('admin.edit.category');
                Route::post('/edit/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'update']);

                Route::get('/delete/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'delete'])->name('admin.delete.category');
            });

            /* **************  brand route ********************* */

            Route::prefix('/brand')->group(function(){
                Route::get('/', [\App\Http\Controllers\Backend\BrandController::class, 'index'])->name('admin.brand');
                Route::get('/add', [\App\Http\Controllers\Backend\BrandController::class, 'create'])->name('admin.add.brand');
                Route::post('/add', [\App\Http\Controllers\Backend\BrandController::class, 'store']);
                Route::get('/edit/{id}', [\App\Http\Controllers\Backend\BrandController::class, 'edit'])->name('admin.edit.brand');
                Route::post('/edit/{id}', [\App\Http\Controllers\Backend\BrandController::class, 'update']);

                Route::get('/delete/{id}', [\App\Http\Controllers\Backend\BrandController::class, 'delete'])->name('admin.delete.brand');
            });

            /* **************  Product route ********************* */

            Route::prefix('/product')->group(function(){
                Route::get('/', [\App\Http\Controllers\Backend\ProductController::class, 'index'])->name('admin.product');
                Route::get('/add', [\App\Http\Controllers\Backend\ProductController::class, 'create'])->name('admin.add.product');
                Route::post('/add', [\App\Http\Controllers\Backend\ProductController::class, 'store']);
                Route::get('/edit/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'edit'])->name('admin.edit.product');
                Route::post('/edit/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'update']);

                Route::get('/delete/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'delete'])->name('admin.delete.product');
            });

            /* ****************** Order route ***************/
            Route::prefix('orders')->group(function (){
                Route::get('/',[\App\Http\Controllers\Backend\OrderController::class, 'index'])->name('admin.orders');
                Route::post('/',[\App\Http\Controllers\Backend\OrderController::class, 'orderStatus']);
                Route::get('/{id}',[\App\Http\Controllers\Backend\OrderController::class, 'orderView'])->name('admin.view.order');
                Route::get('/delete/{id}',[\App\Http\Controllers\Backend\OrderController::class, 'orderDelete'])->name('admin.delete.order');
            });

        });
    });



});
