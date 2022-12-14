<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Ingredient;
use App\Models\PurchaseIngredient;
use Auth;
use DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Purchase::where('is_active', 1)->get()->reverse();
        $sl = 0;
        return view('admin.inventory.purchase.index', compact('datas', 'sl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::where('is_active', 1)->orderBy('name')->get();
        $ingredients = Ingredient::where('is_active', 1)->orderBy('name')->get();
        return view('admin.inventory.purchase.create', compact('suppliers', 'ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reference_no' => ['required', 'unique:purchases,reference_no,'],
            'supplier' => ['required'],
            'date' => ['required'],
        ]);
        DB::beginTransaction();
        try {
            $data = new Purchase;
            $data->reference_no = $request->reference_no;
            $data->supplier = $request->supplier;
            $data->date = $request->date;
            $data->note = $request->note;
            $data->paid = $request->paid;
            $data->is_active = 1;
            $data->created_by = Auth()->user()->id;
            $data->save();

            $ingredientPurchase = $this->purchaseIngredients($data->id, $request->purchase_ingredient_id, $request->ingredient_id, $request->unit_price, $request->quantity_amount, $request->total_price);


            DB::commit();

            return redirect()->route('purchase.index')->with('success', 'New Purchase Added Successfully');

        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', $th->getMessage());
            return back()->with('error', 'Somethings went wrong. Try Again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Purchase::findorfail($id);
        $suppliers = Supplier::where('is_active', 1)->orderBy('name')->get();
        $ingredients = Ingredient::where('is_active', 1)->orderBy('name')->get();
        return view('admin.inventory.purchase.edit', compact('suppliers', 'ingredients', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function purchaseIngredients($purchaseId, $purchase_ingredient_ids, $ingredients, $unitPrices, $amounts, $prices){
        if(sizeof($ingredients) > 0){
            foreach($ingredients as $key => $ingredient){
                if ($purchase_ingredient_ids[$key]) {
                    $purchaseIngredient  = PurchaseIngredient::find($purchase_ingredient_ids[$key]);
                    $purchaseIngredient->updated_by = Auth()->user()->id;
                }else{
                    $purchaseIngredient  = new PurchaseIngredient;
                    $purchaseIngredient->created_by = Auth()->user()->id;
                }
                $purchaseIngredient->purchase_id = $purchaseId;
                $purchaseIngredient->ingredient_id = $ingredient;
                $purchaseIngredient->unit_price = $unitPrices[$key];
                $purchaseIngredient->quantity_amount = $amounts[$key];
                $purchaseIngredient->total = $prices[$key];
                $purchaseIngredient->is_active = 1;
                $purchaseIngredient->save();
            }
        }
        return 1;
    }


}
