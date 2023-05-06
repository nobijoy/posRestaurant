<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\KitchenStock;
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

    public function stock(){
        $ingredients =  Ingredient::where('is_active',1)->get();
        return view('admin.inventory.stock_adjustment.create', compact('ingredients'));
    }

    public function stockAdjustment(Request $request){
        DB::beginTransaction();
        try {
            if ($request->action == "add"){
                foreach ($request->ingredient_id as $key => $ingredient){
                    $data = new Stock;
                    $data->ingredient = $ingredient;
                    $data->stock_quantity = $request->quantity[$key];
                    $data->save();
                }
                DB::commit();
                return back()->with('success', 'Stock Added Successfully');
            }
            elseif ($request->action == "remove"){
                if (isset($request->ingredient_id)) {
                    if (sizeof($request->ingredient_id) > 0) {
                        foreach ($request->ingredient_id as $key => $ingredient) {
                            $quantity = floatval($request->quantity[$key]);

                            $stock_quantity = Stock::where('ingredient', $ingredient)->sum('stock_quantity');

                            if($quantity <= $stock_quantity){
                                while ($quantity > 0){
                                    $latestStock = Stock::where('ingredient', $ingredient)
                                        ->where('stock_quantity', '>', 0)
                                        ->orderBy('id')
                                        ->first();

                                    if ($latestStock) {
                                        $remainingQuantity = $latestStock->stock_quantity - $quantity;

                                        if ($remainingQuantity < 0) {
                                            $latestStock->stock_quantity = 0;
                                            $latestStock->save();

                                            $quantity = abs($remainingQuantity);

                                        } else {

                                            $latestStock->stock_quantity = $remainingQuantity;
                                            $latestStock->save();
                                            $quantity = 0;
                                        }
                                    } else {
                                        return back()->with('error', 'Ingredient not found in Stock');
                                    }

                                }
                            }else{
                                return back()->with('error', 'Invalid data! Stock amount mismatch');

                            }

                        }
                    }
                }
                DB::commit();
                return back()->with('success', 'Stock Deducted Successfully');
            }

            elseif ($request->action == "kitchen"){
                if (isset($request->ingredient_id)) {
                    if (sizeof($request->ingredient_id) > 0) {
                        foreach ($request->ingredient_id as $key => $ingredient){
                            $quantity = floatval($request->quantity[$key]);

                            $stock_quantity = Stock::where('ingredient', $ingredient)->sum('stock_quantity');

                            if($quantity <= $stock_quantity){
                                while ($quantity > 0){
                                    $latestStock = Stock::where('ingredient', $ingredient)
                                        ->where('stock_quantity', '>', 0)
                                        ->orderBy('id')
                                        ->first();

                                    if ($latestStock) {
                                        $remainingQuantity = $latestStock->stock_quantity - $quantity;

                                        if ($remainingQuantity < 0) {
                                            $latestStock->stock_quantity = 0;
                                            $latestStock->save();

                                            $quantity = abs($remainingQuantity);

                                        } else {

                                            $latestStock->stock_quantity = $remainingQuantity;
                                            $latestStock->save();
                                            $quantity = 0;
                                        }
                                    } else {
                                        return back()->with('error', 'Ingredient not found in Stock');
                                    }

                                }
                            }else{
                                return back()->with('error', 'Invalid data! Stock amount mismatch');

                            }

                            $data = new KitchenStock;
                            $data->ingredient = $ingredient;
                            $data->quantity = $request->quantity[$key];
                            $data->save();

                        }

                        DB::commit();
                        return back()->with('success', 'Stock Added To Kitchen Successfully');

                    }
                }

            }


        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', $th->getMessage());
        }
    }
}
