


        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p>Order Type: {{$order->order_type}}</p>
                    <p>Waiter: {{$order->waiter ?  $order->waiterInfo->name : ''}}</p>
                </div>
                <div class="col-md-4">
                    <p>Customer: {{$order->customer ?  $order->customerInfo->name : ''}}</p>
                    <p>Table: {{$order->table}}</p>
                </div>
                <div class="col-md-4">
                    <p>Order Number: {{$order->reference_no}}</p>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 ">
                        <table class="table" >
                            <thead class="text-center">
                            <tr>
                                <th width="50%">Item</th>
                                <th width="20%">Price</th>
                                <th width="10%">Quantity</th>
                                <th width="20%">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(json_decode($order->order_details) as $order_detail)
                                <tr>
                                    <td class="border-0 text-center">
                                        <span>{{$order_detail->menu}}</span>
                                    </td>
                                    <td class="border-0 text-center">
                                        <span>{{$order_detail->price}}</span>
                                    </td>
                                    <td class="border-0 text-center">
                                        <span>{{$order_detail->qty}}</span>
                                    </td>
                                    <td class="border-0 text-center">
                                        <span>{{$order_detail->amount}}</span>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card-footer pt-1">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table text-right" id="" >
                            <tbody id="order_footer" >
                            <tr>
                                <td class="border-0" width="50%">Subtotal</td>
                                <td class="border-0" width="50%">BDT
                                    <input type="text" class="phone text-right border-0" id="sub_total_amount" readonly value="{{$order->subtotal}}">
                                </td>
                            </tr>
                            <tr>
                                <td class="border-0" width="50%">VAT</td>
                                <td class="border-0" width="50%">BDT
                                    <input type="text" class="phone text-right border-0" id="vat" readonly value="{{$order->vat}}">
                                </td>
                            </tr>
                            <tr>
                                <td class="border-0" width="50%">Discount</td>
                                <td class="border-0" width="50%">BDT
                                    <input type="number" class="phone text-right border-0" readonly id="discount" value="{{$order->discount}}">
                                </td>
                            </tr>
                            <tr>
                                <td class="border-0" width="50%">Charge</td>
                                <td class="border-0" width="50%">BDT
                                    <input type="text" class="phone text-right border-0" id="charge" readonly value="{{$order->charge}}">
                                </td>
                            </tr>
                            <tr class="font-weight-bold">
                                <td class="border-0" width="50%">Total</td>
                                <td class="border-0" width="50%">BDT
                                    <input type="number" class="phone text-right border-0 font-weight-bold" id="grand_total" value="{{$order->total}}" readonly>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
