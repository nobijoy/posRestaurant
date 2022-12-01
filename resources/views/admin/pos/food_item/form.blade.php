<div class="row">

    <div class="form-group col-md-6 ">
        <label for="name">Item Name <span class="text-danger">*</span></label>
        <input type="text" id="name" class="form-control" placeholder="Item Name" name="name" value=""  required>
    </div>

    <div class="form-group col-md-6 ">
        <label for="code">Item Code <span class="text-danger">*</span></label>
        <input type="text" id="code" class="form-control" placeholder="CD01" name="code" value=""  required>
    </div>

    <div class="form-group col-md-6 ">
        <label for="category_id">Select Item Category</label>
        <select name="category_id" id="category_id" class="form-control select2">
            <option value="">Select</option>
                <option value="1" selected>1</option>
                <option value="2" selected>2</option>
        </select>
    </div>

    <div class="form-group col-md-6 ">
        <label for="ingredient_consumption">Ingredient Consumption</label>
        <select name="ingredient_consumption" id="ingredient_consumption" class="form-control select2">
            <option value="">Select</option>
            <option value="1" >Ingredient 1</option>
            <option value="2" >Ingredient 2</option>
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
            <table class="table table-bordered" id="">
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
        <input type="number" id="price" class="form-control" placeholder="price" name="price" value=""  >
    </div>

    <div class="form-group col-md-6 ">
        <label for="description">Description<span class="text-danger">*</span></label>
        <textarea id="description" class="form-control" placeholder="Description" name="description" cols="30" rows="1"></textarea>
    </div>

    <div class="form-group col-md-6 ">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>

    <div class="form-group col-md-6 ">
        <label for="is_veg_item">Is Veg Item</label>
        <select name="is_veg_item" id="is_veg_item" class="form-control select2">
            <option value="">Select</option>
            <option value="1" selected>Yes</option>
            <option value="2" selected>No</option>
        </select>
    </div>

    <div class="form-group col-md-6 ">
        <label for="is_beverage_item">Is Beverage</label>
        <select name="is_beverage_item" id="is_beverage_item" class="form-control select2">
            <option value="">Select</option>
            <option value="1" selected>Yes</option>
            <option value="2" selected>No</option>
        </select>
    </div>

    <div class="form-group col-md-6 ">
        <label for="is_bar_item">Is Bar Item</label>
        <select name="is_bar_item" id="is_bar_item" class="form-control select2">
            <option value="">Select</option>
            <option value="1" selected>Yes</option>
            <option value="2" selected>No</option>
        </select>
    </div>

    <div class="form-group col-md-6 ">
        <label for="vat">Vat<span class="text-danger">*</span></label>
        <input type="number" id="vat" class="form-control" placeholder="vat" name="vat" value=""  >
    </div>

</div>
