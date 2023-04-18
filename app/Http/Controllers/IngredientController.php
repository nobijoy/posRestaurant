<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Ingredient;
use App\Models\IngredientUnit;
use App\Models\IngredientCategory;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sl = 0;
        $datas = Ingredient::with(['category', 'unit'])->where('is_active', 1)->get()->reverse();
        $units = IngredientUnit::where('is_active', 1)->orderBy('name')->get();
        $categories = IngredientCategory::where('is_active', 1)->orderBy('name')->get();
        $warehouses = Warehouse::where('is_active', 1)->orderBy('id')->get();
        return view('admin.pos.ingredients', compact('sl', 'datas', 'units', 'categories','warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => ['required', 'unique:ingredients,name,'.$request->category_id.',category_id,unit_id,'.$request->unit_id],
            'warehouse' => ['required'],
        ]);

        DB::beginTransaction();
        try {
            $data = new Ingredient;
            $data->category_id = $request->category_id;
            $data->name = $request->name;
            $data->warehouse = $request->warehouse;
            $data->unit_id = $request->unit_id;
            $data->price = $request->price;
            $data->alert_qty = $request->alert_qty;
            $data->code = $request->code;
            $data->is_active = 1;
            $data->created_by = Auth()->user()->id;
            $data->save();
            DB::commit();
            return back()->with('success', 'New Ingredient Created Successfully');

        } catch (\Throwable $th) {
            DB::rollback();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'unique:ingredients,name,'.$request->id.',id,category_id,'.$request->category_id.',unit_id,'.$request->unit_id],
        ]);

        DB::beginTransaction();
        try {
            $data = Ingredient::find($request->id);
            $data->category_id = $request->category_id;
            $data->name = $request->name;
            $data->warehouse = $request->warehouse;
            $data->unit_id = $request->unit_id;
            $data->price = $request->price;
            $data->alert_qty = $request->alert_qty;
            $data->code = $request->code;
            $data->is_active = 1;
            $data->updated_by = Auth()->user()->id;
            $data->save();
            DB::commit();
            return back()->with('success', 'Ingredient updated Successfully');

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
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $data = Ingredient::findorFail($id);
            $data->is_active = 0;
            $data->deleted_by = Auth()->user()->id;
            $data->save();
            DB::commit();
            return 'Ingredient Unit Inactive Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somethings Went Wrong!';
        }
    }

    public function restore($id)
    {
        DB::beginTransaction();
        try {
            $data = Ingredient::find($id);
            $data->is_active = 1;
            $data->save();
            DB::commit();
            return 'Ingredient Unit Activated Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somethings Went Wrong!';
        }
    }
}
