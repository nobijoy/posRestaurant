<div class="row">

{{--    <div class="form-group col-md-6 ">--}}
{{--        <label for="code">Item Code <span class="text-danger">*</span></label>--}}
{{--        <input type="text" id="code" class="form-control" placeholder="Ex:101" name="code"--}}
{{--        @if($url == 'menu.edit') value="{{$data->code}}" @else value="{{old('code')}}" @endif required>--}}
{{--    </div>--}}


    <div class="form-group col-md-6 ">
        <label for="name">Item Name <span class="text-danger">*</span></label>
        <input type="text" id="name" class="form-control" placeholder="Ex:Beef Burger" name="name"
        @if($url == 'menu.edit') value="{{$data->name}}" @else value="{{old('name')}}" @endif required>
    </div>


    <div class="form-group col-md-6 ">
        <label for="category_id">Select Item Category <span class="text-danger">*</span></label>
        <select name="category_id" id="category_id" class="form-control select2" required>
            <option value="">Select</option>
            @foreach ($categories as $type)
                <option value="{{$type->id}}" @if(($url == 'menu.edit') && $data->category_id == $type->id) selected @endif>{{$type->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-6 ">
        <label for="category">Select Sub Category <span class="text-danger">*</span></label>
        <select name="category" id="category" class="form-control select2" required>
            <option value="">Select</option>
            @foreach ($subcategories as $type)
                <option value="{{$type->id}}" @if(($url == 'menu.edit') && $data->category == $type->id) selected @endif>{{$type->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-6 ">
        <label for="ingredient_consumption">Ingredient Consumption <span class="text-danger">*</span></label>
        <select id="ingredient_consumption" class="form-control select2">
            <option value="">Select</option>
            @foreach ($ingredients as $type)
                <option value="{{$type->id . '|' .$type->name . '|' .$type->unit->name}}" >{{$type->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-6 ">
        <a href="#" data-toggle="modal"data-target="#read_me" class="btn btn-danger">Read Me First</a>
    </div>
</div>
<div class="row">
    <input type="hidden" id="ingredient_count" value="0">
    <input type="hidden" id="ingredient_sl" value="0">
    <div class="form-group col-md-12 ">
        <div class="table-responsive">
            <table class="table table-bordered" id="ingredient_consumption_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Ingredient</th>
                        <th>Consumption</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="ingredient_items">
                    @if($url == 'menu.edit')
                        @if (sizeof($consumptionsIngredients) > 0)
                            <?php $ciSl = 0; $array = [];?>
                            @foreach ($consumptionsIngredients as $ckey => $ci)
                            <tr id="ingredient_row_0{{$ci->id}}">
                                <input type="hidden" name="ingredient_consuption_id[]" value="{{$ci->id}}">
                                <td id="sl_0{{$ci->id}}"><p>{{++$ciSl}}</p></td>
                                <td>
                                    <input type="hidden" id="ingreadient_id_0{{$ci->id}}" value="{{$ci->ingredient_id}}"
                                    name="ingredient_id[]" value="'+ingredient_details[0]+'">
                                    <span id="ingreadient_name_'+ingredient_details[0] +'">{{$ci->ingredient->name}}</span>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="consumption[]" value="{{$ci->consumption_amount}}" placeholder="Consumption"
                                        aria-describedby="basic-addon_0{{$ci->id}}" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon_0{{$ci->id}}">{{$ci->ingredient->unit->name}}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" title="Delete" class="btn btn-danger" onclick="deleteData('{{ route('deleteMenuIngredient', [$ci->id]) }}')"
                                    data-count="0{{$ci->id}}"> <i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <?php array_push($array, $ci->id); ?>
                            @endforeach
                        @endif
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">

    <div class="form-group col-md-6 ">
        <label for="price">Sales Price<span class="text-danger">*</span></label>
        <input type="number" id="price" class="form-control phone" placeholder="Ex: 100" name="price"
        @if($url == 'menu.edit') value="{{$data->price}}" @else value="{{old('price')}}" @endif required>
    </div>

    <div class="form-group col-md-6 ">
        <label for="description">Description</label>
        <textarea id="description" class="form-control" name="description" cols="30" rows="1"
        placeholder="Ex:Fried egg, grilled tomato, bacon/mushroom Avocado, mayo on toasted panini">@if($url == 'menu.edit'){{$data->description}}@else{{old('description')}}@endif</textarea>
    </div>

    <div class="form-group col-md-6 ">
        <label for="image">@if($url == 'menu.edit') Change Image @else Image @endif</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>

    <div class="form-group col-md-6 ">
        <label for="is_veg_item">Is Veg Item</label>
        <select name="is_veg_item" id="is_veg_item" class="form-control select">
            <option value="0" @if(($url == 'menu.edit') && $data->is_veg == '0') selected @endif>No</option>
            <option value="1" @if(($url == 'menu.edit') && $data->is_veg == '1') selected @endif>Yes</option>
        </select>
    </div>

    <div class="form-group col-md-6 ">
        <label for="is_beverage_item">Is Beverage</label>
        <select name="is_beverage_item" id="is_beverage_item" class="form-control select">
            <option value="0" @if(($url == 'menu.edit') && $data->is_beverage == '0') selected @endif>No</option>
            <option value="1" @if(($url == 'menu.edit') && $data->is_beverage == '1') selected @endif>Yes</option>
        </select>
    </div>

    <div class="form-group col-md-6 ">
        <label for="is_bar_item">Is Bar Item</label>
        <select name="is_bar_item" id="is_bar_item" class="form-control select">
            <option value="0" @if(($url == 'menu.edit') && $data->is_bar == '0') selected @endif>No</option>
            <option value="1" @if(($url == 'menu.edit') && $data->is_bar == '1') selected @endif>Yes</option>
        </select>
    </div>

{{--    <div class="form-group col-md-6 ">--}}
{{--        <label for="vat">Vat</label>--}}
{{--        <div class="input-group">--}}
{{--            <input type="number" class="form-control phone" name="vat" placeholder="Ex:5" aria-describedby="basic-addon_vat"--}}
{{--            @if($url == 'menu.edit') value="{{$data->vat}}" @else value="{{old('vat')}}" @endif >--}}
{{--            <div class="input-group-append">--}}
{{--                <span class="input-group-text" id="basic-addon_vat">%</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

</div>
