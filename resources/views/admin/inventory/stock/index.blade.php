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
            <div class="content-header-right col-md-3 col-12 mb-1">
                <h3 class="content-header-title">
                    <a href="" class="btn btn-secondary w-100 font-weight-bolder"><span class="text-danger ">188</span> items in alert</a>
                </h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-3 col-12 text-right font-size-large ">
                <div class="breadcrumb-wrapper col-12 mt-1">
                    <p class="font-weight-bolder">Stock Value: 137561040.38</p>
                </div>
            </div>
        </div>
        <div class="content-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
        @endif
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
                                                @if(sizeof($ingredients) > 0)
                                                    @foreach($ingredients as $ingredient)
                                                        <tr>
                                                            <td>{{$sl++}}</td>
                                                            <td>{{$ingredient->name}} ({{$ingredient->code}})</td>
                                                            <td>{{$ingredient->category_id}}</td>
                                                            <td>{{$ingredient->warehouse}}</td>
                                                            <td></td>
                                                            <td>{{$ingredient->alert_qty}} ({{$ingredient->unit_id}})</td>
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
