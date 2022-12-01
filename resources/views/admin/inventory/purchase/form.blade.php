<div class="row">

    <div class="form-group col-md-4 ">
        <label for="reference_no">Reference No <span class="text-danger">*</span></label>
        <input type="text" id="reference_no" class="form-control" placeholder="" name="reference_no" value=""  required>
    </div>

    <div class="form-group col-md-4 ">
        <label for="supplier">Supplier <span class="text-danger">*</span></label>
        <input type="text" id="supplier" class="form-control" placeholder="" name="supplier" value=""  required>
    </div>

    <div class="form-group col-md-4 ">
        <label for="date">Date <span class="text-danger">*</span></label>
        <input type="date" id="date" class="form-control" placeholder="" name="date" value=""  required>
    </div>

    <div class="form-group col-md-4 ">
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
                        <th>Ingredient(Code)</th>
                        <th>Unit Price</th>
                        <th>Quantity/Amount</th>
                        <th>Total</th>
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
    <div class = "col-md-9">

    </div>
    <div class="col-md-3">
        <div class="form-group col-md-12 ">
            <label for="g_total">G.Total <span class="text-danger">*</span></label>
            <input type="number" id="g_total" class="form-control" placeholder="" name="g_total" value="" readonly >
        </div>

        <div class="form-group col-md-12 ">
            <label for="paid">Paid <span class="text-danger">*</span></label>
            <input type="number" id="paid" class="form-control" placeholder="" name="paid" value=""  >
        </div>

        <div class="form-group col-md-12  ">
            <label for="due">Due</label>
            <input type="number" id="due" class="form-control" placeholder="" name="due" value="" readonly >
        </div>
    </div>


</div>
