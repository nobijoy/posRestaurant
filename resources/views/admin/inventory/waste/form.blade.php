<div class="row">

    <div class="form-group col-md-4 ">
        <label for="reference_no">Reference No <span class="text-danger">*</span></label>
        <input type="text" id="reference_no" class="form-control" placeholder="" name="reference_no" value="@if($url == 'waste.edit'){{$data->reference_no}}@else{{old('reference_no')}}@endif" >
    </div>

    <div class="form-group col-md-4 ">
        <label for="date">Date <span class="text-danger">*</span></label>
        <input type="date" id="date" class="form-control" placeholder="" name="date" value="@if($url == 'waste.edit'){{$data->date}}@else{{date('Y-m-d')}}@endif"  required>
    </div>

    <div class="form-group col-md-4 ">
        <label for="res_person">Responsible Person <span class="text-danger">*</span></label>
        <select name="res_person" id="res_person" class="form-control select2">
            <option value="">Select</option>
            @foreach($employees as $employee)
                <option value="{{$employee->id}}" @if(($url == 'waste.edit') && ($data->res_person == $employee->id)) selected @endif">{{$employee->name}}</option>
{{--                <option value="{{$employee->id}}" @if(($url == 'purchase.edit') && ($data->supplier == $type->id)) selected @endif">{{$type->name}}</option>--}}
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-4 ">
        <label for="ingredients">Ingredients <span class="text-danger">*</span> (Only purchased Ingredients are listed)</label>
        <select name="ingredients" id="ingredients" class="form-control select2 select2-hidden-accessible"
        @if($url == 'waste.edit') {{$data->food_menu ? 'disabled' : ''}} @endif>
            <option value="">Select</option>
            @foreach($allIngredients as $type)
                <option value="{{$type->id . '|' .$type->name . ' (' . $type->code . ')' . '|' .$type->unit->name. '|' .$type->price}}">
                    {{$type->name . ' (' . $type->code . ')'}}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-4 ">
        <label for="food_menu">Food Menu</label>
        <select name="food_menu" id="food_menu"  class="form-control select2" @if($url == 'waste.edit') {{!$data->food_menu ? 'disabled' : ''}} @endif>
            <option value="">Select</option>
            @foreach($menus as $menu)
                <option value="{{$menu->id}}" @if(($url == 'waste.edit') && ($data->food_menu == $menu->id)) selected @endif">{{$menu->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-4 pt-2">
        <a href="#" data-toggle="modal" data-target="#read_me" class="btn btn-danger">Read Me First</a>
    </div>

    <div class="form-group col-md-4 ">
        <label for="waste_quantity">Food Menu Waste Quantity <span class="text-danger">*</span></label>
        <input type="number" id="waste_quantity" class="form-control" placeholder="" name="waste_quantity"
               @if($url == 'waste.edit') value="{{$data->waste_quantity}}"  {{$data->food_menu ? 'required' : 'readonly'}} @endif >
    </div>

    <div class="form-group col-md-4 pt-2">
        <button type="button" class="btn btn-icon btn-danger" onclick="deleteTableRow()">Delete</button>
    </div>


</div>
<div class="row">
    <input type="hidden" id="ingredient_count" value="0">
    <input type="hidden" id="ingredient_sl" value="0">
    <div class="form-group col-md-12 ">
        <div class="table-responsive">
            <table class="table table-bordered" id="ingredient_table">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Ingredient(Code)</th>
                    <th>Quantity/Amount</th>
                    <th>Loss Amount</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="ingredient_items">
                @if($url == 'waste.edit' && !empty($data->ingredients))
                    <?php $insl = 0; ?>
                    @foreach(json_decode($data->ingredients) as $key => $igid)
                        @php
                            $ingre = $allIngredients->where('id', $igid)->first();
                        @endphp
                    <tr id="ingredient_row_{{$ingre->id}}">
                        <td id="sl_{{$ingre->id }}"><p>{{++$insl}}</p></td>
                        <td>
                            <input type="hidden" id="ingreadient_id_{{$ingre->id}}" name="ingredient_id[]" value="{{$ingre->id}}">
                            <span id="ingreadient_name_{{$ingre->id}}">{{$ingre->name}} ({{$ingre->code}})</span>
                            </td>
                        <td>
                            <div class="input-group">
                                <input type="number" step="any" class="form-control" onkeyup="lostCost(this)" data-check_id="{{$ingre->id}}"
                                       data-unit_price="{{$ingre->price}}" name="quantity[]" placeholder="Waste Amount/Quantity" aria-describedby="basic-addon_{{$ingre->id}}"
                                       {{$data->food_menu ? 'readonly': 'required'}} value="{{json_decode($data->ingredients_quantity)[$key]}}">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon_{{$ingre->id}}">{{$ingre->unit->name}}</span>
                                    </div>
                                </div>
                            </td>
                        <td>
                            <input type="number" class="form-control total-price" id="loss_amount{{$ingre->id}}" name="loss_amount[]"
                                   value="{{json_decode($data->ingredient_loss)[$key]}}" readonly>
                        </td>
                        <td>
                            <button type="button" title="Delete" class="btn btn-danger {{$data->food_menu ? 'd-none': ''}}" onclick="deleteConsumptionRow(this)"
                                    data-count="{{$ingre->id}}"> <i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">

    <div class="form-group col-md-4 ">
        <label for="total_loss">Total Loss</label>
        <input type="number" id="total_loss" class="form-control " placeholder="" name="total_loss" value="@if($url == 'waste.edit'){{$data->total_loss}}@else{{old('total_loss')}}@endif"  readonly>
    </div>

    <div class="form-group col-md-6 ">
        <label for="note">Note</label>
        <textarea id="note" class="form-control" placeholder="" name="note" rows="3">@if($url == 'waste.edit'){{$data->note}}@else{{old('note')}}@endif</textarea>
    </div>

</div>
