<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function stock()
    {

        return view('admin.inventory.stock.index');
    }
}
