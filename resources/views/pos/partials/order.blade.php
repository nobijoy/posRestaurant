
    @if(sizeof($orders) > 0)
        @foreach ($orders as $order)
            <div class="border-black bg-light-grey-blue mb-1 line-height-1 rounded order " onclick="getOrderInfo({{ $order->id }})">
                <span class="m-0 p-0">Payment Status: <span class="badge {{$order->payment_status == "Paid" ? 'badge-success' : 'badge-danger'}} badge-success round">{{$order->payment_status}}</span></span><br>
                <span>Cust: {{$order->customer ?  $order->customerInfo->name : ''}}</span><br>
                <span>Order Id: {{$order->reference_no}}</span><br>
                <span>Order Type: {{$order->order_type}}</span><br>
                <span>Table: {{$order->table}}</span><br>
                <span>Waiter: {{$order->waiter ?  $order->waiterInfo->name : ''}}</span>
                @if($order->payment_status == "Unpaid")
                <button class="btn btn-sm btn-success d-block" onclick="payOrder({{$order->id}},{{$order->total}})">Pay Now</button>
                @endif
            </div>
        @endforeach
    @endif
