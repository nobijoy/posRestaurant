<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Expense;
use App\Models\ExpenseItem;
use Illuminate\Http\Request;
use Auth;
use DB;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Expense::where('is_active',1)->get()->reverse();
        $res_persons = Employee::where('is_active',1)->get()->reverse();
        $categories = ExpenseItem::where('is_active',1)->get()->reverse();
        $sl = 0;
//        dd($res_persons);
        return view('admin.expense.expense',compact('res_persons', 'categories', 'sl','datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'date' => ['required'],
            'amount' => ['required'],
        ]);

        DB::beginTransaction();

        try {
            $data = new Expense;
            $data->date = $request->date;
            $data->responsible_person = $request->responsible_person;
            $data->amount = $request->amount;
            $data->category = $request->category;
            $data->note = $request->note;
            $data->is_active = 1;

            $data->created_by = Auth()->user()->id;
            $data->save();
            DB::commit();

            return back()->with('success', 'Expense Added Successfully');

        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', 'Something is wrong');
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
            'date' => ['required'],
            'amount' => ['required'],
        ]);

        DB::beginTransaction();

        try {
            $data = Expense::find($request->id) ;
            $data->date = $request->date;
            $data->responsible_person = $request->responsible_person;
            $data->amount = $request->amount;
            $data->category = $request->category;
            $data->note = $request->note;
            $data->is_active = 1;

            $data->updated_by = Auth()->user()->id;
            $data->save();
            DB::commit();

            return back()->with('success', 'Expense Updated Successfully');

        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', 'Something is wrong');
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
            $data = Expense::findorFail($id);
            $data->is_active = 0;
            $data->deleted_by = Auth()->user()->id;
            $data->save();
            DB::commit();
            return 'Expense Inactive Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somrthings Went Wrong!';
        }
    }

    public function restore($id)
    {
        DB::beginTransaction();
        try {
            $data = Expense::find($id);
            $data->is_active = 1;
            $data->save();
            DB::commit();
            return 'Expense Activated Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somrthings Went Wrong!';
        }
    }
}
