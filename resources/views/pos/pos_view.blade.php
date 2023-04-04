

    <section class="">
{{--        <form action="{{ route('posOrder') }}" method="post">@csrf--}}
        <div class="row ">
           {{-- running order card start --}}
            <div class="col-md-2 item_card main-left-p1 main-card">
                <div class="row card ">
                    <div class="card-header py-0">
                        <div class="row my-1">
                            <div class="col-6 mx-auto">
                                <a href="Javascript:void(0)" class="btn w-100 bg-light-grey-blue btn-success" id="running_order_button" onclick="loadOrdersByStatus('{{route('loadOrdersByStatus', ['running'])}}')">
                                    Running
                                </a>
                            </div>
                            <div class="col-6 mx-auto">
                                <a href="Javascript:void(0)"  class="btn w-100 bg-light-grey-blue" id="draft_order_button" onclick="loadOrdersByStatus('{{route('loadOrdersByStatus', ['draft'])}}')">
                                    Draft
                                </a>
                            </div>
                        </div>
                        <input type="text" name="" id="searchOrder" onkeyup="getOrderWithSearch(this)" class="form-control w-100" placeholder="Search here">
                    </div>
                    <div class="card-body pos-left-items" id="order-list-by-status">
                        @include('pos.partials.order')
                    </div>

                    <div class="card-footer p-0 main-left-p1">
                        <div class="row btn-group mx-auto text-center">
                            <div class="col-12">
                                <button class="btn w-100 bg-light-grey-blue btn-sm mb-1 font-weight-bold" data-target="#order_details_modal" onclick="getOrderDetails()">Order Details<i class="feather icon-info"></i></button>
                            </div>
                            <div class="col-12">
                                <button class="btn w-100 bg-light-grey-blue btn-sm mb-1 font-weight-bold" data-toggle="modal" onclick="openInvoice()">Invoice</button>
                            </div>
                            <div class="col-12">
                                <button class="btn w-100 bg-light-grey-blue btn-sm mb-1 font-weight-bold">Reprint KOT<i class="feather icon-printer"></i></button>
                            </div>
                            <div class="col-12">
                                <button class="btn w-100 bg-light-grey-blue btn-sm mb-1 font-weight-bold">Cancel Order<i class="feather icon-ban"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- Running order card end --}}


            <div class="col-md-5 item_card main-left-p1 main-card">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row d-flex justify-content-around text-center">
                            <div class="col-3">
                                <input type="radio" id="dinein" value="Dine In" name="type" hidden checked>
                                <label for="dinein">
                                    <span class="btn w-100 bg-light-grey-blue ml-auto font-weight-bold">
                                        Dine In
                                        <i class="feather icon-grid"></i>
                                    </span>
                                </label>
                            </div>
                            <div class="col-3">
                                <input type="radio" id="takeaway" value="Takeaway" name="type" hidden>
                                <label for="takeaway">
                                    <span class="btn w-100 bg-light-grey-blue ml-auto font-weight-bold">
                                        Takeaway
                                    <i class="feather icon-shopping-bag"></i>
                                    </span>
                                </label>
                            </div>
                            <div class="col-3">
                                <input type="radio" id="delivery" value="Delivery" name="type" hidden>
                                <label for="delivery">
                                    <span class="btn w-100 bg-light-grey-blue ml-auto font-weight-bold">
                                        Delivery
                                    <i class="feather icon-truck"></i>
                                    </span>
                                </label>
                            </div>
                            <div class="col-3">
                                <button type="button" id="table_modal_button" data-toggle="modal" data-target="#table_modal" class="btn w-100 bg-light-grey-blue ml-auto font-weight-bold">Table<i class="feather icon-grid"></i></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 px-0">
                                <select name="waiter_list" id="waiter_list" class="form-control select2-container--default select2" required>
                                    <option value="" selected>Select Waiter</option>
                                    @foreach ($waiters as $type)
                                        <option value="{{$type->id}}" >{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6" id="customer_area">
                                @include('pos.partials.customer')
                            </div>
                            <input type="hidden" name="table_id[]" id="table_id">
                            <div class="col-md-1 px-0">
                                <button href="#" data-toggle="modal" data-target="#add_customer" class=" btn-secondary">
                                    <i class="feather icon-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body item-table">
                        <div class="row">
                            <div class="col-md-12 tableWrap">
                                <table class="table" id="order_table">
                                    <thead class="text-center">
                                        <tr>
                                            <th width="5%">Sl</th>
                                            <th width="48%">Item</th>
                                            <th width="10%">Price</th>
                                            <th style="z-index:1" width="20%">Quantity</th>
                                            <th width="14%">Amount</th>
                                            <th width="3%"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="order_items">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer pt-1 pb-0">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table text-right mb-0" id="" >
                                    <tbody id="order_footer" >
                                        <tr>
                                            <td class="border-0" width="50%">Subtotal</td>
                                            <td class="border-0" width="50%">BDT
                                                <input type="text" class="phone text-right border-0" id="sub_total_amount" readonly value="0.00">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-0" width="50%">VAT</td>
                                            <td class="border-0" width="50%">BDT
                                                <input type="text" class="phone text-right border-0" id="vat" readonly value="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-0" width="50%">Discount</td>
                                            <td class="border-0" width="50%">BDT
                                                <input type="number" class="phone text-right" id="discount" value="0.00" onkeyup="grandTotal()">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-0" width="50%">Charge</td>
                                            <td class="border-0" width="50%">BDT
                                                <input type="text" class="phone text-right border-0" id="charge" readonly value="45">
                                            </td>
                                        </tr>
                                        <tr class="font-weight-bold">
                                            <td class="border-0" width="50%">Total</td>
                                            <td class="border-0" width="50%">BDT
                                                <input type="number" class="phone text-right border-0 font-weight-bold" id="grand_total" value="0.00" readonly>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="col-md-12">
                                <a href="" data-toggle="modal" data-target="#total_payable" class="font-size-large col-md-12 btn btn-secondary">
                                    <i class="feather icon-eye"></i>
                                    Total Payable:
                                    4535.00
                                </a>
                            </div> --}}
                            <div class="col-md-12 mt-1">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="{{route('home')}}" class="btn w-100 bg-danger mb-1 ml-auto text-white font-weight-bold">
                                            Close
                                        </a>
{{--                                        <button class="btn w-100 bg-danger mb-1 ml-auto text-white font-weight-bold">Close</button>--}}
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" onclick="orderPlace()" class="btn w-100 bg-primary mb-1 mx-auto text-white font-weight-bold">Place Order</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" onclick="openPaymentModal()" data-target="#payment_modal" class="w-100 btn bg-success mb-1 mx-auto text-white font-weight-bold">
                                            Pay & Place Order
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 item_card main-pl0 main-card">
                <div class="card ">
                    <div class="card-header pb-0 main-left-p1">
                        <div class="row">
                            <div class="col-md-12">
                                <input class=" form-control" type="text" id="search" onkeyup="getMenuWithSearch(this)"
                                placeholder="Name or Code or Category or VEG or BEV or BAR">
                            </div>
                        </div>
                    </div>

                    <div class="card-body main-left-p1 pt-1">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2 pl-0 pr-0 pos-scroll-item" id="menu-div">
                                    @if(sizeof($menuCategories) > 0)
                                        <div class="px-0">
                                            <button class="btn bg-primary text-white font-weight-bold btn-block"
                                            onclick="loadMenuByCategory('{{ route ('loadMenuByCategory', ['All'])}}')">All</button>
                                        </div>
                                        @foreach ($menuCategories as $cat)
                                            <div class="px-0">
                                                <button type="button" class="btn bg-primary text-white font-weight-bold btn-block"
                                                onclick="loadMenuByCategory('{{ route ('loadMenuByCategory', [$cat->id])}}')">{{$cat->name}}</button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="col-md-10 pos-scroll-item">
                                    <div class="row pos-menu-div" id="menu-section">
                                        @include('pos.menus')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Views Starts From Here--}}

        {{-- Add Customer Modal--}}

        <div class="modal fade text-left" id="add_customer" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Add Customer Info</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="javascript:" method="POST" id="customer_add_submit" class="clearForm form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Rahim Miya" value="" required>
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="phone">Phone<span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="" required>
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="example@.com" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="House-1, Road-2" value="" >
                                </fieldset>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                            <input type="button" id="customer_add_form" class="btn btn-outline-primary" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>

{{--        Invoice Modal--}}

        <div class="modal fade text-left" id="quick_invoice" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog modal-content" role="document">
                <div class="modal-content">
{{--                    <div class="modal-header">--}}
{{--                        <h3 class="modal-title" id="myModalLabel35">Quick Invoice</h3>--}}
{{--                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true">&times;</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
                    <div class="modal-body" id="printInvoice">

                    </div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-outline-secondary" id="closeInvoiceButton" data-dismiss="modal" value="Close">
                        <input type="button" id="printBtn" onclick="printDiv('printInvoice')" data-dismiss="modal" class="btn btn-outline-primary" value="Print">
                    </div>
                </div>
            </div>
        </div>

{{--        Tables Modal--}}

        <div class="modal fade text-left" id="table_modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Table List</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="table_body">
                        @include('pos.partials.tables')
                    </div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                        <input type="button" id="table_list" onclick="loadTableDetails()" class="btn btn-outline-primary" value="Save">
                    </div>
                </div>
            </div>
        </div>

{{--        Order Details Modal--}}

        <div class="modal fade text-left" id="order_details_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Order Details</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="order_detail_body">
                    </div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                    </div>
                </div>
            </div>
        </div>

{{--        Payment Modal --}}

        <div class="modal fade text-left" id="payment_modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Payment Details</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="javascript:" method="POST" id="" class="clearForm form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4 mt-1">
                                    <label for="payment_list" class="font-weight-bold">Payment Method<span class="text-danger">*</span> :</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="payment_list" id="payment_list" class="form-control select2" required>
                                        @foreach ($payments as $type)
                                            <option value="{{$type->id}}" >{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-4 mt-1">
                                    <label for="total_amount" class="font-weight-bold">Total Amount : </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="total_amount" class="form-control" id="total_amount" placeholder="" value="" readonly>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-4 mt-1">
                                    <label for="paid_amount" class="font-weight-bold">Paid: </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" name="paid_amount" onkeyup="calculationPaid()" class="form-control" id="paid_amount" placeholder="" value="" >
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-4 mt-1">
                                    <label for="change_amount" class="font-weight-bold">Change : </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="change_amount" class="form-control" id="change_amount" placeholder="" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                            <input type="button" id="" class="btn btn-outline-primary" onclick="orderPaid()" value="Confirm">
                        </div>
                    </form>
                </div>
            </div>
        </div>


{{--        Unpaid Modal Payment--}}

        <div class="modal fade text-left" id="unpaid_payment_modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Payment Details</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="javascript:" method="POST" id="" class="clearForm form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4 mt-1">
                                    <label for="unpaid_payment_list" class="font-weight-bold">Payment Method<span class="text-danger">*</span> :</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="unpaid_payment_list" id="unpaid_payment_list" class="form-control select2" required>
                                        @foreach ($payments as $type)
                                            <option value="{{$type->id}}" >{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-4 mt-1">
                                    <label for="unpaid_total_amount" class="font-weight-bold">Total Amount : </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="unpaid_total_amount" class="form-control" id="unpaid_total_amount" placeholder="" value="" readonly>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-4 mt-1">
                                    <label for="now_paid_amount" class="font-weight-bold">Paid: </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" name="now_paid_amount" onkeyup="calculationUnpaid()" class="form-control" id="now_paid_amount" placeholder="" value="" >
                                </div>
                            </div>
                            <input type="hidden" name="unpaid_order_id" id="unpaid_order_id">
                            <div class="row mt-1">
                                <div class="col-md-4 mt-1">
                                    <label for="unpaid_change_amount" class="font-weight-bold">Change : </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="unpaid_change_amount" class="form-control" id="unpaid_change_amount" placeholder="" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                            <input type="button" id="" class="btn btn-outline-primary" onclick="changeStatusToPaid()" value="Confirm">
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </section>
    <script src="{{ asset ('public/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset ('public/app-assets/js/scripts/forms/input-groups.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('input[type=radio][name=type]').change(function () {
                if (this.value == 'Dine In') {
                    $('#table_modal_button').removeAttr('disabled');
                } else {
                    $('#table_modal_button').attr('disabled', true);
                }
            });
        })

        var concernedElement = document.querySelectorAll(".order");

        document.addEventListener("mousedown", (event) => {
            for (let i =0; i < concernedElement.length; i++){
                if (concernedElement[i].contains(event.target)) {
                    break;
                } else {
                    $('.order').removeClass("bg-white");
                }
            }

        });


    </script>
    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();
            document.body.innerHTML = originalContents;
            setTimeout(function() {
                location.reload();
            }, 500);
        }

    </script>
    <script>
        $("#customer_add_form").click(function(event) {
            event.preventDefault();
            let name = $('#name').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let address = $('#address').val();
            let url = ("{{route('customer.ajaxStore')}}");
            $.ajax({
                type: "POST",
                url: url,
                    data:{
                        "_token": "{{ csrf_token() }}",
                        name:name,
                        email:email,
                        phone:phone,
                        address:address,
                    },
                success: function(data) {
                    if(data.status == 1){
                        $('#customer_area').empty().html(data.view);
                        $(".select2").select2();
                        Swal.fire({
                            type: "success",
                            text: data.msg,
                            confirmButtonClass: "btn btn-primary",
                            buttonsStyling: false
                        });
                    }else{
                        Swal.fire({
                            type: "error",
                            text: data.msg,
                            confirmButtonClass: "btn btn-primary",
                            buttonsStyling: false
                        });
                    }
                },
                error: function(e) {
                    console.log(e)
                }

            });
            $('#name').val('');
            $('#email').val('');
            $('#phone').val('');
            $('#address').val('');
            $("#add_customer").modal('hide');
        });
    </script>
    <script>
        function loadMenuByCategory(url) {
            $.ajax({
                url : url,
                dataType : 'json',

                success: function (data) {
                    $("#menu-section").empty().html(data.view);
                },

                error: function (error) {
                    console.log(error);
                }
            });
            $('#search').val('');
        }

        function getMenuWithSearch(tar) {
            let search = $(tar).val();
            let url = "{{ route ('getMenuWithSearch') }}";
            $.ajax({
                url : url,
                data : {
                    'search': search,
                },
                dataType : 'json',

                success: function (data) {
                    $("#menu-section").empty().html(data.view);
                },

                error: function (error) {
                    console.log(error);
                }
            });
        }

    </script>
    <script type="text/javascript">
        var addItemToCart = [];
        var cartItemSl = 0;
        var item_details = [];

        function addToCart(item){
            item_details = $(item).attr('data-details').split('|');
            let index = addItemToCart.indexOf(item_details[0]);

            if (index > -1) {
                let qty = $('#cmenu_qty_'+item_details[0]).val();
                let uqty = parseInt(qty) + 1;
                $('#cmenu_qty_'+item_details[0]).val(uqty);
                calculateAmount(item_details[0])
                return false;
            }

            let price = parseFloat(item_details[2]).toFixed(2);

            cartItemSl++;
            var newRow = '<tr id="menu-details'+item_details[0] + '">' +
                '<td class="border-0 text-center" id="cmenu_sl_'+item_details[0] + '"><span>'+cartItemSl+'</span></td>' +
                '<td class="border-0">' +
                '<input type="hidden" id="cmenu_id_'+item_details[0] + '" name="cmenu_id[]" value="'+item_details[0]+ '">' +
                '<span id="cmenu_name_'+item_details[0]+ '">'+item_details[1]+ '</span>' +
                '<input type="hidden" id="cmenu_name_'+item_details[0] + '" name="cmenu_name[]" value="'+item_details[1]+ '">' +
                '</td>' +
                '<td class="border-0 text-center">' +
                '<input type="hidden" id="cmenu_price_'+item_details[0] + '" name="cmenu_price[]" value="'+price+ '">' +
                '<span class="" id="cmenu_price_text_'+item_details[0]+ '">'+price+ '</span>' +
                '</td>' +
                '<td class="border-0">'+
                    '<input type="text" class="touchspin text-center" onchange="calculateAmount('+item_details[0]+')"  onkeyup="calculateAmount('+item_details[0]+')" id="cmenu_qty_'+item_details[0] + '" name="cmenu_qty[]" value="1" data-bts-min="1" data-bts-max="100" />'+
                '</td>'+
                // '<td class="border-0">'+
                //     '<input type="text" class="form-control text-center phone" id="cmenu_discount_'+item_details[0] + '" onkeyup="calculateAmount('+item_details[0]+')" name="cmenu_discount[]" value="0" />'+
                // '</td>'+
                '<td class="border-0 text-center">' +
                '<input type="hidden" class="total-amount" id="cmenu_total_price_'+item_details[0] + '" name="cmenu_total_price[]" value="'+price+ '">' +
                '<span class="" id="cmenu_total_price_text_'+item_details[0]+ '">'+price+ '</span>' +
                '</td>' +
                '<td class="border-0 text-center">' +
                    '<button type="button" title="Delete" class="btn btn-danger btn-sm" onclick="deleteItem(this)" data-count="'+item_details[0] + '"> <i class="fa fa-trash"></i></button>' +
                '</td>' +

                '</tr>';

            $('#order_items').append(newRow);
            $('.touchspin').TouchSpin();
            addItemToCart.push(item_details[0])
            updateRowNo();
            calculateSubtotal();
        }
        function deleteItem(cr){
            // Swal.fire({
            //     title: "Are you sure?",
            //     type: "warning",
            //     showCancelButton: true,
            //     confirmButtonColor: "#3085d6",
            //     cancelButtonColor: "#d33",
            //     confirmButtonText: "Yes, delete it!",
            //     confirmButtonClass: "btn btn-warning mr-10",
            //     cancelButtonClass: "btn btn-danger ml-1",
            //     buttonsStyling: false,
            // }).then(function (result) {
            //     if (result.value) {
                    var rowId = $(cr).attr('data-count');
                    var el = document.getElementById("menu-details"+rowId);
                    el.remove();
                    let ingredient_id_container_new = [];

                    for (let i = 0; i < addItemToCart.length; i++) {
                        if (addItemToCart[i] != rowId) {
                            ingredient_id_container_new.push(addItemToCart[i]);
                        }
                    }
                    addItemToCart = ingredient_id_container_new;
                    cartItemSl--;
                    updateRowNo();
                    calculateSubtotal();
            //     } else if (result.dismiss === Swal.DismissReason.cancel) {
            //     }
            // });

        }

        function updateRowNo() {
            let numRows = $("#order_table tbody tr").length;
            for (let r = 0; r < numRows; r++) {
                $("#order_table tbody tr").eq(r).find("td:first p").text(r + 1);
            }
        }

        function calculateAmount(target){
            var price = $("#cmenu_price_"+target).val();
            var qty = $("#cmenu_qty_"+target).val();

            let amount = 0;
            amount = parseFloat(price) * parseFloat(qty);
            amount = amount.toFixed(2);
            if (amount == 'NaN') {
                $("#cmenu_total_price_"+target).val(0.00);
                $("#cmenu_total_price_text_"+target).html(0.00);

            }else{
                $("#cmenu_total_price_"+target).val(amount);
                $("#cmenu_total_price_text_"+target).html(amount);
            }
            calculateSubtotal();
        }

        function calculateSubtotal() {
            let subtotal = 0.00;
            $('.total-amount').each(function (index, element) {
                subtotal = subtotal + parseFloat($(element).val());
            });
            let vat = ((subtotal * 5)/ 100);
            $("#sub_total_amount").val(subtotal.toFixed(2));
            $("#vat").val(vat.toFixed(2));
            grandTotal();
        }

        function grandTotal() {
            let gtotal = 0.00;
            let subtotal = 0.00;
            let vat = 0.00;
            let charge = 0.00;
            let discount = 0.00;

            subtotal = parseFloat(subtotal) + parseFloat($("#sub_total_amount").val());
            vat = parseFloat(vat) + parseFloat($("#vat").val());
            charge = parseFloat(charge) + parseFloat($("#charge").val());
            discount = parseFloat(discount) + parseFloat($("#discount").val());
            if (discount == 'NaN') {
                gtotal = parseFloat(subtotal) + parseFloat(vat) + parseFloat(charge);
                $("#grand_total").val(gtotal.toFixed(2));
                console.log('1');

            }else{
                gtotal = parseFloat(subtotal) + parseFloat(vat) + parseFloat(charge) - parseFloat(discount);
                $("#grand_total").val(gtotal.toFixed(2));
            }
        }
    </script>
    <script type="text/javascript">
        var tableDetails = [];
        var orderInfoId = 0;
        function orderPlace() {
            let menu_name = $("input[name='cmenu_name[]']").map(function(){return $(this).val();}).get();
            let cmenu_id = $("input[name='cmenu_id[]']").map(function(){return $(this).val();}).get();
            let cmenu_price = $("input[name='cmenu_price[]']").map(function(){return $(this).val();}).get();
            let cmenu_qty = $("input[name='cmenu_qty[]']").map(function(){return $(this).val();}).get();
            let cmenu_total_price = $("input[name='cmenu_total_price[]']").map(function(){return $(this).val();}).get();
            var table = tableDetails;

            var order_type = $("input[name='type']:checked").val();
            var customer = $( "#customer_list" ).val();
            var waiter = $('#waiter_list').val();

            var subTotal = $("#sub_total_amount").val();
            var vat = $("#vat").val();
            var charge = $("#charge").val();
            var discount = $("#discount").val();
            var grandTotal = $("#grand_total").val();
            let payment_status = "Unpaid";

            let url = ("{{route('orderPost')}}");
            if (customer == ''){
                Swal.fire({
                    type: "error",
                    text: "Please, Select Customer Before Placing Order",
                    confirmButtonClass: "btn btn-primary",
                    buttonsStyling: false
                });
            }
            else{
                $.ajax({
                    type: "POST",
                    url: url,
                    data:{
                        "_token": "{{ csrf_token() }}",
                        order_type:order_type,
                        menu_name:menu_name,
                        cmenu_id:cmenu_id,
                        cmenu_price:cmenu_price,
                        cmenu_qty:cmenu_qty,
                        cmenu_total_price:cmenu_total_price,
                        customer:customer,
                        waiter:waiter,
                        table:table,
                        payment_status:	payment_status,
                        subTotal:subTotal,
                        vat:vat,
                        charge:charge,
                        discount:discount,
                        grandTotal:grandTotal,
                    },
                    success: function(data) {
                        if(data.status == 1){
                            Swal.fire({
                                type: "success",
                                text: data.msg,
                                confirmButtonClass: "btn btn-primary",
                                buttonsStyling: false
                            });

                        }else{
                            Swal.fire({
                                type: "error",
                                text: data.msg,
                                confirmButtonClass: "btn btn-primary",
                                buttonsStyling: false
                            });
                        }
                        $("#order-list-by-status").empty().html(data.view);
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
            }

            $('#order_items').empty();
            updateRowNo();

            $("#sub_total_amount").val('0.00');
            $("#vat").val(15);
            $("#charge").val(45);
            $("#discount").val('0.00');
            $("#grand_total").val('0.00');
            $( "#customer_list" ).val("").change();
            $('#waiter_list').val("").change();
            cartItemSl =0;
            let len = addItemToCart.length;
            for (let i=0; i < len; i++) {
                addItemToCart.pop();
                menu_name.pop();
                cmenu_id.pop();
                cmenu_price.pop();
                cmenu_qty.pop();
                cmenu_total_price.pop();
            }
            tableDetails = [] ;

        }
        function getMenuIds(items, value) {
            return value;
        }
        function loadOrdersByStatus(url) {

            if (url.search(/running/i) > 0){
                $('#draft_order_button').removeClass('btn-success');
                $('#running_order_button').addClass('btn-success');
            }
            else{
                $('#running_order_button').removeClass('btn-success');
                $('#draft_order_button').addClass('btn-success');
            }
            $.ajax({
                url : url,
                dataType : 'json',

                success: function (data) {
                    $("#order-list-by-status").empty().html(data.view);
                },

                error: function (error) {
                    console.log(error);
                }
            });
        }
        function loadTableData(url, id) {
            let table_id = $(id).attr('data-reserve_table_id');
            tableDetails.push(parseInt(table_id));
            $.ajax({
                url : url,
                success: function (data) {
                    $("#table_body").empty().html(data.view);
                },

                error: function (error) {
                    console.log(error);
                }
            });
        }

        function changeTableStatus(url, id) {
            let table_id = $(id).attr('data-clear_table_id');
            let len2 = tableDetails.length;
            for (let i = 0; i<len2; i++){
                if (table_id ==tableDetails[i] ){
                    tableDetails.splice(i,1);
                }
            }
            $.ajax({
                url : url,
                success: function (data) {
                    $("#table_body").empty().html(data.view);
                },

                error: function (error) {
                    console.log(error);
                }
            });
        }

        function getOrderInfo(id) {
            orderInfoId = id;
            console.log(orderInfoId);
        }
        $(".order").click(function () {
            $(this).toggleClass('bg-white').siblings().removeClass("bg-white");
        });

        function getOrderDetails() {
            let url = "{{ route ('loadOrderDetails', ['-a']) }}";
            url = url.replace('-a', orderInfoId);
            if (orderInfoId != 0){
                $.ajax({
                    url : url,
                    success: function (data) {
                        $("#order_detail_body").empty().html(data.view);
                        $("#order_details_modal").modal('show');
                    },

                    error: function (error) {
                        console.log(error);
                    }
                });
                orderInfoId = 0;
            }
            else {
                Swal.fire({
                    type: "error",
                    text: "Select An Order First",
                    confirmButtonClass: "btn btn-danger",
                    buttonsStyling: false
                });
            }
        }
        function openInvoice() {
            let url = "{{ route ('invoicePrint', ['-a']) }}";
            url = url.replace('-a', orderInfoId);
            if (orderInfoId != 0){
                $.ajax({
                    url : url,
                    success: function (data) {
                        $("#printInvoice").empty().html(data.view);
                        $("#quick_invoice").modal('show');
                    },

                    error: function (error) {
                        console.log(error);
                    }
                });
                orderInfoId = 0;
            }
            else {
                Swal.fire({
                    type: "error",
                    text: "Select An Order First",
                    confirmButtonClass: "btn btn-danger",
                    buttonsStyling: false
                });
            }
        }
        function openPaymentModal() {
            $('#payment_modal').modal('show');
            let amount =  $('#grand_total').val();
            $('#total_amount').val(amount) ;
        }
        function calculationPaid() {
            let amount = $('#total_amount').val() ;
            let paid = $('#paid_amount').val();
            let change = 0;
            change = parseInt(paid) - parseInt(amount);
            $('#change_amount').val(change.toFixed(2));
        }
        function calculationUnpaid() {
            let paid = $('#now_paid_amount').val();
            let amount = $('#unpaid_total_amount').val() ;
            let change = 0;
            change = parseInt(paid) - parseInt(amount);
            $('#unpaid_change_amount').val(change.toFixed(2));
        }

        function orderPaid() {
            let amount = $('#total_amount').val() ;
            let paid = $('#paid_amount').val();
            if (parseInt(paid) >= parseInt(amount)) {
                let menu_name = $("input[name='cmenu_name[]']").map(function () {
                    return $(this).val();
                }).get();
                let cmenu_id = $("input[name='cmenu_id[]']").map(function () {
                    return $(this).val();
                }).get();
                let cmenu_price = $("input[name='cmenu_price[]']").map(function () {
                    return $(this).val();
                }).get();
                let cmenu_qty = $("input[name='cmenu_qty[]']").map(function () {
                    return $(this).val();
                }).get();
                let cmenu_total_price = $("input[name='cmenu_total_price[]']").map(function () {
                    return $(this).val();
                }).get();
                var table = tableDetails;

                var order_type = $("input[name='type']:checked").val();
                var customer = $("#customer_list").val();
                var waiter = $('#waiter_list').val();

                var subTotal = $("#sub_total_amount").val();
                var vat = $("#vat").val();
                var charge = $("#charge").val();
                var discount = $("#discount").val();
                var grandTotal = $("#grand_total").val();
                var payment_method = $("#payment_list").val();
                let payment_status = "Paid";

                let url = ("{{route('orderPost')}}");
                if (customer == '') {
                    Swal.fire({
                        type: "error",
                        text: "Please, Select Customer Before Placing Order",
                        confirmButtonClass: "btn btn-primary",
                        buttonsStyling: false
                    });
                } else {
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            order_type: order_type,
                            menu_name: menu_name,
                            cmenu_id: cmenu_id,
                            cmenu_price: cmenu_price,
                            cmenu_qty: cmenu_qty,
                            cmenu_total_price: cmenu_total_price,
                            customer: customer,
                            waiter: waiter,
                            table: table,
                            payment_method: payment_method,
                            payment_status: payment_status,
                            subTotal: subTotal,
                            vat: vat,
                            charge: charge,
                            discount: discount,
                            grandTotal: grandTotal,
                        },
                        success: function (data) {
                            if (data.status == 1) {
                                Swal.fire({
                                    type: "success",
                                    text: data.msg,
                                    confirmButtonClass: "btn btn-primary",
                                    buttonsStyling: false
                                });

                            } else {
                                Swal.fire({
                                    type: "error",
                                    text: data.msg,
                                    confirmButtonClass: "btn btn-primary",
                                    buttonsStyling: false
                                });
                            }
                            $("#order-list-by-status").empty().html(data.view);
                            $("#paid_amount").val('');
                            $("#total_amount").val('');
                            console.log('this')
                        },
                        error: function (e) {
                            console.log(e)
                        }
                    });
                }

                $('#order_items').empty();
                updateRowNo();

                $("#sub_total_amount").val('0.00');
                $("#vat").val(15);
                $("#charge").val(45);
                $('#paid_amount').val('');
                $('#change_amount').val(0.00);
                $("#discount").val('0.00');
                $("#grand_total").val('0.00');
                $("#customer_list").val("").change();
                $('#waiter_list').val("").change();
                cartItemSl = 0;
                let len = addItemToCart.length;
                for (let i = 0; i < len; i++) {
                    addItemToCart.pop();
                    menu_name.pop();
                    cmenu_id.pop();
                    cmenu_price.pop();
                    cmenu_qty.pop();
                    cmenu_total_price.pop();
                }
                tableDetails = [];
                $('#payment_modal').modal('hide');
            } else {
                console.log('not true');
                Swal.fire({
                    type: "error",
                    text: 'Paid Amount should be more than Total Amount',
                    confirmButtonClass: "btn btn-primary",
                    buttonsStyling: false
                });
                // $('#payment_modal').modal('hide');
                // $('#order_items').empty();
                // updateRowNo();
                // $("#sub_total_amount").val('0.00');
                // $("#vat").val(15);
                // $("#charge").val(45);
                // $("#discount").val('0.00');
                // $('#change_amount').val(0.00);
                // $('#paid_amount').val('');
                // $("#grand_total").val('0.00');
                // $("#customer_list").val("").change();
                // $('#waiter_list').val("").change();
                // cartItemSl = 0;
                // let len = addItemToCart.length;
                // for (let i = 0; i < len; i++) {
                //     addItemToCart.pop();
                //     menu_name.pop();
                //     cmenu_id.pop();
                //     cmenu_price.pop();
                //     cmenu_qty.pop();
                //     cmenu_total_price.pop();
                // }
                // tableDetails = [];
            }
        }

        function payOrder(id, total) {
            $('#unpaid_payment_modal').modal('show');
            $('#unpaid_total_amount').val(total.toFixed(2)) ;
            $('#unpaid_order_id').val(id);
        }

        function changeStatusToPaid() {
            let id = $('#unpaid_order_id').val();
            var paymentMethod = $("#unpaid_payment_list").val();
            let payment_status = "Paid";
            let change = $("#unpaid_change_amount").val();
            let url = "{{ route ('orderPaidStatus', ['-a']) }}";
            url = url.replace('-a', id);

            if (change != '' && change >= 0){
                $.ajax({
                    type: "get",
                    url: url,
                    data:{
                        "_token": "{{ csrf_token() }}",
                        payment_method : paymentMethod,
                        payment_status : payment_status,
                    },
                    success: function(data) {
                        if(data.status == 1){
                            Swal.fire({
                                type: "success",
                                text: data.msg,
                                confirmButtonClass: "btn btn-primary",
                                buttonsStyling: false
                            });

                        }else{
                            Swal.fire({
                                type: "error",
                                text: data.msg,
                                confirmButtonClass: "btn btn-primary",
                                buttonsStyling: false
                            });
                        }
                        $("#order-list-by-status").empty().html(data.view);
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
                $('#unpaid_payment_modal').modal('hide');
                $("#unpaid_change_amount").val('');
                $('#now_paid_amount').val('');
            }
            else{
                Swal.fire({
                    type: "error",
                    text: "Payment Amount is smaller or null",
                    confirmButtonClass: "btn btn-primary",
                    buttonsStyling: false
                });
            }

        }

    </script>
    <script type="text/javascript">
        function getOrderWithSearch(tar) {
            let search = $(tar).val();
            let url = "{{ route ('searchOrder') }}";
            $.ajax({
                url : url,
                data : {
                    'search': search,
                },
                dataType : 'json',

                success: function (data) {
                    $("#order-list-by-status").empty().html(data.view);
                },

                error: function (error) {
                    console.log(error);
                }
            });
        }
    </script>
