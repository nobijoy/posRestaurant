<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/setting', [App\Http\Controllers\HomeController::class, 'setting'])->name('setting');
Route::get('/category', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
Route::get('/sub_category', [App\Http\Controllers\HomeController::class, 'subCategory'])->name('sub_category');
Route::get('/menu', [App\Http\Controllers\HomeController::class, 'menu'])->name('menu');
Route::get('/menu_add', [App\Http\Controllers\HomeController::class, 'menuAdd'])->name('menu_add');
Route::get('/menu_edit', [App\Http\Controllers\HomeController::class, 'menuEdit'])->name('menu_edit');
Route::get('/user', [App\Http\Controllers\HomeController::class, 'user'])->name('user');
Route::get('/user_search', [App\Http\Controllers\HomeController::class, 'userSearch'])->name('user_search');
Route::get('/user_attendence', [App\Http\Controllers\HomeController::class, 'userAttendence'])->name('user_attendence');
Route::get('/add_member', [App\Http\Controllers\HomeController::class, 'addMember'])->name('add_member');
Route::get('/member_point', [App\Http\Controllers\HomeController::class, 'memberPoint'])->name('member_point');
Route::get('/employees', [App\Http\Controllers\HomeController::class, 'employees'])->name('employees');
Route::get('/employyee_payment', [App\Http\Controllers\HomeController::class, 'employeePayment'])->name('employyee_payment');
Route::get('/employyee_loan', [App\Http\Controllers\HomeController::class, 'employeeLoan'])->name('employyee_loan');
//Route::get('/supplier_info', [App\Http\Controllers\HomeController::class, 'supplierInfo'])->name('supplier_info');
//Route::get('/supplier_payment', [App\Http\Controllers\HomeController::class, 'supplierPayment'])->name('supplier_payment');
Route::get('/product_list', [App\Http\Controllers\HomeController::class, 'productList'])->name('product_list');
Route::get('/product_type', [App\Http\Controllers\HomeController::class, 'productType'])->name('product_type');
Route::get('/cash_in', [App\Http\Controllers\HomeController::class, 'cashIn'])->name('cash_in');
Route::get('/cash_out', [App\Http\Controllers\HomeController::class, 'cashOut'])->name('cash_out');
Route::get('/expendiser', [App\Http\Controllers\HomeController::class, 'expendiser'])->name('expendiser');
Route::get('/balance', [App\Http\Controllers\HomeController::class, 'balance'])->name('balance');
Route::get('/inventory_info', [App\Http\Controllers\HomeController::class, 'inventoryInfo'])->name('inventory_info');
Route::get('/inventory_damage', [App\Http\Controllers\HomeController::class, 'inventoryDamage'])->name('inventory_damage');
Route::get('/inventory_barcode', [App\Http\Controllers\HomeController::class, 'inventoryBarcode'])->name('inventory_barcode');
Route::get('/discount', [App\Http\Controllers\HomeController::class, 'discount'])->name('discount');
Route::get('/product_purchase', [App\Http\Controllers\HomeController::class, 'productPurchase'])->name('product_purchase');
Route::get('/product_summary', [App\Http\Controllers\HomeController::class, 'productSummary'])->name('product_summary');
Route::get('/return_product', [App\Http\Controllers\HomeController::class, 'returnProduct'])->name('return_product');
Route::get('/return_summary', [App\Http\Controllers\HomeController::class, 'returnSummary'])->name('return_summary');
Route::get('/invoice_details', [App\Http\Controllers\HomeController::class, 'invoiceDetails'])->name('invoice_details');
Route::get('/invoice_search', [App\Http\Controllers\HomeController::class, 'invoiceSearch'])->name('invoice_search');
Route::get('/return_invoice', [App\Http\Controllers\HomeController::class, 'returnInvoice'])->name('return_invoice');
Route::get('/return_search', [App\Http\Controllers\HomeController::class, 'returnSearch'])->name('return_search');
Route::get('/invoice_due', [App\Http\Controllers\HomeController::class, 'invoiceDue'])->name('invoice_due');
Route::get('/ingredient_category', [App\Http\Controllers\HomeController::class, 'ingredientCategory'])->name('ingredient_category');
Route::get('/ingredient_units', [App\Http\Controllers\HomeController::class, 'ingredientUnits'])->name('ingredient_units');
Route::get('/ingredients', [App\Http\Controllers\HomeController::class, 'ingredients'])->name('ingredients');
Route::get('/item_add', [App\Http\Controllers\HomeController::class, 'itemAdd'])->name('item_add');
Route::get('/item_section', [App\Http\Controllers\HomeController::class, 'itemSection'])->name('item_section');
Route::get('/modifiers', [App\Http\Controllers\HomeController::class, 'modifiers'])->name('modifiers');
Route::get('/modifiers/add', [App\Http\Controllers\HomeController::class, 'modifiersAdd'])->name('modifiers.add');
Route::get('/modifiers/edit', [App\Http\Controllers\HomeController::class, 'modifiersEdit'])->name('modifiers.edit');

Route::get('/purchase', [App\Http\Controllers\HomeController::class, 'purchase'])->name('purchase.index');
Route::get('/purchase/add', [App\Http\Controllers\HomeController::class, 'purchaseAdd'])->name('purchase.add');
Route::get('/purchase/edit', [App\Http\Controllers\HomeController::class, 'purchaseEdit'])->name('purchase.edit');

Route::get('/stock_adjustment', [App\Http\Controllers\HomeController::class, 'stockAdjustment'])->name('stock_adjustment.index');
Route::get('/stock_adjustment/add', [App\Http\Controllers\HomeController::class, 'stockAdjustmentAdd'])->name('stock_adjustment.add');
Route::get('/stock_adjustment/edit', [App\Http\Controllers\HomeController::class, 'stockAdjustmentEdit'])->name('stock_adjustment.edit');

Route::get('/waste', [App\Http\Controllers\HomeController::class, 'waste'])->name('waste.index');
Route::get('/waste/add', [App\Http\Controllers\HomeController::class, 'wasteAdd'])->name('waste.add');
Route::get('/waste/edit', [App\Http\Controllers\HomeController::class, 'wasteEdit'])->name('waste.edit');

Route::match(['get', 'post'], 'profile/{name}', 'App\Http\Controllers\AdminController@profileUpdate')->name('profileUpdate');
Route::match(['get', 'post'], 'change-password/{name}', 'App\Http\Controllers\AdminController@passwordUpdate')->name('changePassword');
Route::match(['get', 'post'], 'managepos', 'App\Http\Controllers\POSController@posUpdate')->name('managePOS');
Route::match(['get', 'post'], 'managemail', 'App\Http\Controllers\POSController@manageMail')->name('manageMail');


Route::delete('menuCategory/{id}', 'App\Http\Controllers\MenuCategoryController@delete')->name('menuCategory.delete');
Route::put('menuCategory/{id}', 'App\Http\Controllers\MenuCategoryController@restore')->name('menuCategory.restore');
Route::resource('menuCategory', 'App\Http\Controllers\MenuCategoryController')->parameters('menuCategory', 'id');
Route::post('menuCategory/update', 'App\Http\Controllers\MenuCategoryController@update')->name('menuCategory.update');

//Route::delete('menuSubCategory/{id}', 'App\Http\Controllers\MenuSubCategoryController@delete')->name('menuSubCategory.delete');
//Route::put('menuSubCategory/{id}', 'App\Http\Controllers\MenuSubCategoryController@restore')->name('menuSubCategory.restore');
//Route::resource('menuSubCategory', 'App\Http\Controllers\MenuSubCategoryController')->parameters('menuSubCategory', 'id');
//Route::post('menuSubCategory/update', 'App\Http\Controllers\MenuSubCategoryController@update')->name('menuSubCategory.update');

Route::delete('menu/{id}', 'App\Http\Controllers\MenuController@delete')->name('menu.delete');
Route::put('menu/{id}', 'App\Http\Controllers\MenuController@restore')->name('menu.restore');
Route::resource('menu', 'App\Http\Controllers\MenuController')->parameters('menu', 'id');
Route::get('menu/{id}/{menu}', 'App\Http\Controllers\MenuController@edit')->name('menu.edit');
Route::post('menu/{id}/update', 'App\Http\Controllers\MenuController@update')->name('menu.update');

Route::get('getSubCatAgainstCat', 'App\Http\Controllers\CommonController@getSubCatAgainstCat')->name('getSubCatAgainstCat');


Route::delete('ingredient_category/{id}', 'App\Http\Controllers\IngredientCategoryController@delete')->name('ingredient_category.delete');
Route::put('ingredient_category/{id}', 'App\Http\Controllers\IngredientCategoryController@restore')->name('ingredient_category.restore');
Route::resource('ingredient_category', 'App\Http\Controllers\IngredientCategoryController')->parameters('ingredient_category', 'id');
Route::post('ingredient_category/update', 'App\Http\Controllers\IngredientCategoryController@update')->name('ingredient_category.update');

Route::delete('ingredientUnit/{id}', 'App\Http\Controllers\IngredientUnitController@delete')->name('ingredientUnit.delete');
Route::put('ingredientUnit/{id}', 'App\Http\Controllers\IngredientUnitController@restore')->name('ingredientUnit.restore');
Route::resource('ingredientUnit', 'App\Http\Controllers\IngredientUnitController')->parameters('ingredientUnit', 'id');
Route::post('ingredientUnit/update', 'App\Http\Controllers\IngredientUnitController@update')->name('ingredientUnit.update');

Route::delete('ingredient/{id}', 'App\Http\Controllers\IngredientController@delete')->name('ingredient.delete');
Route::put('ingredient/{id}', 'App\Http\Controllers\IngredientController@restore')->name('ingredient.restore');
Route::resource('ingredient', 'App\Http\Controllers\IngredientController')->parameters('ingredient', 'id');
Route::post('ingredient/update', 'App\Http\Controllers\IngredientController@update')->name('ingredient.update');

Route::delete('supplier/{id}', 'App\Http\Controllers\SupplierController@delete')->name('supplier.delete');
Route::put('supplier/{id}', 'App\Http\Controllers\SupplierController@restore')->name('supplier.restore');
Route::resource('supplier', 'App\Http\Controllers\SupplierController')->parameters('supplier', 'id');
Route::post('supplier/update', 'App\Http\Controllers\SupplierController@update')->name('supplier.update');

Route::delete('supplier_payment/{id}', 'App\Http\Controllers\SupplierPaymentController@delete')->name('supplier_payment.delete');
Route::put('supplier_payment/{id}', 'App\Http\Controllers\SupplierPaymentController@restore')->name('supplier_payment.restore');
Route::resource('supplier_payment', 'App\Http\Controllers\SupplierPaymentController')->parameters('supplier_payment', 'id');
Route::post('supplier_payment/update', 'App\Http\Controllers\SupplierPaymentController@update')->name('supplier_payment.update');

Route::delete('customer/{id}', 'App\Http\Controllers\CustomerController@delete')->name('customer.delete');
Route::put('customer/{id}', 'App\Http\Controllers\CustomerController@restore')->name('customer.restore');
Route::resource('customer', 'App\Http\Controllers\CustomerController')->parameters('customer', 'id');
Route::post('customer/update', 'App\Http\Controllers\CustomerController@update')->name('customer.update');

Route::delete('expense_item/{id}', 'App\Http\Controllers\ExpenseItemController@delete')->name('expense_item.delete');
Route::put('expense_item/{id}', 'App\Http\Controllers\ExpenseItemController@restore')->name('expense_item.restore');
Route::resource('expense_item', 'App\Http\Controllers\ExpenseItemController')->parameters('expense_item', 'id');
Route::post('expense_item/update', 'App\Http\Controllers\ExpenseItemController@update')->name('expense_item.update');
