<div class="row">

    <div class="form-group col-md-6 ">
        <label for="name">Item Name <span class="text-danger">*</span></label>
        <input type="text" id="name" class="form-control" placeholder="Item Name" name="name" value=""  required>
    </div>

    <div class="form-group col-md-6 ">
        <label for="price">Sales Price<span class="text-danger">*</span></label>
        <input type="number" id="price" class="form-control" placeholder="price" name="price" value=""  >
    </div>

    <div class="form-group col-md-6 ">
        <label for="ingredient_consumption">Ingredient Consumption</label>
        <select name="ingredient_consumption" id="ingredient_consumption" class="form-control select2">
            <option value="">Select</option>
            <option value="1" >Ingredient 1</option>
            <option value="2" >Ingredient 2</option>
        </select>
    </div>

    <div class="form-group col-md-6 pt-2">
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
        <label for="description">Description<span class="text-danger">*</span></label>
        <textarea id="description" class="form-control" placeholder="Description" name="description" cols="30" rows="1"></textarea>
    </div>

    <div class="form-group col-md-6 ">
        <label for="cgst">CGST<span class="text-danger">*</span></label>
        <input type="number" id="cgst" class="form-control" placeholder="" name="cgst" value="">
    </div>

    <div class="form-group col-md-6 ">
        <label for="sgst">SGST<span class="text-danger">*</span></label>
        <input type="number" id="sgst" class="form-control" placeholder="" name="sgst" value=""  >
    </div>

</div>
