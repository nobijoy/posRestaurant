<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use App\Models\Purchase;
use App\Models\Stock;
use App\Models\Warehouse;
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
        $datas = Purchase::with(['supplierInfo',])->where('is_active', 1)->get()->reverse();
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
            $data->total = $request->g_total;
            $data->due = $request->due;
            $data->payment_method = $request->payment_method;
            $data->is_active = 1;
            $data->created_by = Auth()->user()->id;
            $data->save();

            $ingredientPurchase = $this->purchaseIngredients($data->id, $request->purchase_ingredient_id, $request->ingredient_id, $request->unit_price, $request->quantity_amount, $request->total_price);

            $this->addStock($request->ingredient_id, $request->quantity_amount);

            DB::commit();

            return redirect()->route('purchase.index')->with('success', 'New Purchase Added Successfully');

        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', $th->getMessage());
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
        $payment_methods = PaymentMethod::where('is_active', 1)->orderBy('id','desc')->get();
        $purchase_ingredient = PurchaseIngredient::where('purchase_id', $id)->where('is_active', 1)->get();
        $purId = [];
        foreach ($purchase_ingredient as $key => $value) {
            array_push($purId, strval($value->ingredient_id));
        }
        return view('admin.inventory.purchase.edit', compact('suppliers', 'ingredients', 'data', 'purchase_ingredient', 'purId', 'payment_methods'));
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
        $validatedData = $request->validate([
            'reference_no' => ['required', 'unique:purchases,reference_no,'.$id],
            'supplier' => ['required'],
            'date' => ['required'],
        ]);
//        dd($request->purchase_ingredient_id)
        DB::beginTransaction();
        try {
            $data = Purchase::find($id);
            $data->reference_no = $request->reference_no;
            $data->supplier = $request->supplier;
            $data->date = $request->date;
            $data->note = $request->note;
            $data->paid = $request->paid;
            $data->total = $request->g_total;
            $data->due = $request->due;
            $data->warehouse = $request->warehouse;
            $data->payment_method = $request->payment_method;
            $data->is_active = 1;
            $data->updated_by = Auth()->user()->id;
            $data->save();

            $ingredientPurchase = $this->purchaseIngredients($data->id, $request->purchase_ingredient_id,
                $request->ingredient_id, $request->unit_price, $request->quantity_amount, $request->total_price);

//            $this->addStock($request->ingredient_id, $request->purchase_ingredient_id, $request->quantity_amount);

            DB::commit();

            return redirect()->route('purchase.index')->with('success', 'New Purchase Added Successfully');

        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', 'Somethings went wrong. Try Again');
        }
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

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $data = Purchase::findorFail($id);
            $data->is_active = 0;
            $data->deleted_by = Auth()->user()->id;
            $data->save();
            DB::commit();
            return 'Purchase Inactive Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somethings Went Wrong!';
        }
    }

    public function deletePurchaseIngredient($id){
        DB::beginTransaction();
        try {
            $data = PurchaseIngredient::findorFail($id);
            $data->is_active = 0;
            $data->deleted_by = Auth()->user()->id;
            $data->save();
            DB::commit();
            return 'Purchase Ingredient Item Deleted Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somethings Went Wrong!';
        }
    }


    public function purchaseIngredients($purchaseId, $purchase_ingredient_ids, $ingredients, $unitPrices, $amounts, $prices){
        if (isset($ingredients)) {
            if (sizeof($ingredients) > 0) {
                foreach ($ingredients as $key => $ingredient) {
                    if ($purchase_ingredient_ids[$key]) {
                        $purchaseIngredient = PurchaseIngredient::find($purchase_ingredient_ids[$key]);
                        $purchaseIngredient->updated_by = Auth()->user()->id;
                    } else {
                        $purchaseIngredient = new PurchaseIngredient;
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
        }
        return 1;
    }

    public function addStock($ingredients, $amounts){
        if (isset($ingredients)) {
            if (sizeof($ingredients) > 0) {
                foreach ($ingredients as $key => $ingredient) {
//                    if ($purchase_ingredient_ids[$key]) {
//                        $stock = Stock::find($purchase_ingredient_ids[$key]);
//                    } else {
//                    }
                    $stock = new Stock;
                    $stock->ingredient = $ingredient;
                    $stock->stock_quantity = $amounts[$key];
                    $stock->save();
                }
            }
        }
    }

    public function generateReciept(){
        $receipt = 1001;

        $count = Purchase::all()->count();
        if($count > 0){
            $receipt = $receipt + $count;
        }
        return response()->json($receipt);
    }


}
