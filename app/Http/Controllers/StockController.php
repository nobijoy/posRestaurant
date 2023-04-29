<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\PurchaseIngredient;
use App\Models\Stock;
use Illuminate\Http\Request;
use DB;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::select( 'ingredient', DB::raw('sum(stock_quantity) as total_purchased'))->groupBy('ingredient')->get();
//        $stocks = Ingredient::leftJoin('stocks', 'ingredients.id', '=', 'stocks.ingredient')
//            ->select('ingredients.id as ingredient', DB::raw('sum(stocks.stock_quantity) as total_purchased'))
//            ->groupBy('ingredients.id')
//            ->get();
        $sl = 1;

        return view('admin.inventory.stock.index', compact('stocks', 'sl'));
    }
}
