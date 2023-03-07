<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function manage(Request $request){

        $waiters = Employee::where('designation', '2')->where('is_active','1')->get();
        $customers = Customer::where('is_active','1')->get();
        return view('admin.setting.setting', compact('customers', 'waiters'));
    }

    public function printer_setup(){
        return view('admin.setting.printer_setup');
    }
}
