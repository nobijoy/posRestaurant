<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\IngredientCategory;

class IngredientCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = IngredientCategory::where('is_active', 1)->get()->reverse();
        $sl = 0;
        return view('admin.pos.ingredient_category', compact('datas', 'sl'));
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
            'name' => ['required', 'string', 'unique:ingredient_categories'],
        ]);

        DB::beginTransaction();

        try {
            $data = new IngredientCategory;
            $data->name = $request->name;
            $data->description = $request->description;
            $data->is_active = 1;

            $data->created_by = Auth()->user()->id;
            $data->save();
            DB::commit();

            return back()->with('success', 'New Ingredient Category Created Successfully');

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
             'name' => ['required', 'unique:ingredient_categories,name,' . $request->id],
         ]);

        DB::beginTransaction();

        try {
            $data = IngredientCategory::find($request->id);
            $data->name = $request->name;
            $data->description = $request->description;

            $data->is_active = 1;
            $data->updated_by = Auth()->user()->id;

            $data->save();
            DB::commit();

            return back()->with('success', 'Ingredient Category Updated Successfully');

        } catch (\Throwable $th) {
            DB::rollback();
            // return back()->with('error', $th->getMessage());
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
            $data = IngredientCategory::findorFail($id);
            $data->is_active = 0;
            $data->deleted_by = Auth()->user()->id;
            $data->save();
            DB::commit();
            return 'Ingredient Category Inactive Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somethings Went Wrong!';
        }
    }

    public function restore($id)
    {
        DB::beginTransaction();
        try {
            $data = IngredientCategory::find($id);
            $data->is_active = 1;
            $data->save();
            DB::commit();
            return 'Ingredient Category Activated Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somethings Went Wrong!';
        }
    }
}
