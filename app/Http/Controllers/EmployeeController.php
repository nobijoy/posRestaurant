<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Employee::with(['designationInfo','deptInfo'])->where('is_active', 1)->get()->reverse();
        $departments = Department::where('is_active', 1)->get()->reverse();
        $designations = Designation::where('is_active', 1)->get()->reverse();
        $roles = Role::where('is_active', 1)->get()->reverse();
        $sl = 0;
        return view('admin.pos.employee',compact('datas', 'sl', 'departments', 'designations','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'phone' => ['required','unique:employees,phone'],
            'password' => 'required_with:confirm_password|same:confirm_password',
        ]);

        DB::beginTransaction();

        try {
            $data = new Employee;
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->email = $request->email;
            $data->date_of_birth = $request->date_of_birth;
            $data->department = $request->department;
            $data->designation = $request->designation;
            $data->address = $request->address;
            $data->login_access = $request->login_access;
            $data->is_active = 1;
            $data->created_by = Auth()->user()->id;
            $data->save();

            if ($request->login_access == 1){
                $user = new User;
                $user->employee_id = $data->id;
                $user->login_access = $request->login_access;
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->email = $request->email;
                $user->user_role = $request->user_role;
                $user->password = Hash::make($request->password);
                $user->save();
            }

            DB::commit();

            return back()->with('success', 'Employee Created Successfully');

        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', 'Somethings went wrong. Try Again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'phone' => ['required','unique:employees,phone,'.$request->id. ',id'],
            'password' => 'required_with:confirm_password|same:confirm_password',
        ]);

        DB::beginTransaction();

        try {
            $data = Employee::find($request->id);
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->email = $request->email;
            $data->date_of_birth = $request->date_of_birth;
            $data->department = $request->department;
            $data->designation = $request->designation;
            $data->address = $request->address;
            $data->login_access = $request->login_access;
            $data->is_active = 1;
            $data->created_by = Auth()->user()->id;
            $data->save();

            if ($request->login_access == 1){
                $user = User::find($request->id);
                $user->employee_id = $request->id;
                $user->login_access = $request->login_access;
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->email = $request->email;
                $user->user_role = $request->user_role;
                $user->password = Hash::make($request->password);
                $user->save();
            }
            else{
                $user = User::find($request->id);
                $user->employee_id = $request->id;
                $user->save();
            }


            DB::commit();

            return back()->with('success', 'Employee Updated Successfully');

        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', 'Somethings went wrong. Try Again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $data = Employee::findorFail($id);
            $data->is_active = 0;
            $data->deleted_by = Auth()->user()->id;
            $data->save();
            DB::commit();
            return 'Employee Inactive Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somethings Went Wrong!';
        }
    }

    public function restore($id)
    {
        DB::beginTransaction();
        try {
            $data = Employee::find($id);
            $data->is_active = 1;
            $data->save();
            DB::commit();
            return 'Employee Activated Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somethings Went Wrong!';
        }
    }

}
