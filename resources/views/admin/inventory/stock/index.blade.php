@extends('master.admin.master')
@section('title', 'Stock Item')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title text-primary">
                    Stock Item
                </h3>
            </div>
{{--            <div class="content-header-right col-md-3 col-12 mb-1">--}}
{{--                <h3 class="content-header-title">--}}
{{--                    <a href="" class="btn btn-secondary w-100 font-weight-bolder"><span class="text-danger ">188</span> items in alert</a>--}}
{{--                </h3>--}}
{{--            </div>--}}
{{--            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-3 col-12 text-right font-size-large ">--}}
{{--                <div class="breadcrumb-wrapper col-12 mt-1">--}}
{{--                    <p class="font-weight-bolder">Stock Value: 137561040.38</p>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <div class="content-body">
        <!-- Column selectors table -->
            <section id="column-selectors">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" id="action-table">
                                            <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Ingredient(Code)</th>
                                                <th>Category</th>
                                                <th>Warehouse</th>
                                                <th>Stock Qty/Amount</th>
                                                <th>Alert Qty/Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @if(sizeof($stocks) > 0)
                                                    @foreach($stocks as $stock)
                                                        <tr>
                                                            <td>{{$sl++}}</td>
                                                            <td>{{$stock->ingredients->name ?? '' }} ({{$stock->ingredients->code ?? '' }})</td>
                                                            <td>{{$stock->ingredients->category->name ?? ''}}</td>
                                                            <td>{{$stock->ingredients->warehouseInfo->name ?? ''}}</td>
                                                            <td @if($stock->total_purchased <= $stock->ingredients->alert_qty) class="text-danger font-weight-bold" @endif>{{$stock->total_purchased }} {{$stock->ingredients->unit->name ?? ''}}</td>
                                                            <td>{{$stock->ingredients->alert_qty ?? ''}} {{$stock->ingredients->unit->name ?? ''}}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                            <tfoot class="display-hidden">
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Column selectors table -->
        </div>
    </div>
@endsection
@section('script')
@endsection
