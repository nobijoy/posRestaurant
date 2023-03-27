


        <div>
            <table align="center" style="font-size: 12px; width: fit-content">
                <tr>
                    <td>
                        <div style="display: flex; justify-content: center">
                            <img src="{{asset('public/uploads/image/1678164462logo.png')}}" height="30px" width="30px">
                        </div>

                        <p style="text-align: center; margin: 0; font-weight: bold">Bangladesh Parjatan Corporation</p>
                        <p style="text-align: center; margin: 0;">E-5, C, 1 W Agargaon, Dhaka 1207</p>
                        <p style="text-align: center; margin: 0;">TIN: 423424234</p>
                        <p style="text-align: center; margin: 0;">Mobile: 0193453453</p>
                        <p>Bill No: 4678679789</p>

                        <hr>
                        <div style="float: left; width: 50%;">
                            <p>Name : {{$order->customer ?  $order->customerInfo->name : ''}}</p>
                            <p>Phone : {{$order->customer ?  $order->customerInfo->phone : ''}}</p>
                        </div>
                        <div style="float: right; width: 50%;">
                            <p>Date : {{ date('Y-m-d')}}</p>
                            <p>Payment Type : {{$order->payment_method ?  $order->paymentMethod->name : ''}}</p>
                        </div>

                        <p style="margin-bottom:20px;"><strong>Order Details</strong></p>
                        <hr>
                        <table style="font-size: 12px; width: 100%; margin: 0">
                            <thead style="font-weight: bold">
                                <tr>
                                    <th class="text-left">Item</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                @foreach(json_decode($order->order_details) as $order_detail)
                                    <tr>
                                        <td align="left">{{$order_detail->menu}}</td>
                                        <td align="center">{{$order_detail->price}}</td>
                                        <td align="center">{{$order_detail->qty}}</td>
                                        <td align="right">{{$order_detail->amount}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>

                        <div style="margin: 3px 3px;">
                            <div style="float: left; width: 50%;">
                                <p>Sub Total:</p>
                                <p>VAT: </p>
                                <p>Discount: </p>
                                <p>Charge: </p>
                                <p>Grand Total: </p>
                            </div>
                            <div style="float: right; width: 50%; text-align: right">
                                <p>{{$order->subtotal}}</p>
                                <p>{{$order->vat}}</p>
                                <p>{{$order->discount}}</p>
                                <p>{{$order->charge}}</p>
                                <p>{{$order->total}}</p>
                            </div>
                        </div>
                        <p><span style="font-weight: bold">Your Special Request:</span> </p>
                        <p style="font-style: italic;">Note: If you have any feedback you can reach us via email: ,
                            or phone:   </p>
                        <p style="">Thank You For Visiting</p>
                    </td>
                </tr>
            </table>
        </div>
