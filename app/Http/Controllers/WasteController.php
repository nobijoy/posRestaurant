<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Ingredient;
use App\Models\IngredientConsumption;
use App\Models\Menu;
use App\Models\Stock;
use App\Models\Waste;
use Illuminate\Http\Request;
use Auth;
use DB;

class WasteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Waste::with(['createdBy','employeeInfo'])->where('is_active', 1)->get()->reverse();
        $sl =0;
        return view('admin.inventory.waste.index', compact('datas', 'sl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::where('is_active', 1)->orderBy('id', 'desc')->get();
        $menus = Menu::where('is_active', 1)->orderBy('id', 'desc')->get();
        $allIngredients = Ingredient::with('unit')->where('is_active', 1)->orderBy('name')->get();
        return view('admin.inventory.waste.create',compact('employees', 'menus', 'allIngredients'));
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
            'reference_no' => ['required'],
            'date' => ['required'],
            'total_loss' => ['required'],
        ]);

//        dd($request->all());

        DB::beginTransaction();

        try {
            $data = new Waste;
            $data->reference_no = $request->reference_no;
            $data->date = $request->date;
            $data->res_person = $request->res_person;
//            $data->ingredients = $request->ingredients;
            $data->food_menu = $request->food_menu ? $request->food_menu :NULL ;
            $data->total_loss = $request->total_loss;
            $data->waste_quantity = $request->waste_quantity;
            $data->note = $request->note;
            $data->ingredients = json_encode($request->ingredient_id);
            $data->ingredients_quantity = json_encode($request->quantity);
            $data->ingredient_loss = json_encode($request->loss_amount);
            $data->is_active = 1;

            $data->created_by = auth()->user()->id;
            $data->save();

            $this->deductStock($request->ingredient_id, $request->quantity_amount);

            DB::commit();

            return back()->with('success', 'New waste added Successfully');

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
        $data = Waste::findorFail($id);
        $employees = Employee::where('is_active', 1)->orderBy('id', 'desc')->get();
        $menus = Menu::where('is_active', 1)->orderBy('id', 'desc')->get();
        $allIngredients = Ingredient::with('unit')->where('is_active', 1)->orderBy('name')->get();
        return view('admin.inventory.waste.edit',compact('employees', 'menus', 'allIngredients','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'reference_no' => ['required'],
            'date' => ['required'],
            'total_loss' => ['required'],
        ]);

        DB::beginTransaction();

        try {
            $data = Waste::findorFail($id);
            $data->reference_no = $request->reference_no;
            $data->date = $request->date;
            $data->res_person = $request->res_person;
//            $data->ingredients = $request->ingredients;
            $data->food_menu = $request->food_menu ? $request->food_menu :NULL ;
            $data->total_loss = $request->total_loss;
            $data->waste_quantity = $request->waste_quantity;
            $data->note = $request->note;
            $data->ingredients = json_encode($request->ingredient_id);
            $data->ingredients_quantity = json_encode($request->quantity);
            $data->ingredient_loss = json_encode($request->loss_amount);
            $data->is_active = 1;

            $data->created_by = auth()->user()->id;
            $data->save();
            DB::commit();

            return back()->with('success', 'Waste updated Successfully');

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
            $data = Waste::findorFail($id);
            $data->is_active = 0;
            $data->deleted_by = Auth()->user()->id;
            $data->save();
            DB::commit();
            return 'Waste item Inactive Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somethings Went Wrong!';
        }
    }

    public function showMenuInfo(Request $request){
        $ingredients = IngredientConsumption::with(['ingredient','ingredient.unit'])->where('menu_id', $request->id)
            ->where('is_active', 1)
            ->orderBy('id', 'desc')
            ->get();
        return json_encode($ingredients);
    }

    public function addStock($ingredients, $amounts){
        if (isset($ingredients)) {
            if (sizeof($ingredients) > 0) {
                foreach ($ingredients as $key => $ingredient) {
                    $stock = new Stock;
                    $stock->ingredient = $ingredient;
                    $stock->stock_quantity = $amounts[$key];
                    $stock->save();
                }
            }
        }
    }
}
