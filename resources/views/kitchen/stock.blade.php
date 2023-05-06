@extends('master.admin.master')
@section('title', 'Kitchen Stock')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title text-primary">
                    Kitchen Stock
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
                                                <th>Stock Qty/Amount</th>
                                            </tr>
                                            </thead>
                                                <tbody>
                                                    @if(sizeof($stocks) > 0)
                                                        @foreach($stocks as $stock)
                                                            <tr>
                                                                <td>{{$sl++}}</td>
                                                                <td>{{$stock->ingredients->name ?? '' }} ({{$stock->ingredients->code ?? '' }})</td>
                                                                <td>{{$stock->ingredients->category->name ?? ''}}</td>
                                                                <td>{{$stock->total_purchased }} {{$stock->ingredients->unit->name ?? ''}}</td>
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
