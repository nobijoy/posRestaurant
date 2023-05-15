<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Booking::get()->reverse();
        $sl = 0;
        return view('admin.booking.index', compact('datas', 'sl'));
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

    public function reserveOrder(Request $request){
//        dd($request->all());
        DB::beginTransaction();
        try {

            $booking = new Booking;
            $booking->booking_id = $request->input('booking_id');
            $booking->first_name = $request->input('first_name');
            $booking->last_name = $request->input('last_name');
            $booking->phone_number = $request->input('phone_number');
            $booking->email = $request->input('email');
            $booking->menu = $request->input('menu');
            $booking->quantity = $request->input('quantity');
            $booking->no_of_guest = $request->input('no_of_guest');
            $booking->date = $request->input('date');
            $booking->preferred_time = $request->input('preferred_time');
            $booking->special_request = $request->input('special_request');
            $booking->save();

            $customer = new Customer;
            $customer->name = $booking->first_name . " " .$booking->first_name;
            $customer->phone = $booking->phone_number ;
            $customer->email = $booking->email ;
            $customer->save();

            DB::commit();
            return response()->json(['msg'=> 'Success']);

        }catch (\Throwable $th){
            DB::rollback();
            return response()->json(['msg'=> $th->getMessage()]);
//                return back()->with('error', 'Somethings went wrong. Try Again');
        }
    }

    public function bookingCancel($id){
        Booking::where('id', $id)->update(['status' => 'Canceled']);
        return response()->json(['msg'=> 'Success']);
    }
    public function bookingConfirm($id){
        Booking::where('id', $id)->update(['status' => 'Confirmed']);
        return response()->json(['msg'=> 'Success']);
    }




}
