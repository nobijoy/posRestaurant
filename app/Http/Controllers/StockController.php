<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\PurchaseIngredient;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function stock()
    {
        $ingredient_id = PurchaseIngredient::pluck('ingredient_id');
        $ingredients =  Ingredient::whereIn('id', $ingredient_id)->get();

//        $ingredients = Ingredient::whereIn('id', $ingredient_id)
//            ->with('purchaseIngredients')
//            ->get();


        $sl =0 ;
        return view('admin.inventory.stock.index', compact('ingredients', 'sl'));
    }
}
