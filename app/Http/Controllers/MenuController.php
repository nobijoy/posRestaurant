<?php

namespace App\Http\Controllers;

use App\Models\MenuSubCategory;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\MenuCategory;
use App\Models\Ingredient;
use App\Models\Menu;
use App\Models\IngredientConsumption;
use Image;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = MenuSubCategory::where('is_active', 1)->orderBy('name')->get();
        $datas = Menu::with(['categoryInfo'])->where('is_active', 1)->get()->reverse();
        $sl = 0;
        return view('admin.pos.food_item.index', compact('categories', 'datas', 'sl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = MenuCategory::where('is_active', 1)->orderBy('name')->get();
        $subcategories = MenuSubCategory::where('is_active', 1)->orderBy('name')->get();
        $ingredients = Ingredient::with(['unit'])->where('is_active', 1)->orderBy('name')->get();
        return view('admin.pos.food_item.create', compact('categories', 'ingredients', 'subcategories'));
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
            'name' => ['required', 'unique:menus,name,'.$request->id],
            'category' => ['required'],
            'price' => ['required', 'numeric'],
            'vat' => ['nullable', 'numeric'],
            'image' => ['nullable', 'mimes:jpg,bmp,png'],
        ]);

        DB::beginTransaction();
        try {
            $code = 1001 + Menu::count();

            $data = new Menu;
            $data->name = $request->name;
            $data->code = strtoupper($code);
            $data->category = $request->category_id;
            $data->price = $request->price;
            $data->vat = $request->vat ? $request->vat : 0;
            $data->description = $request->description;
            if($request->file('image')){
                $image = $request->file('image');
                $input = time() . 'image.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('uploads/image');
                $image->move($destinationPath,$input);
                $data->image = $input;
            }
            $data->is_veg = $request->is_veg_item;
            $data->is_bev = $request->is_beverage_item;
            $data->is_bar = $request->is_bar_item;
            $data->is_active = 1;
            $data->created_by = Auth()->user()->id;
            $data->save();

            $ingredientIds = $request->ingredient_id;
            $consumptions = $request->consumption;
            $einconids = $request->ingredient_consuption_id;
            $ingredientConsumption = $this->ingredientConsumption($data, $einconids, $ingredientIds, $consumptions);
            DB::commit();

            return redirect()->route('menu.index')->with('success', 'New Food Item Added Successfully');

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
    public function edit($id, $name)
    {
        $data = Menu::findorFail($id);
        $categories  = MenuCategory::where('is_active', 1)->orderBy('name')->get();
        $subcategories = MenuSubCategory::where('is_active', 1)->orderBy('name')->get();
        $ingredients = Ingredient::with(['unit'])->where('is_active', 1)->orderBy('name')->get();
        $consumptionsIngredients = IngredientConsumption::with(['ingredient','ingredient.unit'])->where('menu_id', $id)->where('is_active', 1)->get();
        $conIds = [];
        foreach ($consumptionsIngredients as $key => $value) {
            array_push($conIds, strval($value->ingredient_id));
        }

        return view('admin.pos.food_item.edit', compact('subcategories', 'data', 'ingredients', 'consumptionsIngredients', 'conIds','categories'));
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
            'name' => ['required', 'unique:menus,name,'.$id.',id,category,'.$request->category_id],
            'category' => ['required'],
            'price' => ['required', 'numeric'],
            'vat' => ['nullable', 'numeric'],
            'image' => ['nullable', 'mimes:jpg,bmp,png'],
        ]);

        DB::beginTransaction();

        try {
            $data = Menu::find($id);
            $data->name = $request->name;
            $data->code = $request->code;
            $data->category = $request->category_id;
            $data->price = $request->price;
            $data->vat = $request->vat ? $request->vat : 0;
            $data->description = $request->description;
            if($request->file('image')){
                $image = $request->file('image');
                $input = time() . 'image.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('uploads/image');
                $image->move($destinationPath,$input);
                $data->image = $input;
            }
            $data->is_veg = $request->is_veg_item;
            $data->is_bev = $request->is_beverage_item;
            $data->is_bar = $request->is_bar_item;
            $data->is_active = 1;
            $data->created_by = Auth()->user()->id;
            $data->save();

            $ingredientIds = $request->ingredient_id;
            $consumptions = $request->consumption;
            $einconids = $request->ingredient_consuption_id;
            $ingredientConsumption = $this->ingredientConsumption($data, $einconids, $ingredientIds, $consumptions);
            DB::commit();

            return back()->with('success', 'Menu Updated Successfully');

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
            $data = Menu::findorFail($id);
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

    public function deleteMenuIngredient($id)
    {
        DB::beginTransaction();
        try {
            $data = IngredientConsumption::findorFail($id);
            $data->is_active = 0;
            DB::commit();
            return 'Menu Ingredient Item Deleted Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somethings Went Wrong!';
        }
    }

    public function restore($id)
    {
        DB::beginTransaction();
        try {
            $data = Menu::find($id);
            $data->is_active = 1;
            $data->save();
            DB::commit();
            return 'Menu Activated Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somethings Went Wrong!';
        }
    }

    public function ingredientConsumption($menu, $einconids, $ingredients, $consumptions){
        if (isset($ingredients)) {
            foreach ($ingredients as $key => $ingredient) {
                if ($einconids[$key]) {
                    $consumption  = IngredientConsumption::find($einconids[$key]);
                    $consumption->updated_by = Auth()->user()->id;
                }else{
                    $consumption  = new IngredientConsumption;
                    $consumption->created_by = Auth()->user()->id;
                }
                $consumption->ingredient_id = $ingredient;
                $consumption->menu_id = $menu->id;
                $consumption->consumption_amount = $consumptions[$key];
                $consumption->is_active = 1;
                $consumption->save();
            }
        }
        return 1;
    }

    public function getMenus(){
        $menuCats = MenuCategory::where('is_active', 1)->get();
        $menuSubCats = MenuSubCategory::where('is_active', 1)->get();
        $menus = Menu::where('is_active', 1)->get();

        foreach ($menus as $menu) {
            $menu->image_url = 'http://localhost:9000/uploads/image/' . $menu->image;
        }

        $data =[
            'menuCats' => $menuCats,
            'menuSubCats' => $menuSubCats,
            'menus' => $menus
        ];

        return response()->json($data);

    }

}
