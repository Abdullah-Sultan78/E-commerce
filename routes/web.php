<?php

use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommerceController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UnitController;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Route;

Route::get('/',[CommerceController::class,'index'])->name('home');
Route::get('/product-category/{id}',[CommerceController::class,'category'] )->name('product-category');
Route::get('/product-datails/{id}',[CommerceController::class,'details'] )->name('product-details');
Route::get('/ajax-search-product',[CommerceController::class,'ajaxSearch'] )->name('ajax-search-product');
Route::post('/add-to-cart/{id}',[CartController::class,'index'] )->name('add-to-cart');
Route::get('/show-cart',[CartController::class,'show'] )->name('show-cart');
Route::post('/update-cart-product/{id}',[CartController::class,'update'] )->name('update-cart-product');
Route::get('/remove-cart-product/{id}',[CartController::class,'remove'] )->name('remove-cart-product');
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::get('/customer-email-check',[CheckoutController::class,'checkCustomerEmail'])->name('customer-email-check');
Route::post('/new-cash-order',[CheckoutController::class,'newCashOrder'])->name('new-cash-order');
Route::get('/complete-order',[CheckoutController::class,'completeOrder'])->name('complete-order');

//user or customer
Route::get('/customer-login',[CustomerAuthController::class,'index'])->name('customer.login');
Route::post('/customer-login',[CustomerAuthController::class,'login'])->name('customer.login');
Route::post('/customer-register',[CustomerAuthController::class,'register'])->name('customer.register');
Route::get('/customer-logout',[CustomerAuthController::class,'logout'])->name('customer.logout');

// Route::middleware(['customer'])->group(function () {
//     Route::get('/customer-dashboard',[CustomerAuthController::class,'dashboard'])->name('customer.dashboard');
//     Route::get('/customer.profile',[CustomerAuthController::class,'profile'])->name('customer.profile');
// });
Route::get('/customer.dashboard',[CustomerAuthController::class,'dashboard'])->name('customer.dashboard');
Route::get('/customer.profile',[CustomerAuthController::class,'profile'])->name('customer.profile');
Route::get('/customer.order',[CustomerOrderController::class,'allOrder'])->name('customer.order');

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);
Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);
Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END



Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::get('/category/add',[CategoryController::class,'index'])->name('category.add');
Route::post('/category/new',[CategoryController::class,'create'])->name('category.new');
Route::get('/category/manage',[CategoryController::class,'manage'])->name('category.manage');
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

// SubCategory section
Route::get('/sub-category/add',[SubCategoryController::class,'index'])->name('sub-category.add');
Route::post('/sub-category/new',[SubCategoryController::class,'create'])->name('sub-category.new');
Route::get('/sub-category/manage',[SubCategoryController::class,'manage'])->name('sub-category.manage');
Route::get('/sub-category/edit/{id}',[SubCategoryController::class,'edit'])->name('sub-category.edit');
Route::post('/sub-category/update/{id}',[SubCategoryController::class,'update'])->name('sub-category.update');
Route::get('/sub-category/delete/{id}',[SubCategoryController::class,'delete'])->name('sub-category.delete');

// Brand section
Route::get('/brand/add',[BrandController::class,'index'])->name('brand.add');
Route::post('/brand/new',[BrandController::class,'create'])->name('brand.new');
Route::get('/brand/manage',[BrandController::class,'manage'])->name('brand.manage');
Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
Route::post('/brand/update/{id}',[BrandController::class,'update'])->name('brand.update');
Route::get('/brand/delete/{id}',[BrandController::class,'delete'])->name('brand.delete');

// Unit section
Route::get('/unit/add',[UnitController::class,'index'])->name('unit.add');
Route::post('/unit/new',[UnitController::class,'create'])->name('unit.new');
Route::get('/unit/manage',[UnitController::class,'manage'])->name('unit.manage');
Route::get('/unit/edit/{id}',[UnitController::class,'edit'])->name('unit.edit');
Route::post('/unit/update/{id}',[UnitController::class,'update'])->name('unit.update');
Route::get('/unit/delete/{id}',[UnitController::class,'delete'])->name('unit.delete');

// product section
Route::get('/product/add',[ProductController::class,'index'])->name('product.add');
Route::get('/product/get-subcategory-by-category',[ProductController::class,'getSubCategoryByCategory'])->name('product.get-subcategory-by-category');
Route::post('/product/new',[ProductController::class,'create'])->name('product.new');
Route::get('/product/manage',[ProductController::class,'manage'])->name('product.manage');
Route::get('/product/details/{id}',[ProductController::class,'details'])->name('product.details');
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');

//order section admin
Route::get('/admin/all-order',[AdminOrderController::class,'index'])->name('admin.all-order');
Route::get('/admin/order-detail/{id}',[AdminOrderController::class,'detail'])->name('admin.order-detail');
Route::get('/admin/order-edit/{id}',[AdminOrderController::class,'edit'])->name('admin.order-edit');
Route::post('/admin/update-order/{id}',[AdminOrderController::class,'update'])->name('admin.update-order');
Route::get('/admin/order-invoice/{id}',[AdminOrderController::class,'showInvoice'])->name('admin.order-invoice');
Route::get('/admin/print-invoice/{id}',[AdminOrderController::class,'printInvoice'])->name('admin.print-invoice');
Route::get('/admin/order-delete/{id}',[AdminOrderController::class,'delete'])->name('admin.order-delete');

});
