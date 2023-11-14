<?php

use Illuminate\Support\Facades\Route;

//admin
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\admin\AdminCategoryComponent;
use App\Http\Livewire\admin\AdminDashboardComponent;
use App\Http\Livewire\admin\CreateCouponsComponent;
use App\Http\Livewire\admin\CouponsComponent;
use App\Http\Livewire\admin\EditCouponsComponent;
use App\Http\Livewire\admin\CreateCategoryComponent;
use App\Http\Livewire\admin\OrderIndexComponent;
use App\Http\Livewire\admin\OrderDetailsComponent;
use App\Http\Livewire\admin\DeleteCoupon;
use App\Http\Livewire\admin\EditOrder;
use App\Http\Livewire\admin\UserComponent;
use App\Http\Livewire\admin\Admins;
use App\Http\Livewire\admin\CreateUser;
use App\Http\Livewire\admin\UserProfile;
use App\Http\Livewire\admin\EditProducts;


//casher
use App\Http\Livewire\AddProduct;
use App\Http\Livewire\ProductComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CheckoutComponent;




Route::get('/', function () {
    return view('auth.login');
});
// Route::resource('users',UsersController::class);
// Route::resource('cart',CartController::class);
Auth::routes();

// casher
Route::get('/products', ProductComponent::class)->name('products');
Route::get('/shop',ShopComponent::class)->name('product.shop');
Route::get('/checkout',CheckoutComponent::class)->name('checkout');
Route::get('/Add_product',AddProduct::class)->name('Add_product');

Route::middleware(['auth','isAdmin'])->group(function(){
    // admin
    Route::get('/admin_dashboard',AdminDashboardComponent::class)->name('admin_dashboard');
    Route::get('/admin_category',AdminCategoryComponent::class)->name('admin_category');
    Route::get('/admin_user',UserComponent::class)->name('admin_user');
    Route::get('/admin_index',Admins::class)->name('admin_index');
    Route::get('/show_coupon',CouponsComponent::class)->name('show_coupon');
    Route::get('/create_coupon',CreateCouponsComponent::class)->name('create_coupon');
    Route::get('/edit_coupon/{coupon_id}',EditCouponsComponent::class)->name('edit_coupon');
    Route::get('/create_categ',CreateCategoryComponent::class)->name('create_categ');
    Route::get('/admin_orders',OrderIndexComponent::class)->name('admin_orders');
    Route::get('/admin_orderdetails/{id}',OrderDetailsComponent::class)->name('admin_orderdetails');
    Route::get('/delete_coupon/{coupon_id}',DeleteCoupon::class)->name('delete_coupon');
    Route::get('/admin_edit_order/{order_id}',EditOrder::class)->name('admin_edit_order');
    Route::get('/Create_user',EditOrder::class)->name('Create_user');
    Route::get('/User_profile/{user_id}',UserProfile::class)->name('User_profile');
    Route::get('/edit_prod/{prod_id}',EditProducts::class)->name('edit_prod');
});




