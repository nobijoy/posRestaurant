@extends('layouts.pos.master')

@section('title', 'POS')

@section('body')

    <section class="mt-1">
        <div class="row">

{{--            running order card start--}}

            <div class="col-md-2">
                <div class="ml-1 card rounded">
                    <div class="card-header py-0 mx-auto">
                        <h4 class="text-center mb-0 font-weight-bold">Running Orders<span class="btn text-primary"><i class="feather icon-repeat"></i></span></h4>
                        <input type="text" name="" id="" class="mb-1 rounded form-control" placeholder="Search here">
                    </div>
                    <div class="card-body bg-light-grey-blue h-50 overflow-y-scroll">
                        <div class="border-black bg-white mb-1 p-1 line-height-1 rounded">
                            <p>Cust: Walk-in Customer</p>
                            <p>Order: rKK230305-001</p>
                            <p>Order Type: Dine In</p>
                            <p>Table: None</p>
                            <p>Waiter: Rakesh</p>
                        </div>

                    </div>
                    <div class="card-footer h-auto p-0 pt-1">
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
{{--                Running order card end--}}


            <div class="col-md-4">
                <div class="card vh-100 rounded">
                    <div class="card-header">
                        <div class="row d-flex align-items-center text-center">
                            <div class="col-3">
                                <button class="btn w-100 bg-light-grey-blue mb-1 ml-auto font-weight-bold">Dine In <i class="feather icon-grid"></i></button>
                            </div>
                            <div class="col-3">
                                <button class="btn w-100 bg-light-grey-blue mb-1 mx-auto font-weight-bold">Takeaway <i class="feather icon-shopping-bag"></i></button>
                            </div>
                            <div class="col-3">
                                <button class="btn w-100 bg-light-grey-blue mb-1 mx-auto font-weight-bold">Delivary <i class="feather icon-truck"></i></button>
                            </div>
                            <div class="col-">
                                <button class="btn w-100 bg-light-grey-blue mb-1 mx-auto font-weight-bold">Table <i class="feather icon-grid"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="mr-1 card vh-100 rounded">
                    <h3>item</h3>
                </div>
            </div>
        </div>
    </section>
@endsection
