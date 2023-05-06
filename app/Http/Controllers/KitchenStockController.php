<?php

namespace App\Http\Controllers;

use App\Models\KitchenStock;
use App\Models\Stock;
use Illuminate\Http\Request;
use DB;
class KitchenStockController extends Controller
{
    public function kitchenStock(){
        $stocks = KitchenStock::select( 'ingredient', DB::raw('sum(quantity) as total_purchased'))->groupBy('ingredient')->get();
//        $stocks = Ingredient::leftJoin('stocks', 'ingredients.id', '=', 'stocks.ingredient')
//            ->select('ingredients.id as ingredient', DB::raw('sum(stocks.stock_quantity) as total_purchased'))
//            ->groupBy('ingredients.id')
//            ->get();
        $sl = 1;
        return view('kitchen.stock', compact('stocks','sl'));
    }
}
