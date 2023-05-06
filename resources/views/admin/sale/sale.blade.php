@extends('master.admin.master')
@section('title', 'Sales List')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">
                    <h4 class="font-weight-bold">Sales List</h4>
                </h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route ('home') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="#">Sale</a></li>
                        </ol>
                    </div>
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
                                                <th>Sl</th>
                                                <th>Reciept No</th>
                                                <th>Type</th>
                                                <th>Subtotal</th>
                                                <th>VAT</th>
                                                <th>Discount</th>
                                                <th>Charge</th>
                                                <th>Total</th>
                                                <th>Method</th>
                                                <th>Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if (sizeof ($sales) > 0)
                                                @foreach ($sales as $sale)
                                                    <tr>
                                                        <td>{{$sl++}}</td>
                                                        <td>{{$sale->reciept_no}}</td>
                                                        <td>{{$sale->order_type}}</td>
                                                        <td>{{$sale->subtotal}}</td>
                                                        <td>{{$sale->vat}}</td>
                                                        <td>{{$sale->discount}}</td>
                                                        <td>{{$sale->charge}}</td>
                                                        <td>{{$sale->total}}</td>
                                                        <td>{{$sale->payment_method}}</td>
                                                        <td>{{$sale->created_at}}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
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

