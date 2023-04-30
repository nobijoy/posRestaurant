<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class KitchenDashboardController extends Controller
{
    public function dashboard(){
        $orders = Order::where('status', 'running')->get();
        return view('admin.dashboard.kitchen_dashboard',compact('orders'));
    }
}
