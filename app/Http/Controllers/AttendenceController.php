<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Auth;
use DB;
use App\Models\Attendence;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::where('is_active', 1)->orderBy('id', 'desc')->get();
        $datas = Attendence::with(['employeeInfo','createdBy'])->where('is_active', 1)->get()->reverse();
        $sl = 0;
        return view('admin.users.attendence',compact('employees','sl','datas'));
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
        DB::beginTransaction();
        try {
            $data = new Attendence;
            $data->reference_no = $request->reference_no;
            $data->date = $request->date;
            $data->employee = $request->employee;
            $data->in_time = $request->in_time;
            $data->out_time = $request->out_time;
            $data->note = $request->note;
            $data->is_active = 1;
            $start_time = Carbon::parse($request->input('in_time'));
            $finish_time = Carbon::parse($request->input('out_time'));
            $data->time_count = $finish_time->floatDiffInHours($start_time, true);
            $data->created_by = Auth()->user()->id;
            $data->save();
            DB::commit();
            return back()->with('success', 'Attendence Created Successfully');

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
        DB::beginTransaction();

        try {
            $data = Attendence::find($request->id);
            $data->reference_no = $request->reference_no;
            $data->date = $request->date;
            $data->employee = $request->employee;
            $data->in_time = $request->in_time;
            $data->out_time = $request->out_time;
            $data->note = $request->note;
            $data->is_active = 1;
            $start_time = Carbon::parse($request->input('in_time'));
            $finish_time = Carbon::parse($request->input('out_time'));
            $data->time_count = $finish_time->floatDiffInHours($start_time, true);
            $data->updated_by = Auth()->user()->id;
            $data->save();
            DB::commit();
            return back()->with('success', 'Attendence Updated Successfully');

        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', $th->getMessage());
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
            $data = Attendence::findorFail($id);
            $data->is_active = 0;
            $data->deleted_by = Auth()->user()->id;
            $data->save();
            DB::commit();
            return 'Menu Inactive Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somethings Went Wrong!';
        }
    }

    public function restore($id)
    {
        DB::beginTransaction();
        try {
            $data = Attendence::find($id);
            $data->is_active = 1;
            $data->save();
            DB::commit();
            return 'Menu Activated Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somethings Went Wrong!';
        }
    }
}
