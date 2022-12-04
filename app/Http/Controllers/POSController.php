<?php

namespace App\Http\Controllers;

use App\Models\PosSetting;
use Illuminate\Http\Request;
use DB;
use Image;

class POSController extends Controller
{

    public function posUpdate(Request $request){

        if($request->isMethod('post')){

            DB::beginTransaction();
            try{
                $data = PosSetting::find(1);
                if(!$data){
                    $data = new PosSetting();
                }
                if($request->file('logo')){
                    $image = $request->file('logo');
                    $input = time() . 'logo.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('uploads/image');
                    $img = Image::make($image->getRealPath());
                    $img->orientate();
                    $img->resize(275, 80)->save($destinationPath.'/'.$input);
                    $destinationPath = public_path('/thumbnail');
                    $image->move($destinationPath,$input);
                    $data->logo = $input;
                    $tmpImg = public_path('thumbnail/'.$input);
                    if (file_exists($tmpImg)) {
                        unlink($tmpImg);
                    }
                }
                if($request->file('favicon')){
                    $image = $request->file('favicon');
                    $input = time() . 'favicon.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('uploads/image');
                    $img = Image::make($image->getRealPath());
                    $img->orientate();
                    $img->resize(30, 30)->save($destinationPath.'/'.$input);
                    $destinationPath = public_path('/thumbnail');
                    $image->move($destinationPath,$input);
                    $data->favicon = $input;
                    $tmpImg = public_path('thumbnail/'.$input);
                    if (file_exists($tmpImg)) {
                        unlink($tmpImg);
                    }
                }
                $data->title = $request->title;

                $data->save();
                DB::commit();
                return back()->with('success', 'Data updated successfully!');
            } catch (Throwable $th) {
                DB::rollback();
                return back()->with('error', $th->getMessage());
            }
        }
        $data = PosSetting::find(1);
        return view('admin.pos_setting.pos_setting', compact('data'));
    }

    public function manageMail(){
        return view('admin.pos_setting.mail');
    }

}
