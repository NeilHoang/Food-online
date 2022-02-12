<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeliveryBoyController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

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

Route::get('/', function () {
    return view('frontend.include.home');
});

Route::get('home', [HomeController::class, 'home'])->name('home');
//Frontend
Route::prefix('food-online')->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('food.index');
    Route::get('/category/dish/show/{category_id}', [FrontendController::class, 'dish_show'])->name('category_dish');

//ShoppingCart
    Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.addDishToCart');
    Route::get('/remove-to-cart/{id}', [CartController::class, 'removeDishIntoCart'])->name('remove-item');
    Route::post('/update-to-cart/{id}', [CartController::class, 'updateDIshIntoCart'])->name('cart.UpdateDishInToCart');
    Route::get('/cart-show', [CartController::class, 'index'])->name('cart.index');

//CheckoutCart
    Route::get('/checkout-payment', [CheckoutController::class, 'payment'])->name('checkout-payment');
    Route::get('/stripe-payment', [CheckoutController::class, 'stripe'])->name('stripe-payment');
    Route::post('/stripe-payment', [CheckoutController::class, 'stripe_pay'])->name('stripe.payment');
    Route::post('/checkout/new-order', [CheckoutController::class, 'order'])->name('new-order');
    Route::get('/checkout/order/complete', [CheckoutController::class, 'complete'])->name('order-complete');

//Customer
    Route::get('/login-form', [CustomerController::class, 'formLogin'])->name('form-login');
    Route::get('/register-customer', [CustomerController::class, 'register'])->name('customer-register');
    Route::post('/login-customer', [CustomerController::class, 'login'])->name('customer-login');
    Route::post('/logout-customer', [CustomerController::class, 'logout'])->name('customer-logout');
    Route::post('/store-customer', [CustomerController::class, 'store'])->name('customer-store');

    Route::get('/shipping', [CustomerController::class, 'shipping'])->name('shipping');
    Route::post('/store/shipping', [CustomerController::class, 'save'])->name('store-shipping');
});

//Login
Route::prefix('admin')->group(function () {
    Route::get('/form-login', [AdminController::class, 'formLogin'])->name('admin.form');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});
//Category
Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/add-category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('{id}/edit-category', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('{id}/destroy-category', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('{id}/update-category', [CategoryController::class, 'update'])->name('category.update');
    Route::get('{id}/active', [CategoryController::class, 'active'])->name('category.active');
    Route::get('{id}/in-active', [CategoryController::class, 'in_active'])->name('category.inactive');

});
//Delivery
Route::prefix('delivery')->group(function () {
    Route::get('/', [DeliveryBoyController::class, 'index'])->name('delivery.index');
    Route::get('/add-delivery', [DeliveryBoyController::class, 'create'])->name('delivery.create');
    Route::post('/store', [DeliveryBoyController::class, 'store'])->name('delivery.store');
    Route::get('/{id}/destroy', [DeliveryBoyController::class, 'destroy'])->name('delivery.destroy');
    Route::get('/{id}/edit', [DeliveryBoyController::class, 'edit'])->name('delivery.edit');
    Route::post('/{id}/update', [DeliveryBoyController::class, 'update'])->name('delivery.update');
    Route::get('{id}/active', [DeliveryBoyController::class, 'active'])->name('delivery.active');
    Route::get('{id}/in-active', [DeliveryBoyController::class, 'in_active'])->name('delivery.inactive');
});
//Coupon
Route::prefix('coupon')->group(function () {
    Route::get('/', [CouponController::class, 'index'])->name('coupon.index');
    Route::get('/add-coupon', [CouponController::class, 'create'])->name('coupon.create');
    Route::post('/store', [CouponController::class, 'store'])->name('coupon.store');
    Route::get('/{id}/destroy', [CouponController::class, 'destroy'])->name('coupon.destroy');
    Route::get('/{id}/edit', [CouponController::class, 'edit'])->name('coupon.edit');
    Route::post('/{id}/update', [CouponController::class, 'update'])->name('coupon.update');
    Route::get('{id}/active', [CouponController::class, 'active'])->name('coupon.active');
    Route::get('{id}/in-active', [CouponController::class, 'in_active'])->name('coupon.inactive');
});
//Dish
Route::prefix('dish')->group(function () {
    Route::get('/', [DishController::class, 'index'])->name('dish.index');
    Route::get('/add-dish', [DishController::class, 'create'])->name('dish.create');
    Route::post('/store', [DishController::class, 'store'])->name('dish.store');
    Route::get('/{id}/destroy', [DishController::class, 'destroy'])->name('dish.destroy');
    Route::get('/{id}/edit', [DishController::class, 'edit'])->name('dish.edit');
    Route::post('/{id}/update', [DishController::class, 'update'])->name('dish.update');
    Route::get('{id}/active', [DishController::class, 'active'])->name('dish.active');
    Route::get('{id}/in-active', [DishController::class, 'in_active'])->name('dish.inactive');

});
//Order
Route::prefix('order')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('order.index');
    Route::get('/view-order/{id}', [OrderController::class, 'view'])->name('order.view');
    Route::get('/view-order-invoiced/{id}', [OrderController::class, 'viewInvoiced'])->name('order.viewInvoiced');
    Route::get('/download-invoiced/{id}', [OrderController::class, 'downloadInvoiced'])->name('order.downloadInvoiced');
    Route::get('/remove-order/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
});

