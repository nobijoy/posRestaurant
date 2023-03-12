@extends('layouts.pos.master')

@section('title', 'POS')

@section('body')

    <section class="mt-1">
        <form action="{{ route('posOrder') }}" method="post">@csrf
        <div class="row ">
           {{-- running order card start --}}
            <div class="col-md-2 pos-section">
                <div class="row ml-1 card rounded">
                    <div class="card-header py-0 mx-auto">
                        <h4 class="text-center mb-0 font-weight-bold">Running Orders<span class="btn text-primary"><i class="feather icon-repeat"></i></span></h4>
                        <input type="text" name="" id="" class="mb-1 rounded form-control" placeholder="Search here">
                    </div>
                    <div class="card-body pos-left-items mb-1">
                        <div class="border-black bg-light-grey-blue mb-1 p-1 line-height-1 rounded">
                            <span>Cust: Walk-in Customer</span><br>
                            <span>Order: rKK230305-001</span><br>
                            <span>Order Type: Dine In</span><br>
                            <span>Table: None</span><br>
                            <span>Waiter: Rakesh</span>
                        </div>
                        <div class="border-black bg-light-grey-blue mb-1 p-1 line-height-1 rounded">
                            <span>Cust: Walk-in Customer</span><br>
                            <span>Order: rKK230305-001</span><br>
                            <span>Order Type: Dine In</span><br>
                            <span>Table: None</span><br>
                            <span>Waiter: Rakesh</span>
                        </div>
                        <div class="border-black bg-light-grey-blue mb-1 p-1 line-height-1 rounded">
                            <span>Cust: Walk-in Customer</span><br>
                            <span>Order: rKK230305-001</span><br>
                            <span>Order Type: Dine In</span><br>
                            <span>Table: None</span><br>
                            <span>Waiter: Rakesh</span>
                        </div>
                        <div class="border-black bg-light-grey-blue mb-1 p-1 line-height-1 rounded">
                            <span>Cust: Walk-in Customer</span><br>
                            <span>Order: rKK230305-001</span><br>
                            <span>Order Type: Dine In</span><br>
                            <span>Table: None</span><br>
                            <span>Waiter: Rakesh</span>
                        </div>
                        <div class="border-black bg-light-grey-blue mb-1 p-1 line-height-1 rounded">
                            <span>Cust: Walk-in Customer</span><br>
                            <span>Order: rKK230305-001</span><br>
                            <span>Order Type: Dine In</span><br>
                            <span>Table: None</span><br>
                            <span>Waiter: Rakesh</span>
                        </div>
                        <div class="border-black bg-light-grey-blue mb-1 p-1 line-height-1 rounded">
                            <span>Cust: Walk-in Customer</span><br>
                            <span>Order: rKK230305-001</span><br>
                            <span>Order Type: Dine In</span><br>
                            <span>Table: None</span><br>
                            <span>Waiter: Rakesh</span>
                        </div>
                    </div>
                </div>
                <div class="row ml-1 card rounded mb-1">
                    <div class="card-body">
                        <div class="row btn-group mx-auto text-center">
                            <div class="col-12 ">
                                <button class="btn w-100 bg-light-grey-blue btn-sm mb-1 font-weight-bold">Modify Order<i class="feather icon-edit"></i></button>
                            </div>
                            <div class="col-12">
                                <button class="btn w-100 bg-light-grey-blue btn-sm mb-1 font-weight-bold">Order Details<i class="feather icon-info"></i></button>
                            </div>
                            <div class="col-6">
                                <button class="btn w-100 bg-light-grey-blue btn-sm mb-1 font-weight-bold">All Item</button>
                            </div>
                            <div class="col-6">
                                <button class="btn w-100 bg-light-grey-blue btn-sm mb-1 font-weight-bold">New Item</button>
                            </div>
                            <div class="col-6">
                                <button class="btn w-100 bg-light-grey-blue btn-sm mb-1 font-weight-bold">Invoice</button>
                            </div>
                            <div class="col-6">
                                <button class="btn w-100 bg-light-grey-blue btn-sm mb-1 font-weight-bold">Bill</button>
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


            <div class="col-md-5">
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

                    <div class="card-body pos-left-items ">
                        <div class="row">
                           {{-- <input type="hidden" id="ingredient_count" value="0"> --}}
                           {{-- <input type="hidden" id="ingredient_sl" value="0"> --}}
                            <div class="form-group col-md-12 pos-left-items">
                                <table class="w-100" id="order_table" >
                                    <thead class="thead-bordered  text-center">
                                        <tr>
                                            <th width="10%">Sl</th>
                                            <th width="40%">Item</th>
                                            <th width="15%">Price</th>
                                            <th width="20%">Quantity</th>
                                            {{-- <th width="15%">Discount</th> --}}
                                            <th width="15%">Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="order_items" >
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer ">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="" data-toggle="modal" data-target="#total_payable" class="font-size-large col-md-12 btn btn-secondary">
                                    <i class="feather icon-eye"></i>
                                    Total Payable:
                                    4535.00
                                </a>
                            </div>
                            <div class="col-md-12 mt-1">
                                <div class="row">
                                    <div class="col-md-4">
                                        <button class="btn w-100 bg-danger mb-1 ml-auto text-white font-weight-bold">Cancel</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn w-100 bg-primary mb-1 mx-auto text-white font-weight-bold">Quick Invoice</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn w-100 bg-success mb-1 mx-auto text-white font-weight-bold">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div></form>


            <div class="col-md-5 pl-0">
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
                                <div class="col-md-2 pos-scroll-item pl-0 pr-1">
                                    @if(sizeof($menuCategories) > 0)
                                        <div class="px-0 mb-1">
                                            <button class="btn bg-light-grey-blue btn-block pos-btn-active"
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

        {{-- Total Payable Modal--}}

        <div class="modal fade text-left" id="total_payable" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Total Payable Amount</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <div>
                                <p><span class="font-weight-bold">Total Item:</span> 4</p>
                                <p><span class="font-weight-bold">Total Discount:</span> 20</p>
                                <p><span class="font-weight-bold">Tax:</span> 12</p>
                                <p><span class="font-weight-bold">Charge:</span> 35</p>
                                <p><span class="font-weight-bold">Tip:</span> 50</p>
                                <p><span class="font-weight-bold">Total:</span> 1200</p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset ('public/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset ('public/app-assets/js/scripts/forms/input-groups.js') }}"></script>
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
        let addItemToCart = [];
        let cartItemSl = 0;

        function addToCart(item){
            var item_details = $(item).attr('data-details').split('|');
            let index = addItemToCart.indexOf(item_details[0]);

            if (index > -1) {
                console.log(item_details[0]);
                let qty = $('#cmenu_qty_'+item_details[0]).val();
                let uqty = parseInt(qty) + 1;
                $('#cmenu_qty_'+item_details[0]).val(uqty);
                calculateSubtotal(item_details[0])
                return false;
            }

            cartItemSl++;
            var newRow = '<tr id="menu-details'+item_details[0] + '">' +
                '<td class="border-0 text-center" id="cmenu_sl_'+item_details[0] + '"><span>'+cartItemSl+'</span></td>' +
                '<td class="border-0">' +
                '<input type="hidden" id="cmenu_id_'+item_details[0] + '" name="cmenu_id[]" value="'+item_details[0]+ '">' +
                '<span id="cmenu_name_'+item_details[0]+ '">'+item_details[1]+ '</span>' +
                '</td>' +
                '<td class="border-0 text-center">' +
                '<input type="hidden" id="cmenu_price_'+item_details[0] + '" name="cmenu_price[]" value="'+item_details[2]+ '">' +
                '<span class="" id="cmenu_price_text_'+item_details[0]+ '">'+item_details[2]+ '</span>' +
                '</td>' +
                '<td class="border-0">'+
                    '<input type="text" class="touchspin text-center" onchange="calculateSubtotal('+item_details[0]+')"  onkeyup="calculateSubtotal('+item_details[0]+')" id="cmenu_qty_'+item_details[0] + '" name="cmenu_qty[]" value="1" data-bts-min="1" data-bts-max="100" />'+
                '</td>'+
                // '<td class="border-0">'+
                //     '<input type="text" class="form-control text-center phone" id="cmenu_discount_'+item_details[0] + '" onkeyup="calculateSubtotal('+item_details[0]+')" name="cmenu_discount[]" value="0" />'+
                // '</td>'+
                '<td class="border-0 text-center">' +
                '<input type="hidden" id="cmenu_total_price_'+item_details[0] + '" name="cmenu_total_price[]" value="'+item_details[2]+ '">' +
                '<span class="" id="cmenu_total_price_text_'+item_details[0]+ '">'+item_details[2]+ '</span>' +
                '</td>' +

                '</tr>';

            $('#order_items').append(newRow);
            $('.touchspin').TouchSpin();
            addItemToCart.push(item_details[0])
            updateRowNo();
        }
        function deleteConsumptionRow(cr){
            Swal.fire({
                title: "Are you sure?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
                confirmButtonClass: "btn btn-warning mr-10",
                cancelButtonClass: "btn btn-danger ml-1",
                buttonsStyling: false,
            }).then(function (result) {
                if (result.value) {
                    var rowId = $(cr).attr('data-count');
                    var el = document.getElementById("ingredient_row_"+rowId);
                    el.remove();
                    let ingredient_id_container_new = [];

                    for (let i = 0; i < addItemToCart.length; i++) {
                        if (addItemToCart[i] != rowId) {
                            ingredient_id_container_new.push(addItemToCart[i]);
                        }
                    }
                    addItemToCart = ingredient_id_container_new;
                    updateRowNo();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                }
            });

        }

        function updateRowNo() {
            let numRows = $("#order_table tbody tr").length;
            for (let r = 0; r < numRows; r++) {
                $("#order_table tbody tr").eq(r).find("td:first p").text(r + 1);
            }
        }

        function calculateSubtotal(target){
            var price = $("#cmenu_price_"+target).val();
            var qty = $("#cmenu_qty_"+target).val();

            let subTotal = 0;
            subTotal = parseFloat(price) * parseFloat(qty);
            subTotal = subTotal.toFixed(2);
            if (subTotal == 'NaN') {
                $("#cmenu_total_price_"+target).val(0.00);
                $("#cmenu_total_price_text_"+target).html(0.00);

            }else{
                $("#cmenu_total_price_"+target).val(subTotal);
                $("#cmenu_total_price_text_"+target).html(subTotal);
            }
        }

        function grandTotal() {
            var total = 0;
            $('.total-price').each(function (index, element) {
                total = total + parseFloat($(element).val());
            });
            $("#total_loss").val(total.toFixed(2));
        }
    </script>
@endsection
