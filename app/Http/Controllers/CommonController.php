<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Ingredient;
use App\Models\MenuSubCategory;
use App\Models\Purchase;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function getSubCatAgainstCat(Request $request){
        $datas = MenuSubCategory::where('category', $request->id)->where('is_active', 1)->get();

        return json_encode($datas);
    }
    public function getDegAgainstDept(Request $request){
        $datas = Designation::where('department', $request->id)->where('is_active', 1)->orderBy('name')->get();

        return json_encode($datas);
    }
    public function getIngrerdientInfoById(Request $request){
        $data = Ingredient::find($request->id);
        return json_encode($data);
    }

    public function getReceiptBySupplier(Request $request){
        $datas = Purchase::where('supplier', $request->id)->where('due','>', 0)->get();
        return json_encode($datas);
    }

    public function getDueFromReceipt(Request $request){
        $data = Purchase::where('reference_no', $request->reciept_no)->firstOrFail();
//        dd($data->due);
        return json_encode($data->due);
    }
}
