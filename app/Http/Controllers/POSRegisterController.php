<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class POSRegisterController extends Controller
{
    public function cashRegister(){
        return view('admin.cash_register.register');
    }
}
