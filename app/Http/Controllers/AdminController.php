<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Image;
use Illuminate\Support\Facades\Hash;
use Auth;


class AdminController extends Controller
{


    public function profileUpdate(Request $request)
    {
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'name' => ['required'],
                'email' => ['required'],
            ]);

            DB::beginTransaction();
            try{
                $data = User::find(Auth()->user()->id);
                if($request->file('user_img')){
                    $image = $request->file('user_img');
                    $input = time() . 'user_img.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('uploads/image');
                    $image->move($destinationPath,$input);
                    $data->user_img = $input;
                }
                $data->name = $request->name;
                $data->phone = $request->phone;
                $data->email = $request->email;
                $data->save();
                DB::commit();
                return back()->with('success', 'Data updated successfully!');
            } catch (Throwable $th) {
                DB::rollback();
                return back()->with('error', $th->getMessage());
            }
        }
        $data = User::find(Auth()->user()->id);
        return view('admin.admin_profile.profile', compact('data'));
    }

    public function passwordUpdate(Request $request)
    {
        if($request->isMethod('post')){

            $validatedData = $request->validate([
                'password' => ['required','string','min:8'],
                'confirm_password' => ['required','string','same:password'],
            ]);

            DB::beginTransaction();
            try{

                auth()->user()->update(['password' => Hash::make($request->password) ]);
                if ($request->session()->has('password_hash_web')) {
                    $user = auth('web')->getUser();
                    $request->session()->forget('password_hash_web');
                    Auth::guard('web')->login($user);
                }
                DB::commit();
                return back()->with('success', 'Data updated successfully!');
            } catch (Throwable $th) {
                DB::rollback();
                return back()->with('error', $th->getMessage());
            }
        }
        return view('admin.admin_profile.change_password');
    }



}
