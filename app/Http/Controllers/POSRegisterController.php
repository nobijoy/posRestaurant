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
    public function closeRegister($id){
        try {
            POSregister::where('id', $id)->update(['is_open' => 0, 'closing_time' => date('Y-m-d H:i:s')]);
            return redirect()->route("cashRegister");
        } catch (\Throwable $th) {
            return back()->with('error', 'Something is wrong');
        }
    }

}
