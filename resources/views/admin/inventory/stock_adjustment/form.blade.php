<div class="row">

    <div class="form-group col-md-4 ">
        <label for="reference_no">Reference No <span class="text-danger">*</span></label>
        <input type="text" id="reference_no" class="form-control" placeholder="" name="reference_no" value=""  required>
    </div>

    <div class="form-group col-md-4 ">
        <label for="date">Date <span class="text-danger">*</span></label>
        <input type="date" id="date" class="form-control" placeholder="" name="date" value=""  required>
    </div>

    <div class="form-group col-md-4 ">
        <label for="res_person">Responsible Person</label>
        <select name="res_person" id="res_person" class="form-control select2">
            <option value="">Select</option>
            <option value="1" >Admin</option>
            <option value="2" >Admin User</option>
        </select>
    </div>

    <div class="form-group col-md-4 ">
        <label for="ingredient_consumption">Ingredients</label>
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
                    <th>Ingredient(Code)</th>
                    <th>Quantity/Amount</th>
                    <th>Consumption Status</th>
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
        <label for="note">Note<span class="text-danger">*</span></label>
        <textarea id="note" class="form-control" placeholder="" name="note" cols="30" rows="1"></textarea>
    </div>

</div>
