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
        return view('admin.dashboard.dashboard');
    }

    public function setting()
    {
        return view('admin.pos.setting');
    }
    public function category()
    {
        return view('admin.menus.category');
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
