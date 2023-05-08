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

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/loadMenuByCategory/{id}', [App\Http\Controllers\POSController::class, 'loadMenuByCategory'])->name('loadMenuByCategory');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');


    Route::get('/kitchenDashboard', [App\Http\Controllers\KitchenDashboardController::class, 'dashboard'])->name('kitchenDashboard');
    Route::get('/kitchenStock', [App\Http\Controllers\KitchenStockController::class, 'kitchenStock'])->name('kitchenStock');

    Route::get('/sale','App\Http\Controllers\SaleController@sale')->name('sale');


    Route::get('/stock', [App\Http\Controllers\StockController::class, 'index'])->name('stock.index');
    Route::get('/stock_adjustment', [App\Http\Controllers\StockController::class, 'stock'])->name('stock_adjustment');
    Route::post('/stock_adjustment/add', [App\Http\Controllers\StockController::class, 'stockAdjustment'])->name('stock_adjustment.add');

//    Route::get('/stock_adjustment', [App\Http\Controllers\HomeController::class, 'stockAdjustment'])->name('stock_adjustment.index');
//    Route::get('/stock_adjustment/edit', [App\Http\Controllers\HomeController::class, 'stockAdjustmentEdit'])->name('stock_adjustment.edit');

    Route::get('/pos', [App\Http\Controllers\POSController::class, 'pos'])->name('pos');
    Route::post('/pos/order', [App\Http\Controllers\POSController::class, 'posOrder'])->name('posOrder');
    Route::get('/getMenuWithSearch', [App\Http\Controllers\POSController::class, 'getMenuWithSearch'])->name('getMenuWithSearch');
    Route::get('/searchOrder', [App\Http\Controllers\POSController::class, 'searchOrder'])->name('searchOrder');
    Route::get('/pos_invoice', [App\Http\Controllers\POSController::class, 'pos_invoice'])->name('pos_invoice');
    Route::match(['get', 'post'], 'profile/{name}', 'App\Http\Controllers\AdminController@profileUpdate')->name('profileUpdate');
    Route::match(['get', 'post'], 'change-password/{name}', 'App\Http\Controllers\AdminController@passwordUpdate')->name('changePassword');
    Route::match(['get', 'post'], 'managepos', 'App\Http\Controllers\POSController@posUpdate')->name('managePOS');
    Route::match(['get', 'post'], 'email-setup', 'App\Http\Controllers\POSController@emailSetup')->name('emailSetup');
    Route::match(['get', 'post'], 'thirdPartySetup', 'App\Http\Controllers\POSController@thirdPartySetup')->name('thirdPartySetup');
    Route::match(['get', 'post'], 'outlet_setting', 'App\Http\Controllers\OutletSettingController@setup')->name('outlet_setting');
    Route::match(['get', 'post'], 'setting', 'App\Http\Controllers\SettingController@manage')->name('setting');
    Route::match(['get', 'post'], 'printer_setup', 'App\Http\Controllers\SettingController@printer_setup')->name('printer_setup');

    Route::delete('menuCategory/{id}', 'App\Http\Controllers\MenuCategoryController@delete')->name('menuCategory.delete');
    Route::put('menuCategory/{id}', 'App\Http\Controllers\MenuCategoryController@restore')->name('menuCategory.restore');
    Route::resource('menuCategory', 'App\Http\Controllers\MenuCategoryController')->parameters('menuCategory', 'id');
    Route::post('menuCategory/update', 'App\Http\Controllers\MenuCategoryController@update')->name('menuCategory.update');

    Route::delete('delete-menu-ingredient/{id}', 'App\Http\Controllers\MenuController@deleteMenuIngredient')->name('deleteMenuIngredient');
    Route::delete('menu/{id}', 'App\Http\Controllers\MenuController@delete')->name('menu.delete');
    Route::put('menu/{id}', 'App\Http\Controllers\MenuController@restore')->name('menu.restore');
    Route::resource('menu', 'App\Http\Controllers\MenuController')->parameters('menu', 'id');
    Route::get('menu/{id}/{menu}', 'App\Http\Controllers\MenuController@edit')->name('menu.edit');
    Route::post('menu/{id}/update', 'App\Http\Controllers\MenuController@update')->name('menu.update');

    Route::get('getSubCatAgainstCat', 'App\Http\Controllers\CommonController@getSubCatAgainstCat')->name('getSubCatAgainstCat');
    Route::get('getDegAgainstDept', 'App\Http\Controllers\CommonController@getDegAgainstDept')->name('getDegAgainstDept');
    Route::get('getIngrerdientInfoById', 'App\Http\Controllers\CommonController@getIngrerdientInfoById')->name('getIngrerdientInfoById');
    Route::get('getReceiptBySupplier', 'App\Http\Controllers\CommonController@getReceiptBySupplier')->name('getReceiptBySupplier');
    Route::get('getDueFromReceipt', 'App\Http\Controllers\CommonController@getDueFromReceipt')->name('getDueFromReceipt');
    Route::get('generateReciept', 'App\Http\Controllers\PurchaseController@generateReciept')->name('generateReciept');

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

    Route::delete('employee/{id}', 'App\Http\Controllers\EmployeeController@delete')->name('employee.delete');
    Route::put('employee/{id}', 'App\Http\Controllers\EmployeeController@restore')->name('employee.restore');
    Route::resource('employee', 'App\Http\Controllers\EmployeeController')->parameters('employee', 'id');
    Route::post('employee/update', 'App\Http\Controllers\EmployeeController@update')->name('employee.update');

    Route::delete('department/{id}', 'App\Http\Controllers\DepartmentController@delete')->name('department.delete');
    Route::put('department/{id}', 'App\Http\Controllers\DepartmentController@restore')->name('department.restore');
    Route::resource('department', 'App\Http\Controllers\DepartmentController')->parameters('department', 'id');
    Route::post('department/update', 'App\Http\Controllers\DepartmentController@update')->name('department.update');

    Route::delete('designation/{id}', 'App\Http\Controllers\DesignationController@delete')->name('designation.delete');
    Route::put('designation/{id}', 'App\Http\Controllers\DesignationController@restore')->name('designation.restore');
    Route::resource('designation', 'App\Http\Controllers\DesignationController')->parameters('designation', 'id');
    Route::post('designation/update', 'App\Http\Controllers\DesignationController@update')->name('designation.update');

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
    Route::post('customer/ajaxStore', 'App\Http\Controllers\CustomerController@ajaxStore')->name('customer.ajaxStore');

    Route::delete('expense/{id}', 'App\Http\Controllers\ExpenseController@delete')->name('expense.delete');
    Route::put('expense/{id}', 'App\Http\Controllers\ExpenseController@restore')->name('expense.restore');
    Route::resource('expense', 'App\Http\Controllers\ExpenseController')->parameters('expense', 'id');
    Route::post('expense/update', 'App\Http\Controllers\ExpenseController@update')->name('expense.update');

    Route::delete('expense_item/{id}', 'App\Http\Controllers\ExpenseItemController@delete')->name('expense_item.delete');
    Route::put('expense_item/{id}', 'App\Http\Controllers\ExpenseItemController@restore')->name('expense_item.restore');
    Route::resource('expense_item', 'App\Http\Controllers\ExpenseItemController')->parameters('expense_item', 'id');
    Route::post('expense_item/update', 'App\Http\Controllers\ExpenseItemController@update')->name('expense_item.update');

    Route::delete('attendence/{id}', 'App\Http\Controllers\AttendenceController@delete')->name('attendence.delete');
    Route::put('attendence/{id}', 'App\Http\Controllers\AttendenceController@restore')->name('attendence.restore');
    Route::resource('attendence', 'App\Http\Controllers\AttendenceController')->parameters('attendence', 'id');
    Route::post('attendence/update', 'App\Http\Controllers\AttendenceController@update')->name('attendence.update');

    Route::delete('tableDelete/{id}', 'App\Http\Controllers\TableController@delete')->name('table.delete');
    Route::put('table/{id}', 'App\Http\Controllers\TableController@restore')->name('table.restore');
    Route::resource('table', 'App\Http\Controllers\TableController')->parameters('table', 'id');
    Route::post('table/update', 'App\Http\Controllers\TableController@update')->name('table.update');

    Route::delete('payment_method/{id}', 'App\Http\Controllers\PaymentMethodController@delete')->name('payment_method.delete');
    Route::resource('payment_method', 'App\Http\Controllers\PaymentMethodController')->parameters('payment_method', 'id');
    Route::post('payment_method/update', 'App\Http\Controllers\PaymentMethodController@update')->name('payment_method.update');

    Route::delete('user_roles/{id}', 'App\Http\Controllers\RoleController@delete')->name('user_roles.delete');
    Route::resource('user_roles', 'App\Http\Controllers\RoleController')->parameters('user_roles', 'id');
    Route::post('user_roles/update', 'App\Http\Controllers\RoleController@update')->name('user_roles.update');

    // purchase

    Route::delete('delete-purchase-ingredient/{id}', 'App\Http\Controllers\PurchaseController@deletePurchaseIngredient')->name('deletePurchaseIngredient');
    Route::delete('purchase/{id}', 'App\Http\Controllers\PurchaseController@delete')->name('purchase.delete');
    Route::put('purchase/{id}', 'App\Http\Controllers\PurchaseController@restore')->name('purchase.restore');
    Route::resource('purchase', 'App\Http\Controllers\PurchaseController')->parameters('purchase', 'id');
//    Route::get('menu/{id}/{menu}', 'App\Http\Controllers\MenuController@edit')->name('menu.edit');
    Route::post('purchase/{id}/update', 'App\Http\Controllers\PurchaseController@update')->name('purchase.update');

    Route::delete('warehousetype/{id}', 'App\Http\Controllers\WarehouseTypeController@delete')->name('warehousetype.delete');
    Route::resource('warehousetype', 'App\Http\Controllers\WarehouseTypeController')->parameters('warehousetype', 'id');
    Route::post('warehousetype/update', 'App\Http\Controllers\WarehouseTypeController@update')->name('warehousetype.update');

    Route::delete('table/{id}', 'App\Http\Controllers\WarehouseController@delete')->name('warehouse.delete');
    Route::resource('warehouse', 'App\Http\Controllers\WarehouseController')->parameters('warehouse', 'id');
    Route::post('warehouse/update', 'App\Http\Controllers\WarehouseController@update')->name('warehouse.update');


    Route::resource('waste', 'App\Http\Controllers\WasteController')->parameters('waste', 'id');
    Route::post('waste/{id}/update', 'App\Http\Controllers\WasteController@update')->name('waste.update');
    Route::get('menu-info', ['App\Http\Controllers\WasteController', 'showMenuInfo'])->name('menu.info');
    Route::delete('waste/{id}/delete', 'App\Http\Controllers\WasteController@delete')->name('waste.delete');


    Route::post('orderPost','App\Http\Controllers\OrderController@orderPost')->name('orderPost');
    Route::get('/loadOrdersByStatus/{status}','App\Http\Controllers\OrderController@loadOrdersByStatus')->name('loadOrdersByStatus');
    Route::get('/orderCompleted/{id}','App\Http\Controllers\OrderController@orderCompleted')->name('orderCompleted');
    Route::get('/clearTable/{id}','App\Http\Controllers\OrderController@clearTable')->name('clearTable');
    Route::get('/reserveTable/{id}','App\Http\Controllers\OrderController@reserveTable')->name('reserveTable');
    Route::get('/loadOrderDetails/{id}','App\Http\Controllers\OrderController@loadOrderDetails')->name('loadOrderDetails');
    Route::get('/invoicePrint/{id}','App\Http\Controllers\OrderController@invoicePrint')->name('invoicePrint');
    Route::get('/orderPaidStatus/{id}','App\Http\Controllers\OrderController@orderPaidStatus')->name('orderPaidStatus');


    Route::get('cashRegister', 'App\Http\Controllers\POSRegisterController@cashRegister')->name('cashRegister');
    Route::post('openRegister', 'App\Http\Controllers\POSRegisterController@openRegister')->name('openRegister');
    Route::post('closeRegister/{id}', 'App\Http\Controllers\POSRegisterController@closeRegister')->name('closeRegister');
    Route::get('getRegisterDetails', 'App\Http\Controllers\POSController@getRegisterDetails')->name('getRegisterDetails');







});
