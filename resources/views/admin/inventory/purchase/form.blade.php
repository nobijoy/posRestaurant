<div class="row">

    <div class="form-group col-md-4 ">
        <label for="reference_no">Receipt No <span class="text-danger">*</span></label>
        <input type="number" id="reference_no" class="form-control" placeholder="" name="reference_no"
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
        <label for="payment_method">Payment Methods <span class="text-danger">*</span></label>
        <select name="payment_method" id="payment_method" class="form-control select2">
            <option value="">Select</option>
            <option value="cash">Cash</option>
            <option value="bkash">Bkash</option>
            <option value="nagad">Nagad</option>
            <option value="rocket">Rocket</option>
            <option value="credit">Credit </option>
            <option value="debit">Debit</option>
            <option value="check">Check</option>
            <option value="bank_transfer">Bank Transfer</option>
        </select>
    </div>

    <div class="form-group col-md-4 ">
        <label for="date">Date <span class="text-danger">*</span></label>
        <input type="date" id="date" class="form-control" placeholder="" name="date"
               @if($url == 'purchase.edit') value="{{date('Y-m-d', strtotime($data->date))}}" @else value="{{old('date')}}" @endif  required>
    </div>

    <div class="form-group col-md-4 ">
        <label for="ingredient">Ingredient <span class="text-danger">*</span></label>
        <select id="ingredient" class="form-control select2">
            <option value="">Select</option>
            @foreach ($ingredients as $type)
                <option value="{{$type->id . '|' .$type->name . '|' .$type->unit->name . '|' .$type->code. '|' .$type->price}}" >{{$type->name}} ({{$type->code}})</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-4 pt-2">
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
                    @if($url == 'purchase.edit')
                        @if (sizeof($purchase_ingredient) > 0)
                            <?php $ciSl = 0; $array = [];?>
                            @foreach ($purchase_ingredient as $ckey => $ci)
                                <tr id="ingredient_row_{{$ci->id}}">
                                    <input type="hidden" name="purchase_ingredient_id[]" value="{{$ci->id}}">
                                    <td id="sl_{{$ci->id}}"><p>{{++$ciSl}}</p></td>
                                    <td>
                                        <input type="hidden" id="ingreadient_id_{{$ci->id}}" name="ingredient_id[]" value="{{$ci->ingredient_id}}">
                                        <span id="ingreadient_name_{{$ci->ingredient_id}}">{{$ci->ingredient->name}} </span>
                                        </td>
                                    <td>
                                        <input type="text" class="form-control" name="unit_price[]" placeholder="unit_price" value="{{$ci->unit_price}}" required
                                        onKeyup="subTotal(this)" data-for="{{$ci->ingredient_id}}" id ="unit-price_{{$ci->ingredient_id}}">
                                        </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="quantity_amount[]" value="{{$ci->quantity_amount}}" placeholder="Quantity/Amount" aria-describedby="basic-addon_{{$ci->ingredient_id}}"
                                            required onKeyup="subTotal(this)" data-for="{{$ci->ingredient_id}}" id="amount_{{$ci->ingredient_id}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon_{{$ci->ingredient_id}}">{{$ci->ingredient->unit->name}}</span>
                                                </div>
                                            </div>
                                        </td>
                                    <td>
                                        <input type="text" class="form-control total-price" name="total_price[]" id="total_price_{{$ci->ingredient_id}}" placeholder="total_price" value="{{$ci->total}}" readonly>
                                        </td>
                                    <td>
                                        <button type="button" title="Delete" class="btn btn-danger" onclick="deleteData('{{ route('deletePurchaseIngredient', [$ci->id]) }}')" data-count="{{$ci->ingredient_id}}"> <i class="fa fa-trash"></i></button>
                                        </td>
                                </tr>
                            @endforeach
                        @endif
                    @endif

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
            <input type="number" id="g_total" class="form-control" placeholder="" name="g_total" @if($url == 'purchase.edit') value="{{$data->totalPurchaseCost()}}"@else  value="{{old('g_total')}}" @endif readonly >
        </div>

        <div class="form-group col-md-12 ">
            <label for="paid">Paid</label>
            <input type="number" id="paid" class="form-control" min="0.01" step="0.01" placeholder="Enter Paid Amount" name="paid" @if($url == 'purchase.edit') value="{{$data->paid}}"@else  value="{{old('paid')}}" @endif  >
        </div>

        <div class="form-group col-md-12  ">
            <label for="due">Due</label>
            <input type="number" id="due" class="form-control" placeholder="" name="due" @if($url == 'purchase.edit') value="{{$data->totalPurchaseCost() - $data->paid}}"@else  value="{{old('due')}}" @endif readonly >
        </div>
    </div>

</div>
