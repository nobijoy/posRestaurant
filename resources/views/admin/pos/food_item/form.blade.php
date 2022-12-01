<div class="row">

    <div class="form-group col-md-6 ">
        <label for="name">Item Name <span class="text-danger">*</span></label>
        <input type="text" id="name" class="form-control" placeholder="Ex:Beef Burger" name="name" value=""  required>
    </div>

    <div class="form-group col-md-6 ">
        <label for="code">Item Code <span class="text-danger">*</span></label>
        <input type="text" id="code" class="form-control" placeholder="Ex:101" name="code" value=""  required>
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
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">

    <div class="form-group col-md-6 ">
        <label for="price">Sales Price<span class="text-danger">*</span></label>
        <input type="number" id="price" class="form-control phone" placeholder="Ex: 100" name="price" value=""  required>
    </div>

    <div class="form-group col-md-6 ">
        <label for="description">Description</label>
        <textarea id="description" class="form-control" name="description" cols="30" rows="1"
        placeholder="Ex:Fried egg, grilled tomato, bacon/mushroom Avocado, mayo on toasted panini"></textarea>
    </div>

    <div class="form-group col-md-6 ">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>

    <div class="form-group col-md-6 ">
        <label for="is_veg_item">Is Veg Item</label>
        <select name="is_veg_item" id="is_veg_item" class="form-control select">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>
    </div>

    <div class="form-group col-md-6 ">
        <label for="is_beverage_item">Is Beverage</label>
        <select name="is_beverage_item" id="is_beverage_item" class="form-control select">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>
    </div>

    <div class="form-group col-md-6 ">
        <label for="is_bar_item">Is Bar Item</label>
        <select name="is_bar_item" id="is_bar_item" class="form-control select">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>
    </div>

    <div class="form-group col-md-6 ">
        <label for="vat">Vat</label>
        <div class="input-group">
            <input type="number" class="form-control phone" name="vat" placeholder="vat" aria-describedby="basic-addon_vat">
            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon_vat">%</span>
            </div>
        </div>
    </div>

</div>
