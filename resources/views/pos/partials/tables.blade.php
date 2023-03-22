<div class="row">
    @foreach($tables as $table)
        <div class="col-md-3 ">
            <div class="card">
                <div class="card-content box-shadow-1 rounded">
                    @if($table->reserved == 0)
                        <img class="img-fluid" alt="not booked" src="{{ asset ('public/uploads/image/no_booked.png') }}" >
                    @else
                        <img class="img-fluid" alt="reserved" src="{{ asset ('public/uploads/image/reserved.png') }}" >
                    @endif
                    <div class="card-body p-0 text-center">
                        <p class="mb-0">Table No: {{$table->name}}</p>
                        <p class="mb-0">Seat Capacity: {{$table->seat_capacity}}</p>
                        <div class="row justify-content-center mb-1">
                            <div class="col-md-6 mx-auto">
                                <button type="btn" class="btn btn-success" {{$table->reserved == 1 ? 'disabled' : '' }}
                                onclick="loadTableData('{{ route('reserveTable', [$table->id]) }}', this)" data-reserve_table_id="{{$table->id}}">Reserve</button>
                            </div>
                            <div class="col-md-6 mx-auto">
                                <button type="btn" class="btn btn-danger" {{$table->reserved == 0 ? 'disabled' : '' }}
                                onclick="changeTableStatus('{{ route('clearTable', [$table->id]) }}', this)" data-clear_table_id="{{$table->id}}">Clear</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
