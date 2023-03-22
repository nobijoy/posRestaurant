
    @if(sizeof($orders) > 0)
        @foreach ($orders as $order)
            <div class="border-black bg-light-grey-blue mb-1 p-1 line-height-1 rounded">
                <span>Cust: {{$order->customer ?  $order->customerInfo->name : ''}}</span><br>
                <span>Order Id: {{$order->reference_no}}</span><br>
                <span>Order Type: {{$order->order_type}}</span><br>
                <span>Table: {{$order->table}}</span><br>
                <span>Waiter: {{$order->waiter ?  $order->waiterInfo->name : ''}}</span>
            </div>
        @endforeach
    @endif
