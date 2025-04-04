<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SkuController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\freeIssueController;
use App\Http\Controllers\DiscountController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//Admin
Route::get('/admin/all', [TestController::class,'add_zone'])->name('zone.create');
Route::post('admin/all',[TestController::class,'zone_store'])->name('zone.store');
Route::get('admin/zones_index', [TestController::class, 'zone_index'])->name('zone.index');

// Admin-Region
Route::get('/admin/region', [TestController::class, 'Region_add'])->name('region.create');
Route::post('admin/region',[TestController::class,'region_store'])->name('region.store');
Route::get('admin/region_index', [TestController::class, 'region_index'])->name('region.index');

// Admin-territory
Route::get('/admin/territory', [TestController::class, 'territory_create'])->name('territory.create');
Route::post('/admin/territory', [TestController::class, 'territory_store'])->name('territory.store');
Route::get('admin/territories_index', [TestController::class, 'territory_index'])->name('territory.index');

//user
Route::get('/user/add_user', [UserController::class, 'user_create'])->name('users.create');
Route::post('/user/add_ser', [UserController::class, 'user_store'])->name('users.store');
Route::get('/user/index', [UserController::class, 'index'])->name('users.index');


//product
Route::get('/sku/product_add', [SkuController::class, 'product_create'])->name('sku.product_create');
Route::post('/sku/product_store', [SkuController::class, 'Product_store'])->name('sku.product_store');
Route::get('/sku/index', [SkuController::class, 'index'])->name('sku.index');


// order
Route::get('/purchase_order/create', [PurchaseOrderController::class, 'po_create'])->name('purchase_order.create');
Route::post('/purchase_order/store', [PurchaseOrderController::class, 'po_store'])->name('purchase_order.store');
Route::get('/purchase_order/index', [PurchaseOrderController::class, 'po_index'])->name('purchase_order.index');


Route::post('/load/region', [PurchaseOrderController::class, 'load_region']);
Route::post('/load/territory', [PurchaseOrderController::class, 'load_territory']);
Route::post('/load/distributor', [PurchaseOrderController::class, 'load_distributor']);
Route::post('/load/units_cal', [PurchaseOrderController::class, 'units_cal']);
Route::post('/load/po_number', [PurchaseOrderController::class, 'po_number']);
Route::post('/table_data', [PurchaseOrderController::class, 'table_data']);
Route::post('/bulk_conversion', [PurchaseOrderController::class, 'bulk_conversion']);
Route::post('/load/applyfreeissue', [PurchaseOrderController::class, 'applyfreeissue']);
Route::post('/load/product_discount', [PurchaseOrderController::class, 'product_discount']);


//free_issue
Route::get('/freeIssue', [freeIssueController::class, 'create'])->name('freeIssue.create');
Route::post('/freeIssue', [freeIssueController::class, 'store'])->name('freeIssue.store');
Route::get('/view_freeIssue', [freeIssueController::class, 'index'])->name('freeIssue.index');

//discount
Route::get('/add_discount', [DiscountController::class, 'create'])->name('discount.create');
Route::post('/discount', [DiscountController::class, 'store'])->name('discount.store');
Route::get('/view_discount', [DiscountController::class, 'index'])->name('discount.index');
Route::post('/load/product_discount', [DiscountController::class, 'getProductDiscount'])->name('product.discount');


Route::get('/zone', function () {
    return view('navigating_zone');
})->name('zone');

Route::get('/region', function () {
    return view('navigating_region');
})->name('region');

Route::get('/territory', function () {
    return view('navigating_territory');
})->name('territory');

Route::get('/users', function () {
    return view('naavigating_user');
})->name('users');

Route::get('/product', function () {
    return view('navigating_sku');
})->name('product');

Route::get('/discount', function () {
    return view('navigating_discount');
})->name('discount');

Route::get('/issue', function () {
    return view('navigating_freeIssue');
})->name('freeIssue');



