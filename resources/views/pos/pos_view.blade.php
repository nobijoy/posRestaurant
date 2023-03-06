@extends('layouts.pos.master')

@section('title', 'POS')

@section('body')

    <section class="mt-1">
        <div class="row ">
           {{-- running order card start --}}
            <div class="col-md-2">
                <div class="row ml-1 card rounded">
                    <div class="card-header py-0 mx-auto">
                        <h4 class="text-center mb-0 font-weight-bold">Running Orders<span class="btn text-primary"><i class="feather icon-repeat"></i></span></h4>
                        <input type="text" name="" id="" class="mb-1 rounded form-control" placeholder="Search here">
                    </div>
                    <div class="card-body bg-light-grey-blue pos-left-items overflow-y-scroll mb-1">
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


            <div class="col-md-5 ">
                <div class="vh-100 card rounded mb-2">
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
                                    <option value="">Waiter1</option>
                                    <option value="">Waiter2</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select name="customer_list" id="customer_list" class="form-control select2" required>
                                    <option value="" selected>Select</option>
                                    <option value="">Customer1</option>
                                    <option value="">Customer1</option>
                                </select>
                            </div>
                            <div class="col-md-2 px-0">
                                <a href="" class="btn btn-secondary">
                                    <i class="feather icon-edit"></i>
                                </a>
                                <a href="" class="btn btn-secondary">
                                    <i class="feather icon-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pos-scroll-item">
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
                                <a href="" class="font-size-large col-md-12 btn btn-secondary">
                                    <i class="feather icon-eye"></i>
                                    Total Payable:
                                    4535.00
                                </a>
                            </div>
                            <div class="col-md-12 mt-1">
                                <div class="row">
                                    <div class="col-3">
                                        <button class="btn w-100 bg-danger mb-1 ml-auto font-weight-bold">Cancel</button>
                                    </div>
                                    <div class="col-3">
                                        <button class="btn w-100 bg-purple mb-1 mx-auto font-weight-bold">Draft</button>
                                    </div>
                                    <div class="col-3">
                                        <button class="btn w-100 bg-primary mb-1 mx-auto font-weight-bold">Quick Invoice</button>
                                    </div>
                                    <div class="col-3">
                                        <button class="btn w-100 bg-success mb-1 mx-auto font-weight-bold">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-5 pl-0">
                <div class="mr-1 card vh-100 rounded">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-md-12">
                                <input class="mb-1 rounded form-control" type="text" name="search" id="search" placeholder="&#x1F50E;&#xFE0E; Name or Code or Category or VEG or BEV or BAR">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2 pos-scroll-item pl-0 pr-1">
                                    <div class="px-0 mb-1">
                                        <a class="btn bg-light-grey-blue btn-block">All</a>
                                    </div>
                                    <div class="px-0 mb-1">
                                        <a class="btn bg-light-grey-blue btn-block">Chinese</a>
                                    </div>
                                    <div class="px-0 mb-1">
                                        <a class="btn bg-light-grey-blue btn-block">Italian</a>
                                    </div>
                                    <div class="px-0 mb-1">
                                        <a class="btn bg-light-grey-blue btn-block">Fast Food</a>
                                    </div>
                                    <div class="px-0 mb-1">
                                        <a class="btn bg-light-grey-blue btn-block">Bevarage</a>
                                    </div>
                                    <div class="px-0 mb-1">
                                        <a class="btn bg-light-grey-blue btn-block">Mexican</a>
                                    </div>
                                    <div class="px-0 mb-1">
                                        <a class="btn bg-light-grey-blue btn-block">Indian</a>
                                    </div>
                                </div>


                                <div class="col-md-10 pos-scroll-item">
                                    <div class="row">
                                        <div class="col-md-3 ">
                                            <div class="card ">
                                                <div class="card-content box-shadow-1 rounded">
                                                    <img class="food-item-img img-fluid" src="public\app-assets\images\banner\banner-23.jpg" alt="Card image cap">
                                                    <div class="card-body p-0 text-center">
                                                        <h6 class="">Hot & Sour Soup <br>Price: 1200 </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
