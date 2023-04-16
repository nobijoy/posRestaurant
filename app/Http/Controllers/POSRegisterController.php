<?php

namespace App\Http\Controllers;

use App\Models\POSregister;
use Illuminate\Http\Request;
use Auth;
use DB;

class POSRegisterController extends Controller
{
    public function cashRegister(){
        return view('admin.cash_register.register');
    }

    public function openRegister(Request $request){
        DB::beginTransaction();

        try {
            $register = new POSregister;
            $register->cash = $request->cash ;
            $register->credit = $request->credit ;
            $register->debit = $request->debit ;
            $register->check = $request->check ;
            $register->bank_transfer = $request->bank_transfer ;
            $register->bkash = $request->bkash ;
            $register->rocket = $request->rocket ;
            $register->nagad = $request->nagad ;
            $register->is_open = 1;
            $register->created_by = Auth()->user()->id ;

            $register->save();

            DB::commit();

            return redirect()->route("pos");
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', 'Something is wrong');
        }
    }
    public function closeRegister(Request $request, $id){

        DB::beginTransaction();

        try {

            $data = POSregister::findorfail($id);
            $data->cash_closing = $request->cash_closing ;
            $data->bkash_closing = $request->bkash_closing ;
            $data->check_closing = $request->check_closing ;
            $data->nagad_closing = $request->nagad_closing ;
            $data->rocket_closing = $request->rocket_closing ;
            $data->credit_closing = $request->credit_closing ;
            $data->debit_closing = $request->debit_closing ;
            $data->bank_transfer_closing = $request->bank_closing ;
            $data->total = $request->total ;
            $data->closing_time =  date('Y-m-d H:i:s') ;
            $data->is_open = 0;

            $data->save();

            DB::commit();

            $redirectUrl = route('home');
            $response = [
                'redirect_url' => $redirectUrl,
            ];
            return response()->json($response);
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', 'Something is wrong');
        }
    }



}
