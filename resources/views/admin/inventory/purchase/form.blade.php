<div class="row">

    <div class="form-group col-md-4 ">
        <label for="reference_no">Reference No <span class="text-danger">*</span></label>
        <input type="text" id="reference_no" class="form-control" placeholder="" name="reference_no"
               @if($url == 'purchase.edit') value="{{$data->reference_no}}" @else value="{{old('reference_no')}}" @endif required>
    </div>

    <div class="form-group col-md-4 ">
        <label for="supplier">Supplier <span class="text-danger">*</span></label>
        <select name="supplier" id="supplier" class="form-control select2">
            <option value="">Select</option>
            @foreach($suppliers as $type)
                <option value="{{$type->id}}" @if(($url == 'purchase.edit') && ($data->supplier == $type->id)) selected @endif">{{$type->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-4 ">
        <label for="date">Date <span class="text-danger">*</span></label>
        <input type="date" id="date" class="form-control" placeholder="" name="date"
               @if($url == 'purchase.edit') value="{{date('Y-m-d', strtotime($data->date))}}" @else value="{{old('date')}}" @endif  required>
    </div>

    <div class="form-group col-md-6 ">
        <label for="ingredient">Ingredient <span class="text-danger">*</span></label>
        <select id="ingredient" class="form-control select2">
            <option value="">Select</option>
            @foreach ($ingredients as $type)
                <option value="{{$type->id . '|' .$type->name . '|' .$type->unit->name . '|' .$type->code. '|' .$type->price}}" >{{$type->name}} ({{$type->code}})</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-6 pt-2">
        <a href="#" data-toggle="modal" data-target="#read_me" class="btn btn-danger">Read Me First</a>
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
        <div class="form-group col-md-6 ">
            <label for="note">Note</label>
            <textarea id="note" class="form-control" name="note" rows="4" placeholder="Enter notes here..." >@if($url == 'purchase.edit'){{$data->note}}@else{{old('note')}}@endif</textarea>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group col-md-12 ">
            <label for="g_total">G.Total <span class="text-danger">*</span></label>
            <input type="number" id="g_total" class="form-control" placeholder="" name="g_total" @if($url == 'purchase.edit') value="{{$data->totalPurchaseCost()}}}"@else  value="{{old('g_total')}}" @endif readonly >
        </div>

        <div class="form-group col-md-12 ">
            <label for="paid">Paid</label>
            <input type="number" id="paid" class="form-control" min="0.01" step="0.01" placeholder="Enter Paid Amount" name="paid" @if($url == 'purchase.edit') value="{{$data->totalPurchaseCost()-$data->totalDueAmount()}}}"@else  value="{{old('paid')}}" @endif  >
        </div>

        <div class="form-group col-md-12  ">
            <label for="due">Due</label>
            <input type="number" id="due" class="form-control" placeholder="" name="due" @if($url == 'purchase.edit') value="{{$data->totalDueAmount()}}}"@else  value="{{old('due')}}" @endif readonly >
        </div>
    </div>

</div>
