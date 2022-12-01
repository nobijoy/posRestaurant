<?php

namespace App\Http\Controllers;

use App\Models\MenuSubCategory;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function getSubCatAgainstCat(Request $request){
        $datas = MenuSubCategory::where('menu_category_id', $request->id)->where('is_active', 1)->get();

        return json_encode($datas);
    }
}
