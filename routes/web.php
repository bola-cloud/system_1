<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShopComponent;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;



Route::get('/', function () {
    return view('auth.login');
});
Route::resource('users',UsersController::class);
Route::resource('products', ProductsController::class);
Route::resource('cart',CartController::class);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/shop',\App\Http\Livewire\ShopComponent::class)->name('product.shop');
Route::get('/checkout',\App\Http\Livewire\CheckoutComponent::class)->name('checkout');