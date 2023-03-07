<?php

namespace App\Http\Controllers;

use DB;
use Image;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\Menu;
use App\Models\PosSetting;
use App\Models\MenuCategory;
use Illuminate\Http\Request;

class POSController extends Controller
{

    public function posUpdate(Request $request){
        $data = PosSetting::find(1);
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                if(!$data){
                    $data = new PosSetting();
                }
                if($request->file('logo')){
                    $image = $request->file('logo');
                    $input = time() . 'logo.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('uploads/image');
                    $img = Image::make($image->getRealPath());
                    $img->orientate();
                    $img->resize(107, 75)->save($destinationPath.'/'.$input);
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
        return view('admin.pos_setting.pos_setting', compact('data'));
    }

    public function emailSetup(Request $request){
        $data = PosSetting::find(1);
        if($request->isMethod('post')){
            if ($request->smtp_check) {
                $data->smtp_check = 1;
            }else{
                $data->smtp_check = 0;
            }
            $data->mail_transport = $request->mail_transport;
            $data->mail_host = $request->mail_host;
            $data->mail_port = $request->mail_port;
            $data->mail_encryption = $request->mail_encryption;
            $data->mail_username = $request->mail_username;
            $data->mail_password = $request->mail_password;
            $data->mail_from_name = $request->mail_from_name;
            $data->mail_from_address = $request->mail_from_address;

            $data->save();
            return back()->with('success', 'Email Setting Updated Successfully!');
        }
        return view('admin.pos_setting.email', compact('data'));
    }

    public function pos(){
        $waiters = Employee::where('designation', '2')->where('is_active','1')->get();
        $customers = Customer::where('is_active','1')->get();
        $menuCategories = MenuCategory::where('is_active', 1)->orderBY('name')->get();
        $menus = Menu::where('is_active', 1)->orderBY('name')->get();
        return view('pos.pos_view', compact('customers', 'waiters', 'menuCategories', 'menus'));
    }

}
