@extends('layouts.pos.master')

@section('title', 'POS')

@section('body')

    <section class="mt-1">
        <div class="row ">
           {{-- running order card start --}}
            <div class="col-md-2 pos-section">
                <div class="row ml-1 card rounded">
                    <div class="card-header py-0 mx-auto">
                        <h4 class="text-center mb-0 font-weight-bold">Running Orders<span class="btn text-primary"><i class="feather icon-repeat"></i></span></h4>
                        <input type="text" name="" id="" class="mb-1 rounded form-control" placeholder="Search here">
                    </div>
                    <div class="card-body bg-light-grey-blue pos-left-items mb-1">
                        <div class="border-black bg-white mb-1 p-1 line-height-1 rounded">
                            <p>Cust: Walk-in Customer</p>
                            <p>Order: rKK230305-001</p>
                            <p>Order Type: Dine In</p>
                            <p>Table: None</p>
                            <p>Waiter: Rakesh</p>
                        </div>
                        <div class="border-black bg-white mb-1 p-1 line-height-1 rounded">
                            <p>Cust: Walk-in Customer</p>
                            <p>Order: rKK230305-001</p>
                            <p>Order Type: Dine In</p>
                            <p>Table: None</p>
                            <p>Waiter: Rakesh</p>
                        </div>
                        <div class="border-black bg-white mb-1 p-1 line-height-1 rounded">
                            <p>Cust: Walk-in Customer</p>
                            <p>Order: rKK230305-001</p>
                            <p>Order Type: Dine In</p>
                            <p>Table: None</p>
                            <p>Waiter: Rakesh</p>
                        </div>
                        <div class="border-black bg-white mb-1 p-1 line-height-1 rounded">
                            <p>Cust: Walk-in Customer</p>
                            <p>Order: rKK230305-001</p>
                            <p>Order Type: Dine In</p>
                            <p>Table: None</p>
                            <p>Waiter: Rakesh</p>
                        </div>
                        <div class="border-black bg-white mb-1 p-1 line-height-1 rounded">
                            <p>Cust: Walk-in Customer</p>
                            <p>Order: rKK230305-001</p>
                            <p>Order Type: Dine In</p>
                            <p>Table: None</p>
                            <p>Waiter: Rakesh</p>
                        </div>
                        <div class="border-black bg-white mb-1 p-1 line-height-1 rounded">
                            <p>Cust: Walk-in Customer</p>
                            <p>Order: rKK230305-001</p>
                            <p>Order Type: Dine In</p>
                            <p>Table: None</p>
                            <p>Waiter: Rakesh</p>
                        </div>
                        <div class="border-black bg-white mb-1 p-1 line-height-1 rounded">
                            <p>Cust: Walk-in Customer</p>
                            <p>Order: rKK230305-001</p>
                            <p>Order Type: Dine In</p>
                            <p>Table: None</p>
                            <p>Waiter: Rakesh</p>
                        </div>
                        <div class="border-black bg-white mb-1 p-1 line-height-1 rounded">
                            <p>Cust: Walk-in Customer</p>
                            <p>Order: rKK230305-001</p>
                            <p>Order Type: Dine In</p>
                            <p>Table: None</p>
                            <p>Waiter: Rakesh</p>
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
                                <button class="btn w-100 bg-light-grey-blue mb-1 ml-auto font-weight-bold">Dine In <i class="feather icon-grid"></i></button>
                            </div>
                            <div class="col-3">
                                <button class="btn w-100 bg-light-grey-blue mb-1 mx-auto font-weight-bold">Takeaway <i class="feather icon-shopping-bag"></i></button>
                            </div>
                            <div class="col-3">
                                <button class="btn w-100 bg-light-grey-blue mb-1 mx-auto font-weight-bold">Delivery <i class="feather icon-truck"></i></button>
                            </div>
                            <div class="col-3">
                                <button class="btn w-100 bg-light-grey-blue mb-1 mx-auto font-weight-bold">Table <i class="feather icon-grid"></i></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <select name="waiter_list" id="waiter_list" class="form-control select2" required>
                                    <option value="" selected>Select</option>
                                    @foreach ($waiters as $type)
                                        <option value="{{$type->id}}" >{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select name="customer_list" id="customer_list" class="form-control select2" required>
                                    <option value="" selected>Select</option>
                                    @foreach ($customers as $type)
                                        <option value="{{$type->id}}" >{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 px-0">
                                <a href="#" data-toggle="modal" data-target="#edit_customer" class="btn btn-secondary">
                                    <i class="feather icon-edit"></i>
                                </a>
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
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="order_table">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Item</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Discount</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="order_items" >
                                            <tr>
                                                <td class="border-0">1</td>
                                                <td class="border-0">Beef Burger</td>
                                                <td class="border-0">230</td>
                                                <td class="border-0">1</td>
                                                <td class="border-0">20</td>
                                                <td class="border-0">210</td>
                                            </tr>
                                            <tr>
                                                <td class="border-0">1</td>
                                                <td class="border-0">Beef Burger</td>
                                                <td class="border-0">230</td>
                                                <td class="border-0">1</td>
                                                <td class="border-0">20</td>
                                                <td class="border-0">210</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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
                                        <button class="btn w-100 bg-success mb-1 mx-auto text-white font-weight-bold">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-5 pl-0">
                <div class="mr-1 card rounded pos-section">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-md-12">
                                <input class="mb-1 rounded form-control" type="text" name="search" id="search" placeholder="Name or Code or Category or VEG or BEV or BAR">
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


{{--            Modal Views Starts From Here--}}

{{--            Add Customer Modal--}}

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
                        <form action="{{route('customer.store')}}" method="POST"  class="clearForm form" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <fieldset class="form-group col-md-6 floating-label-form-group">
                                        <label for="name">Name<span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Rahim Miya" value="" >
                                    </fieldset>
                                    <fieldset class="form-group col-md-6 floating-label-form-group">
                                        <label for="phone">Phone<span class="text-danger">*</span></label>
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="" >
                                    </fieldset>
                                    <fieldset class="form-group col-md-6 floating-label-form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="example@.com" value="" >
                                    </fieldset>
                                    <fieldset class="form-group col-md-6 floating-label-form-group">
                                        <label for="date_of_birth">Date Of Birth</label>
                                        <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" placeholder="" value="" >
                                    </fieldset>
                                    <fieldset class="form-group col-md-6 floating-label-form-group">
                                        <label for="date_of_anniversary">Date Of Anniversary</label>
                                        <input type="date" name="date_of_anniversary" class="form-control" id="date_of_anniversary" placeholder="" value="" >
                                    </fieldset>
                                    <fieldset class="form-group col-md-6 floating-label-form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" id="address" placeholder="House-1, Road-2" value="" >
                                    </fieldset>
                                    <fieldset class="form-group col-md-6 floating-label-form-group">
                                        <label for="gst_number">Gst Number</label>
                                        <input type="text" name="gst_number" class="form-control" id="gst_number" placeholder="UYH3436" value="" >
                                    </fieldset>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                                <input type="submit" id="submitBtn" class="btn btn-outline-primary" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

{{--            Edit Customer Modal--}}



            <div class="modal fade text-left" id="edit_customer" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel35" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel35">Edit Customer Info</h3>
                            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('customer.update') }}" method="POST"  class="clearForm form" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <input type="hidden" name="id" id="id">
                                    <fieldset class="form-group col-md-6 floating-label-form-group">
                                        <label for="name">Name<span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" id="edit_name" placeholder="" value="" >
                                    </fieldset>
                                    <fieldset class="form-group col-md-6 floating-label-form-group">
                                        <label for="phone">Phone<span class="text-danger">*</span></label>
                                        <input type="text" name="phone" class="form-control" id="edit_phone" placeholder="" value="" >
                                    </fieldset>
                                    <fieldset class="form-group col-md-6 floating-label-form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="edit_email" placeholder="" value="" >
                                    </fieldset>
                                    <fieldset class="form-group col-md-6 floating-label-form-group">
                                        <label for="date_of_birth">Date Of Birth</label>
                                        <input type="date" name="date_of_birth" class="form-control" id="edit_date_of_birth" placeholder="" value="" >
                                    </fieldset>
                                    <fieldset class="form-group col-md-6 floating-label-form-group">
                                        <label for="date_of_anniversary">Date Of Anniversary</label>
                                        <input type="date" name="date_of_anniversary" class="form-control" id="edit_date_of_anniversary" placeholder="" value="" >
                                    </fieldset>
                                    <fieldset class="form-group col-md-6 floating-label-form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" id="edit_address" placeholder="" value="" >
                                    </fieldset>
                                    <fieldset class="form-group col-md-6 floating-label-form-group">
                                        <label for="gst_number">Gst Number</label>
                                        <input type="text" name="gst_number" class="form-control" id="edit_gst_number" placeholder="" value="" >
                                    </fieldset>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                                <input type="submit" id="submitBtn" class="btn btn-outline-primary" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>


{{--            Total Payable Modal--}}

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


        </div>
    </section>
@endsection

@section('script')
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
        }
    </script>
@endsection
