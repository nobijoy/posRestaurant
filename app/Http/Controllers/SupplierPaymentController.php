<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\SupplierPayment;
use Illuminate\Http\Request;
use Auth;
use DB;


class SupplierPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = SupplierPayment::where('is_active', 1)-> get()->reverse();
        $suppliers = Supplier::where('is_active', 1)-> get()->reverse();
        $sl = 0;
        return view('admin.supplier.payment', compact('datas', 'sl', 'suppliers'));
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
            'receipt_number' => ['required', 'unique:supplier_payments,receipt_number'],
            'amount' => ['required'],
        ]);

        DB::beginTransaction();

        try {
            $data = new SupplierPayment;
            $data->name = $request->name;
            $data->receipt_number = $request->receipt_number;
            $data->amount = $request->amount;
            $data->payment_time = $request->payment_time;
            $data->is_active = 1;
            $data->created_by = Auth()->user()->id;
            $data->save();
            DB::commit();

            return back()->with('success', 'Payment Created Successfully');

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
//        $validatedData = $request->validate([
//            'name' => ['required'],
//            'receipt_number' => ['required', 'unique:supplier_payments,receipt_number' .$request->id. ',id'],
//            'amount' => ['required'],
//        ]);
        DB::beginTransaction();

        try {
            $data = SupplierPayment::find($request->id);
            $data->name = $request->name;
            $data->receipt_number = $request->receipt_number;
            $data->amount = $request->amount;
            $data->payment_time = $request->payment_time;
            $data->updated_by = Auth()->user()->id;

            $data->save();
            DB::commit();

            return back()->with('success', 'Payment Updated Successfully');

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
            $data = SupplierPayment::findorFail($id);
            $data->is_active = 0;
            $data->deleted_by = Auth()->user()->id;
            $data->save();
            DB::commit();
            return 'Payment Inactive Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somethings Went Wrong!';
        }
    }

    public function restore($id)
    {
        DB::beginTransaction();
        try {
            $data = SupplierPayment::find($id);
            $data->is_active = 1;
            $data->save();
            DB::commit();
            return 'Payment Activated Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somethings Went Wrong!';
        }
    }

}
