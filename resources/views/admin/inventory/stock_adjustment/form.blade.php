<div class="row">

{{--    <div class="form-group col-md-4 ">--}}
{{--        <label for="reference_no">Reference No <span class="text-danger">*</span></label>--}}
{{--        <input type="text" id="reference_no" class="form-control" placeholder="" name="reference_no" value=""  required>--}}
{{--    </div>--}}

{{--    <div class="form-group col-md-4 ">--}}
{{--        <label for="date">Date <span class="text-danger">*</span></label>--}}
{{--        <input type="date" id="date" class="form-control" placeholder="" name="date" value=""  required>--}}
{{--    </div>--}}

    <div class="form-group col-md-4 ">
        <label for="action">Action</label>
        <select name="action" id="action" class="form-control select2" required>
            <option value="">Select</option>
            <option value="add" >Add to Stock</option>
            <option value="remove" >Remove from Stock</option>
            <option value="kitchen" >Send to Kitchen</option>
        </select>
    </div>

    <div class="form-group col-md-4 ">
        <label for="ingredients">Ingredients <span class="text-danger">*</span></label>
        <select name="ingredients" id="ingredients" class="form-control select2">
            <option value="">Select</option>
            @foreach($ingredients as $ingredient)
                <option value="{{$ingredient->id}}" >{{$ingredient->name}}</option>
            @endforeach
        </select>
    </div>

{{--    <div class="form-group col-md-6 pt-2">--}}
{{--        <a href="#" data-toggle="modal"data-target="#read_me" class="btn btn-danger">Read Me First</a>--}}
{{--    </div>--}}

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
{{--                    <th>Consumption Status</th>--}}
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="ingredient_items">

                </tbody>
            </table>
        </div>
    </div>
</div>
{{--<div class="row">--}}

{{--    <div class="form-group col-md-6 ">--}}
{{--        <label for="note">Note<span class="text-danger">*</span></label>--}}
{{--        <textarea id="note" class="form-control" placeholder="" name="note" rows="3"></textarea>--}}
{{--    </div>--}}

{{--</div>--}}
