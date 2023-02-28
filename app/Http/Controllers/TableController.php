<?php

namespace App\Http\Controllers;

use App\Models\OutletSetting;
use App\Models\Table;
use Illuminate\Http\Request;
use Auth;
use DB;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sl = 0;
        $datas = Table::where('is_active', 1)->get()->reverse();
        $outlets = OutletSetting::get();
        return view('admin.tables.table', compact('datas', 'outlets', 'sl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

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
            'name' => ['required'],
            'seat_capacity' => ['required'],
            'position' => ['required']
        ]);

        DB::beginTransaction();
        try {
            $data = new Table;
            $data->name = $request->name;
            $data->seat_capacity = $request->seat_capacity;
            $data->position = $request->position;
            $data->outlet_id = $request->outlet_id;
            $data->description = $request->description;
            $data->is_active = 1;
            $data->created_by = Auth()->user()->id;
            $data->save();
            DB::commit();
            return back()->with('success', 'New Table Created Successfully');

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
            'name' => ['required'],
            'seat_capacity' => ['required'],
            'position' => ['required']
        ]);

        DB::beginTransaction();
        try {
            $data = Table::find($request->id);
            $data->name = $request->name;
            $data->seat_capacity = $request->seat_capacity;
            $data->position = $request->position;
            $data->outlet_id = $request->outlet_id;
            $data->description = $request->description;
            $data->is_active = 1;
            $data->updated_by = Auth()->user()->id;
            $data->save();
            DB::commit();
            return back()->with('success', 'Table Updated Successfully');

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
            $data = Table::findorFail($id);
            $data->is_active = 0;
            $data->deleted_by = Auth()->user()->id;
            $data->save();
            DB::commit();
            return 'Table Inactive Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somethings Went Wrong!';
        }
    }

}
