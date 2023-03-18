@extends('layouts.pos.master')

@section('title', 'POS')

@section('body')

    <section class="mt-1">
{{--        <form action="{{ route('posOrder') }}" method="post">@csrf--}}
        <div class="row ">
           {{-- running order card start --}}
            <div class="col-md-2 vh-100 pos-section">
                <div class="row ml-1 card rounded">
                    <div class="card-header py-0 mx-auto">
                        <div class="row my-1">
                            <div class="col-6 mx-auto">
                                <a href="#" class="btn w-100 btn-secondary" onclick="loadOrdersByStatus('{{route('loadOrdersByStatus', ['running'])}}')">
                                    Running
                                    <span><i class="feather icon-repeat"></i></span>
                                </a>
                            </div>
                            <div class="col-6 mx-auto">
                                <a href="#"  class="btn w-100 btn-secondary" onclick="loadOrdersByStatus('{{route('loadOrdersByStatus', ['draft'])}}')">
                                    Draft
                                    <span><i class="feather icon-save"></i></span>
                                </a>
                            </div>
                        </div>
                        <input type="text" name="" id="" class="mb-1 rounded form-control" placeholder="Search here">
                    </div>
                    <div class="card-body pos-left-items mb-1" id="order-list-by-status">
                        @include('pos.partials.order')
                    </div>
                </div>
                <div class="row ml-1 card rounded mb-1">
                    <div class="card-body h-100">
                        <div class="row btn-group mx-auto text-center">
{{--                            <div class="col-12 ">--}}
{{--                                <button class="btn w-100 bg-light-grey-blue btn-sm mb-1 font-weight-bold">Modify Order<i class="feather icon-edit"></i></button>--}}
{{--                            </div>--}}
                            <div class="col-12">
                                <button class="btn w-100 bg-light-grey-blue btn-sm mb-1 font-weight-bold">Order Details<i class="feather icon-info"></i></button>
                            </div>
                            <div class="col-12">
                                <button class="btn w-100 bg-light-grey-blue btn-sm mb-1 font-weight-bold">Invoice</button>
                            </div>
{{--                            <div class="col-6">--}}
{{--                                <button class="btn w-100 bg-light-grey-blue btn-sm mb-1 font-weight-bold">Bill</button>--}}
{{--                            </div>--}}
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


            <div class="col-md-5 vh-100">
                <div class="card rounded pos-section">
                    <div class="card-header pb-0">
                        <div class="row d-flex justify-content-around text-center">
                            <div class="col-3">
                                <input type="radio" id="dinein" value="dinein" name="type" hidden checked>
                                <label for="dinein">
                                    <span class="btn w-100 bg-light-grey-blue mb-1 ml-auto font-weight-bold">
                                        Dine In
                                        <i class="feather icon-grid"></i>
                                    </span>
                                </label>
                            </div>
                            <div class="col-3">
                                <input type="radio" id="takeaway" value="takeaway" name="type" hidden>
                                <label for="takeaway">
                                    <span class="btn w-100 bg-light-grey-blue mb-1 ml-auto font-weight-bold">
                                        Takeaway
                                    <i class="feather icon-shopping-bag"></i>
                                    </span>
                                </label>
                            </div>
                            <div class="col-3">
                                <input type="radio" id="delivery" value="delivery" name="type" hidden>
                                <label for="delivery">
                                    <span class="btn w-100 bg-light-grey-blue mb-1 ml-auto font-weight-bold">
                                        Delivery
                                    <i class="feather icon-truck"></i>
                                    </span>
                                </label>
                            </div>
                            <div class="col-3">
                                <a href="#"  class="btn w-100 bg-light-grey-blue mb-1 mx-auto font-weight-bold">
                                    Draft
                                    <span><i class="feather icon-save"></i></span>
                                </a>
                                <button class="btn w-100 bg-light-grey-blue mb-1 mx-auto font-weight-bold">Table <i class="feather icon-grid"></i></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <select name="waiter_list" id="waiter_list" class="form-control select2" required>
                                    <option value="" selected>Select Waiter</option>
                                    @foreach ($waiters as $type)
                                        <option value="{{$type->id}}" >{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6" id="customer_area">
                                @include('pos.partials.customer')
                            </div>
                            <div class="col-md-1 px-0">
                                <a href="#" data-toggle="modal" data-target="#add_customer" class="btn btn-secondary">
                                    <i class="feather icon-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 tableWrap">
                                <table class="table" id="order_table" >
                                    <thead class="text-center">
                                        <tr>
                                            <th width="5%">Sl</th>
                                            <th width="48%">Item</th>
                                            <th width="10%">Price</th>
                                            <th width="20%">Quantity</th>
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

                    <div class="card-footer pt-1">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table text-right" id="" >
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
                                                <input type="text" class="phone text-right border-0" id="vat" readonly value="15">
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
                                    <div class="col-md-6">
                                        <button class="btn w-100 bg-danger mb-1 ml-auto text-white font-weight-bold">Cancel</button>
                                    </div>
{{--                                    <div class="col-md-4">--}}
{{--                                        <a href="" data-toggle="modal" data-target="#quick_invoice" class="w-100 btn bg-primary mb-1 mx-auto text-white font-weight-bold">--}}
{{--                                            Quick Invoice--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
                                    <div class="col-md-6">
                                        <button type="submit" onclick="orderPlace()" class="btn w-100 bg-success mb-1 mx-auto text-white font-weight-bold">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>


            <div class="col-md-5 vh-100 pl-0">
                <div class="mr-1 card rounded pos-section">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-md-12">
                                <input class="mb-1 rounded form-control" type="text" id="search" onkeyup="getMenuWithSearch(this)"
                                placeholder="Name or Code or Category or VEG or BEV or BAR">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2 pos-scroll-item pl-0 pr-1" id="menu-div">
                                    @if(sizeof($menuCategories) > 0)
                                        <div class="px-0 mb-1">
                                            <button class="btn bg-light-grey-blue btn-block"
                                            onclick="loadMenuByCategory('{{ route ('loadMenuByCategory', ['All'])}}')">All</button>
                                        </div>
                                        @foreach ($menuCategories as $cat)
                                            <div class="px-0 mb-1">
                                                <button type="button" class="btn bg-light-grey-blue btn-block"
                                                onclick="loadMenuByCategory('{{ route ('loadMenuByCategory', [$cat->id])}}')">{{$cat->name}}</button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="col-md-10 pos-scroll-item">
                                    <div class="row" id="menu-section">
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
            <div class="modal-dialog modal-lg" role="document">
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
                        <div>
                            <table align="center" style="font-size: 10px; width: fit-content">
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
                                            <p>Name : Jane Doe</p>
                                            <p>Phone : +88014645665</p>
                                        </div>
                                        <div style="float: right; width: 50%;">
                                            <p>Date : 12/03/2023</p>
                                            <p>Payment Type : Cash</p>
                                        </div>

                                        <p style="margin-bottom:20px;"><strong>Order Details</strong></p>
                                        <hr>
                                        <table align="center" style="font-size: 10px; width: 100%; margin: 0;">
                                            <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody align="center">
                                            <tr>
                                                <td>1</td>
                                                <td>Beef Burger</td>
                                                <td>2</td>
                                                <td>220</td>
                                                <td>440</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Beef Burger</td>
                                                <td>2</td>
                                                <td>220</td>
                                                <td>440</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Beef Burger</td>
                                                <td>2</td>
                                                <td>220</td>
                                                <td>440</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <hr>

                                        <div style="margin: 3px 3px;">
                                            <div style="float: left; width: 50%;">
                                                <p>Sub Total:</p>
                                                <p>VAT: </p>
                                                <p>Charge: </p>
                                                <p>Grand Total: </p>
                                                <p>Rounded: </p>
                                            </div>
                                            <div style="float: right; width: 50%; text-align: right">
                                                <p>1200.00</p>
                                                <p>85.59</p>
                                                <p>60.00</p>
                                                <p>1425.59</p>
                                                <p>1425.00</p>
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
                    </div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-outline-secondary" onclick="myFunction()" data-dismiss="modal" value="Close">
                        <input type="button" id="printBtn" onclick="printDiv('printInvoice')" data-dismiss="modal" class="btn btn-outline-primary" value="Print">
                    </div>
                </div>
            </div>
        </div>


        {{-- Total Payable Modal--}}

{{--        <div class="modal fade text-left" id="total_payable" tabindex="-1" role="dialog"--}}
{{--                aria-labelledby="myModalLabel35" aria-hidden="true">--}}
{{--            <div class="modal-dialog modal-lg" role="document">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h3 class="modal-title" id="myModalLabel35">Total Payable Amount</h3>--}}
{{--                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true">&times;</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                        <div class="modal-body">--}}
{{--                            <div>--}}
{{--                                <p><span class="font-weight-bold">Total Item:</span> 4</p>--}}
{{--                                <p><span class="font-weight-bold">Total Discount:</span> 20</p>--}}
{{--                                <p><span class="font-weight-bold">Tax:</span> 12</p>--}}
{{--                                <p><span class="font-weight-bold">Charge:</span> 35</p>--}}
{{--                                <p><span class="font-weight-bold">Tip:</span> 50</p>--}}
{{--                                <p><span class="font-weight-bold">Total:</span> 1200</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    </section>
@endsection

@section('script')
    <script src="{{ asset ('public/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset ('public/app-assets/js/scripts/forms/input-groups.js') }}"></script>
    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();
            document.body.innerHTML = originalContents;
        }

    </script>
    <script>
        $("#customer_add_form").click(function(event) {
            event.preventDefault();
            let name = $('#name').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let address = $('#address').val();
            var url = ("{{route('customer.ajaxStore')}}");
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
            $("#sub_total_amount").val(subtotal.toFixed(2));
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
        function orderPlace() {
            let menu_name = $("input[name='cmenu_name[]']").map(function(){return $(this).val();}).get();
            let cmenu_id = $("input[name='cmenu_id[]']").map(function(){return $(this).val();}).get();
            let cmenu_price = $("input[name='cmenu_price[]']").map(function(){return $(this).val();}).get();
            let cmenu_qty = $("input[name='cmenu_qty[]']").map(function(){return $(this).val();}).get();
            let cmenu_total_price = $("input[name='cmenu_total_price[]']").map(function(){return $(this).val();}).get();

            var order_type = $("input[name='type']:checked").val();
            var customer = $( "#customer_list" ).val();
            var waiter = $('#waiter_list').val();
            var table = '';
            var subTotal = $("#sub_total_amount").val();
            var vat = $("#vat").val();
            var charge = $("#charge").val();
            var discount = $("#discount").val();
            var grandTotal = $("#grand_total").val();

            var url = ("{{route('orderPost')}}");
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
                    // getRunningOrders();
                },
                error: function(e) {
                    console.log(e)
                }

            });
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
        }
        function getMenuIds(items, value) {
            return value;
        }
        function loadOrdersByStatus(url) {
            $.ajax({
                url : url,
                dataType : 'json',

                success: function (data) {
                    console.log(data);
                    $("#order-list-by-status").empty().html(data.view);
                },

                error: function (error) {
                    console.log(error);
                }
            });
        }

    </script>
@endsection
