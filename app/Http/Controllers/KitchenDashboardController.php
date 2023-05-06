<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class KitchenDashboardController extends Controller
{
    public function dashboard(){
        $orders = Order::where('status', 'running')->get();
        return view('kitchen.kitchen_dashboard',compact('orders'));
    }
}
