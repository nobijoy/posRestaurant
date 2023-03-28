<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Table;
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
        $tables = Table::where('is_active', 1)->get();
        $payments = PaymentMethod::where('is_active', 1)->orderBy('id', 'desc')->get();
        $orders = Order::with(['customerInfo','waiterInfo','paymentMethod'])->where('status', 'running')->latest()->get();
        return view('pos.pos_view', compact('customers', 'waiters', 'menuCategories', 'menus', 'orders', 'tables','payments'));
    }
    public function setting()
    {
        return view('admin.pos.setting');
    }

    public function loadMenuByCategory($id){
        if ($id == 'All') {
            $menus = Menu::where('is_active', 1)->orderBY('name')->get();
        }else{
            $menus = Menu::where('is_active', 1)->where('category_id', $id)->orderBY('name')->get();
        }
        return response()->json([
            'view' => view('pos.menus', compact('menus'))->render(),
        ]);
    }

    public function getMenuWithSearch(Request $request){
        $query = Menu::query();

        $query->when(request('search') == '' || request('search') == NULL, function ($q) {
            return $q->where('is_active', 1);
        });

        $query->when(request('search') == 'VEG', function ($q) {
            return $q->where('is_veg', 1)->where('is_active', 1);
        });

        $query->when(request('search') == 'BAR', function ($q) {
            return $q->where('is_bev', 1)->where('is_active', 1);
        });

        $query->when(request('search') == 'BEV', function ($q) {
            return $q->where('is_bar', 1)->where('is_active', 1);
        });

        $query->when(request('search') != '', function ($q) {
            return  $q->where('name', 'like', '%'.request('search').'%')
            ->orWhereHas('category', function ($subq) {
                $subq->where('name', 'like', '%'.request('search').'%');
            })
            ->where('is_active', 1);
        });

        $menus = $query->orderBY('name')->get();
        return response()->json([
            'view' => view('pos.menus', compact('menus'))->render(),
        ]);
    }

    public function posOrder(Request $request){
        dd($request->all());
    }

    public function thirdPartySetup(Request $request){
        return view('admin.pos_setting.email', compact('data'));
    }

    public function searchOrder(Request $request){
//        $query = Order::query();
//        $query->when(request('search') == '' || request('search') == NULL, function ($q) {
//            return $q->where('is_active', 1);
//        });
//        $query->when(request('search') != '', function ($q) {
//            return  $q->where('reference_no', '%'.request('search').'%');
//        });
//        $orders = $query->orderBY('id')->get();
//        return response()->json([
//            'view' => view('pos.partials.order', compact('orders'))->render(),
//        ]);
    }

}
