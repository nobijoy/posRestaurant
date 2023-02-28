<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home.home');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function user()
    {
        return view('admin.users.create');
    }
    public function userSearch()
    {
        return view('admin.users.search');
    }
    public function userAttendence()
    {
        return view('admin.users.attendence');
    }
    public function addMember()
    {
        return view('admin.member.add');
    }
    public function memberPoint()
    {
        return view('admin.member.point');
    }
    public function employees()
    {
        return view('admin.hr.employees');
    }
    public function employeePayment()
    {
        return view('admin.hr.payment');
    }
    public function employeeLoan()
    {
        return view('admin.hr.loan');
    }
    public function supplierInfo()
    {
        return view('admin.supplier.info');
    }
    public function supplierPayment()
    {
        return view('admin.supplier.payment');
    }
    public function productType()
    {
        return view('admin.product.type');
    }
    public function productList()
    {
        return view('admin.product.list');
    }
    public function cashIn()
    {
        return view('admin.accounts.cash_in');
    }
    public function cashOut()
    {
        return view('admin.accounts.cash_out');
    }
    public function expendiser()
    {
        return view('admin.accounts.expendiser');
    }
    public function balance()
    {
        return view('admin.accounts.balance');
    }
    public function inventoryInfo()
    {
        return view('admin.inventory.info');
    }
    public function inventoryDamage()
    {
        return view('admin.inventory.damage');
    }
    public function inventoryBarcode()
    {
        return view('admin.inventory.barcode');
    }
    public function discount()
    {
        return view('admin.discount.discount');
    }
    public function productPurchase()
    {
        return view('admin.purchase.product');
    }
    public function productSummary()
    {
        return view('admin.purchase.product_summary');
    }
    public function returnProduct()
    {
        return view('admin.purchase.return');
    }
    public function returnSummary()
    {
        return view('admin.purchase.return_summary');
    }
    public function invoiceDetails()
    {
        return view('admin.invoice.invoice');
    }
    public function invoiceSearch()
    {
        return view('admin.invoice.invoice_search');
    }
    public function returnInvoice()
    {
        return view('admin.invoice.return');
    }
    public function returnSearch()
    {
        return view('admin.invoice.return_search');
    }
    public function invoiceDue()
    {
        return view('admin.invoice.due');
    }
    public function setting()
    {
        return view('admin.pos.setting');
    }
    public function category()
    {
        return view('admin.menus.category');
    }
    public function subCategory()
    {
        return view('admin.menus.sub_category');
    }
    public function menu()
    {
        return view('admin.menus.menu.index');
    }
    public function menuAdd()
    {
        return view('admin.menus.menu.create');
    }
    public function menuEdit()
    {
        return view('admin.menus.menu.edit');
    }
    public function ingredientCategory()
    {
        return view('admin.pos.ingredient_category');
    }
    public function ingredientUnits()
    {
        return view('admin.pos.ingredient_unit');
    }
    public function ingredients()
    {
        return view('admin.pos.ingredients');
    }
    public function itemSection()
    {
        return view('admin.pos.food_item.index');
    }
    public function itemAdd()
    {
        return view('admin.pos.food_item.create');
    }
    public function modifiers()
    {
        return view('admin.pos.modifiers.index');
    }
    public function modifiersAdd()
    {
        return view('admin.pos.modifiers.create');
    }
    public function modifiersEdit()
    {
        return view('admin.pos.modifiers.edit');
    }
    public function purchase()
    {
        return view('admin.inventory.purchase.index');
    }
    public function purchaseAdd()
    {
        return view('admin.inventory.purchase.create');
    }
    public function purchaseEdit()
    {
        return view('admin.inventory.purchase.edit');
    }
    public function stock()
    {
        return view('admin.inventory.stock.index');
    }
    public function stockAdjustment()
    {
        return view('admin.inventory.stock_adjustment.index');
    }
    public function stockAdjustmentAdd()
    {
        return view('admin.inventory.stock_adjustment.create');
    }
    public function stockAdjustmentEdit()
    {
        return view('admin.inventory.stock_adjustment.edit');
    }

}
