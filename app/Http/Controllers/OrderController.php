<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

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
        DB::beginTransaction();

        try {
            $orderDestails = [];
            if (sizeof($request->cmenu_id)> 0){
                foreach($request->cmenu_id as $key => $menuId){
                    $orderDestails [] = [
                        'id'=>$menuId,
                        'menu'=>$request->menu_name[$key],
                        'price'=>$request->cmenu_price[$key],
                        'qty'=>$request->cmenu_qty[$key],
                        'amount'=>$request->cmenu_total_price[$key]
                    ];
                }
            }
            $orderNo = 1001 + Order::count();
            dd($request->table);
            $data = new Order;
            $data->reference_no = $orderNo;
            $data->order_type = $request->order_type;
            $data->order_details = json_encode($orderDestails);
            $data->waiter = $request->waiter;
            $data->customer = $request->customer;
            $data->table = json_encode($request->table) ;
            $data->subtotal = $request->subTotal;
            $data->vat = $request->vat;
            $data->charge = $request->charge;
            $data->discount = $request->discount;
            $data->total = $request->grandTotal;
            $data->status = "running";
            $data->created_by = Auth()->user()->id;
            $data->save();
            Table::whereIn('id', $request->table)->update(['reserved'=>1]);

            DB::commit();

            $orders = Order::with(['customerInfo','waiterInfo'])->where('status', 'running')->latest()->get();
            return response()->json([
                'view' => view('pos.partials.order', compact('orders'))->render(),
                'status'=> 1,
                'msg'=> 'Order Created Successfully',
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'view' => '',
                'msg' => $th->getMessage(),
                'status'=> 0,
            ]);
        }
    }

    public function loadOrdersByStatus($status){
        if ($status == 'running'){
            $orders = Order::with(['customerInfo','waiterInfo'])->where('status', 'running')->latest()->get();
            return response()->json([
                'view' => view('pos.partials.order', compact('orders'))->render(),
                'status'=> 1,
                'msg'=> '',
            ]);
        }
        else if($status == 'draft'){
            $orders = Order::with(['customerInfo','waiterInfo'])->where('status', 'draft')->latest()->get();
            return response()->json([
                'view' => view('pos.partials.order', compact('orders'))->render(),
                'status'=> 1,
                'msg'=> '',
            ]);
        }
        else{
            return response()->json([
                'view' => '',
                'status'=> 2,
                'msg'=> '',
            ]);
        }
    }

    public function reserveStatus($id)
    {
        try {
            Table::where('id', $id)->update(['reserved' => 0]);
            $tables = Table::where('is_active', 1)->get();
            return response()->json([
                'view' => view('pos.partials.tables', compact('tables'))->render(),
                'status'=> 1,
                'msg'=> 'Successful',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'view' => '',
                'msg' => $th->getMessage(),
                'status'=> 0,
            ]);
        }

    }


}
