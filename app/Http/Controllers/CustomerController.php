<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Auth;
use DB;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Customer::with(['createdBy'])->where('is_active', 1)->get()->reverse();
        $sl = 0;
        return view('admin.pos.customer', compact('datas', 'sl'));
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
            'name' => ['required'],
            'phone' => ['required'],
            'email' => ['required', 'unique:customers,email'],
            'gst_number' => ['required', 'unique:customers,gst_number'],
        ]);

            DB::beginTransaction();

            try {
                $data = new Customer;
                $data->name = $request->name;
                $data->phone = $request->phone;
                $data->email = $request->email;
                $data->date_of_birth = $request->date_of_birth;
                $data->date_of_anniversary = $request->date_of_anniversary;
                $data->address = $request->address;
                $data->gst_number = $request->gst_number;
                $data->is_active = 1;

                $data->created_by = Auth()->user()->id;
                $data->save();
                DB::commit();

                return back()->with('success', 'Customer Created Successfully');

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
            'phone' => ['required'],
            'email' => ['required'],
            'gst_number' => ['required'],
        ]);

        DB::beginTransaction();

        try {
            $data = Customer::find($request->id);
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->email = $request->email;
            $data->date_of_birth = $request->date_of_birth;
            $data->date_of_anniversary = $request->date_of_anniversary;
            $data->address = $request->address;
            $data->gst_number = $request->gst_number;
            $data->updated_by = Auth()->user()->id;
            $data->save();
            DB::commit();

            return back()->with('success', 'Customer Updated Successfully');

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
            $data = Customer::findorFail($id);
            $data->is_active = 0;
            $data->deleted_by = Auth()->user()->id;
            $data->save();
            DB::commit();
            return 'Supplier Inactive Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somethings Went Wrong!';
        }
    }

    public function restore($id)
    {
        DB::beginTransaction();
        try {
            $data = Customer::find($id);
            $data->is_active = 1;
            $data->save();
            DB::commit();
            return 'MenuCategory Activated Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somethings Went Wrong!';
        }
    }
}
