<?php

namespace App\Http\Controllers;

use App\Models\OutletSetting;
use Illuminate\Http\Request;
use DB;

class OutletSettingController extends Controller
{
    public function setup(Request $request){
        {
            if($request->isMethod('post')){

                DB::beginTransaction();
                try{
                    $data = OutletSetting::find(1);
                    if(!$data){
                        $data = new OutletSetting();
                    }

                    $data->name = $request->name;
                    $data->phone = $request->phone;
                    $data->email = $request->email;
                    $data->address = $request->address;
                    $data->save();
                    DB::commit();
                    return back()->with('success', 'Data updated successfully!');
                } catch (Throwable $th) {
                    DB::rollback();
                    return back()->with('error', 'Something is wrong');
                }
            }
            $data = OutletSetting::find(1);
//            dd($data);
            return view('admin.pos_setting.outlet_setting', compact('data'));
        }
    }
}
