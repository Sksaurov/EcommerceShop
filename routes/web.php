<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/',[HomeController::class,'mainHome']);
Route::get('/dashboard',[HomeController::class,'login_Home'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard',[HomeController::class,'adminHome'])->
middleware(['auth','admin']);
Route::controller(HomeController::class)->group(function(){

    Route::get('stripe/{value}', 'stripe');

    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');

});



Route::get('admin/view_category',[AdminController::class,'view_category'])->
middleware(['auth','admin']);
Route::post('admin/add_category',[AdminController::class,'add_category'])->
middleware(['auth','admin']);

Route::get('admin/delete_category/{id}',[AdminController::class,'delete_category'])->
middleware(['auth','admin']);

Route::get('admin/edit_category/{id}',[AdminController::class,'edit_category'])->
middleware(['auth','admin']);
Route::post('admin/update_category/{id}',[AdminController::class,'update_category'])->
middleware(['auth','admin']);
Route::get('admin/add_product',[AdminController::class,'upload_product'])->
middleware(['auth','admin']);
Route::post('admin/upload_product',[AdminController::class,'add_product'])->
middleware(['auth','admin']);
Route::get('admin/view_product',[AdminController::class,'view_product'])->
middleware(['auth','admin']);

Route::get('admin/product_delete/{id}',[AdminController::class,'delete_product'])->
middleware(['auth','admin']);
Route::get('admin/product_update/{id}',[AdminController::class,'update_product'])->
middleware(['auth','admin']);
Route::post('admin/editing_product/{id}',[AdminController::class,'edit_product'])->
middleware(['auth','admin']);
Route::get('admin/search_product',[AdminController::class,'search_product'])->
middleware(['auth','admin']);

Route::get('product_details/{id}',[HomeController::class,'product_details']);
Route::get('add_cart/{id}',[HomeController::class,'add_cart'])->middleware(['auth', 'verified']);
Route::get('mycart',[HomeController::class,'mycart'])->middleware(['auth', 'verified']);
Route::get('cart_delete/{id}',[HomeController::class,'cart_delete'])->middleware(['auth', 'verified']);
Route::post('confirm_order',[HomeController::class,'confirm_order'])->middleware(['auth', 'verified']);



Route::get('admin/view_orders',[AdminController::class,'view_orders'])->
middleware(['auth','admin']);

Route::get('admin/delivered/{id}',[AdminController::class,'delivered'])->
middleware(['auth','admin']);
Route::get('pdf/{id}',[AdminController::class,'pdf'])->
middleware(['auth','admin']);
Route::get('myorders',[HomeController::class,'myorder'])->middleware(['auth', 'verified']);

