<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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

    public function orderPost(Request $request){
        dd($request->all());
        DB::beginTransaction();

        try {
            $data = new Order;
            $data->reference_no = 001;
            $data->order_type = $request->order_type;
            $data->order_details = $request->order_details;
            $data->email = $request->customer;
            $data->waiter = $request->waiter;
            $data->customer = $request->customer;
            $data->table = $request->table;
            $data->subtotal = $request->subTotal;
            $data->vat = $request->vat;
            $data->charge = $request->charge;
            $data->discount = $request->discount;
            $data->total = $request->grandTotal;
            $data->status = "running";
            $data->created_by = Auth()->user()->id;


//            $data->save();
//            DB::commit();

            $orders = Order::where('is_active','1')->get();
            return response()->json([
                'view' => view('', compact('customers'))->render(),
                'status'=> 1,
                'msg'=> 'Order Created Successfully',
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'view' => '',
                'msg' => 'Somethings went wrong. Try Again',
                'status'=> 0,
            ]);
        }
    }
}
