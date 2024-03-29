<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Expense;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\POSregister;
use App\Models\Purchase;
use App\Models\SupplierPayment;
use App\Models\Table;
use DB;
use Image;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\Menu;
use App\Models\PosSetting;
use App\Models\MenuCategory;
use Carbon\Carbon;
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
//        $payments = PaymentMethod::where('is_active', 1)->orderBy('id')->get();
        $orders = Order::with(['customerInfo','waiterInfo'])->where('status', 'running')->latest()->get();
        $register = DB::table('p_o_sregisters')->get()->last();

        $today = Carbon::now()->toDateString();
        $reservations = Booking::whereDate('date', $today)->where('status', 'Confirmed')->get();

//        return response()->json([
//            'view' => view('pos.pos_view', compact('customers', 'waiters', 'menuCategories', 'menus', 'orders', 'tables','payments'))->render(),
//        ]);

        return view('pos.pos_view_copy', compact('customers', 'waiters', 'menuCategories', 'menus', 'orders', 'tables', 'register','reservations'));
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
        return view('admin.pos_setting.email');
    }

    public function searchOrder(Request $request){
        $query = Order::query();
//        $query->when(request('search') == '' || request('search') == NULL, function ($q) {
//            return $q->where('status', 'running');
//        });
        $query->when(request('search') != '', function ($q) {
            return  $q->where('reference_no', 'like', '%'.request('search').'%')
                ->orWhereHas('customerInfo', function ($subq) {
                    $subq->where('name', 'like', '%'.request('search').'%');
                })
                ->where('status', 'running');
        });
        $orders = $query->orderBY('id', 'desc')->get();
        return response()->json([
            'view' => view('pos.partials.order', compact('orders'))->render(),
        ]);
    }

    public function getRegisterDetails(){
        $register = POSregister::latest()->first();
        $start_time = $register->created_at;
        $end_time = date('Y-m-d H:i:s');

        $payment_methods = ['cash', 'bkash', 'nagad', 'rocket', 'credit', 'debit', 'check', 'bank_transfer'];

        $register_amount = [];

        foreach ($payment_methods as $method) {
            $query = Purchase::whereBetween('created_at', [$start_time, $end_time])->where('payment_method', $method);
            $register_amount[$method]['purchases'] = $query->sum('paid');

            $query = SupplierPayment::whereBetween('created_at', [$start_time, $end_time])->where('payment_method', $method);
            $register_amount[$method]['payments'] = $query->sum('amount');

            $query = Expense::whereBetween('created_at', [$start_time, $end_time])->where('payment_method', $method);
            $register_amount[$method]['expenses'] = $query->sum('amount');

            $query = Order::whereBetween('created_at', [$start_time, $end_time])->where('payment_method', $method);
            $register_amount[$method]['sales'] = $query->sum('total');
        }

//        return json_encode(['amount'=>$register_amount, 'register'=>$register]);

        return response()->json([
            'view' => view('pos.partials.registerDetails', compact('register_amount','register'))->render(),
        ]);
    }


}
