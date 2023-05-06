<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    public function sale(){
        $sl = 1 ;
        $sales = Sale::orderBy('id', 'desc')->get();
        return view('admin.sale.sale', compact('sales', 'sl'));
    }


}
