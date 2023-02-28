<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function manage(Request $request){
            return view('admin.setting.setting');
    }
}
