@extends('master.admin.master')
@section('title')
    Kitchen Dashboard
@endsection

@section('body')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
            </div>
        </div>
        <div class="content-body">
                <div class="col-md-12">
            <div class="row">

                    @if(sizeof($orders) > 0)
                        @foreach ($orders as $order)
                            <div class="col-xl-2 col-md-3 col-sm-12 ">
                                <div class="card bg-primary text-white font-weight-bold">
                                    <div class="card-content box-shadow-1 rounded">
                                        <div class="card-body p-0 text-center pb-1">
                                            <span>Order Id: {{$order->reference_no}}</span><br>
                                            <span>Order Type: {{$order->order_type}}</span><br>
                                            <hr>
                                            @foreach(json_decode($order->order_details) as $order_detail)
                                                <span>{{$order_detail->menu}}:</span>
                                                <span>{{$order_detail->qty}}</span><br>
                                            @endforeach
                                            <button class="btn btn-success btn-sm" onclick="completeOrder('{{ route('orderCompleted', [$order->id]) }}')">Complete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        function completeOrder(url) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _method: 'POST',
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // handle error here
                }
            });
        }
    </script>
@endsection
