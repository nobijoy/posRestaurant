<select name="customer_list" id="customer_list" class="form-control select2" required>
    <option value="" selected> Select Customer</option>
    @foreach ($customers as $type)
        <option value="{{$type->id}}" >{{$type->name}} ( {{$type->phone}} )</option>
    @endforeach
</select>
