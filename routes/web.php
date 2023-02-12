<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\admin\AdminCategoryComponent;
use App\Http\Livewire\admin\AdminDashboardComponent;
use App\Http\Livewire\admin\CreateCouponsComponent;
use App\Http\Livewire\admin\CouponsComponent;
use App\Http\Livewire\admin\EditCouponsComponent;
use App\Http\Livewire\admin\UserComponent;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\ProductComponent;
use App\Http\Livewire\admin\CreateCategoryComponent;
use App\Http\Livewire\admin\OrderIndexComponent;
use App\Http\Livewire\admin\OrderDetailsComponent;
use App\Http\Livewire\admin\DeleteCoupon;
use App\Http\Livewire\admin\EditOrder;



Route::get('/', function () {
    return view('auth.login');
});
Route::resource('users',UsersController::class);
Route::get('/products', ProductComponent::class)->name('products');
Route::resource('cart',CartController::class);
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home',HomeController::class);

// casher
Route::get('/shop',ShopComponent::class)->name('product.shop');
Route::get('/checkout',CheckoutComponent::class)->name('checkout');

// admin
Route::get('/admin_dashboard',AdminDashboardComponent::class)->name('admin_dashboard');
Route::get('/admin_category',AdminCategoryComponent::class)->name('admin_category');
Route::get('/admin_user',UserComponent::class)->name('admin_user');
Route::get('/show_coupon',CouponsComponent::class)->name('show_coupon');
Route::get('/create_coupon',CreateCouponsComponent::class)->name('create_coupon');
Route::get('/edit_coupon/{coupon_id}',EditCouponsComponent::class)->name('edit_coupon');
Route::get('/create_categ',CreateCategoryComponent::class)->name('create_categ');
Route::get('/admin_orders',OrderIndexComponent::class)->name('admin_orders');
Route::get('/admin_orderdetails/{id}',OrderDetailsComponent::class)->name('admin_orderdetails');
Route::get('/delete_coupon/{coupon_id}',DeleteCoupon::class)->name('delete_coupon');
Route::get('/admin_edit_order/{order_id}',EditOrder::class)->name('admin_edit_order');



