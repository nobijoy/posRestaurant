<?php

namespace App\Http\Controllers;

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
        $categories = MenuCategory::where('is_active', 1)->orderBy('name')->get();
        $datas = Menu::where('is_active', 1)->get()->reverse();
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
        $ingredients = Ingredient::where('is_active', 1)->orderBy('name')->get();
        return view('admin.pos.food_item.create', compact('categories', 'ingredients'));
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
            'name' => ['required', 'unique:menus,name,'.$request->id.',id,category_id,'.$request->category_id],
            'code' => ['required'],
            'category_id' => ['required'],
            'price' => ['required', 'numeric'],
            'price' => ['nullable', 'numeric'],
            'image' => ['nullable', 'numeric'],
        ]);
        // dd($request->all());
        DB::beginTransaction();
        try {
            $data = new Menu;
            $data->name = $request->name;
            $data->code = $request->code;
            $data->category_id = $request->category_id;
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
            $ingredientConsumption = $this->ingredientConsumption($data, $ingredientIds, $consumptions);
            DB::commit();

            return redirect()->route('menu.index')->with('success', 'New Food Item Added Successfully');

        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', $th->getMessage());
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
        $categories = MenuCategory::where('is_active', 1)->orderBy('name')->get();
        $ingredients = Ingredient::where('is_active', 1)->orderBy('name')->get();
        // $subCategories = MenuSubCategory::where('is_active', 1)->where('menu_category_id', $data->subCategory->menu_category_id )->orderBy('name')->get();
        return view('admin.pos.food_item.edit', compact('categories', 'data', 'ingredients'));
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
            'category_id' => ['required'],
            'sub_category_id' => ['required'],
            'name' => ['required', 'unique:menus,name,'.$request->id.',id,menu_sub_category_id,'.$request->sub_category_id],
        ]);

        DB::beginTransaction();

        try {
            $data = Menu::find($id);
            $data->name = $request->name;
            $data->menu_sub_category_id = $request->sub_category_id;
            $data->price = $request->price;
            $data->description = $request->description;
            if($request->file('image')){
                $image = $request->file('image');
                $input = time() . 'image.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('uploads/image');
                $img = Image::make($image->getRealPath());
                $img->orientate();
                $img->resize(180, 120)->save($destinationPath.'/'.$input);
                $destinationPath = public_path('/thumbnail');
                $image->move($destinationPath,$input);
                $data->image = $input;
                $tmpImg = public_path('thumbnail/'.$input);
                if (file_exists($tmpImg)) {
                    unlink($tmpImg);
                }
            }
            $data->is_active = 1;
            $data->updated_by = Auth()->user()->id;
            $data->save();
            DB::commit();

            return back()->with('success', 'Menu Updated Successfully');

        } catch (\Throwable $th) {
            DB::rollback();
//            return back()->with('error', $th->getMessage());
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

    public function ingredientConsumption($menu, $ingredients, $consumptions){
        if (sizeof($ingredients) > 0) {
            foreach ($ingredients as $key => $ingredient) {
                $consumption  = new IngredientConsumption;
                $consumption->ingredient_id = $ingredient;
                $consumption->menu_id = $menu->id;
                $consumption->consumption_amount = $consumptions[$key];
                $consumption->is_active = 1;
                $consumption->created_by = Auth()->user()->id;
                $consumption->save();
            }
        }
        return 1;
    }

}
