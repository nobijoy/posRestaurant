@extends('master.admin.master')
@section('title', 'Purchase Item')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">
                    <a href="{{ route ('purchase.create')}}" class="btn btn-primary">Add Purchase Item<i class="fa fa-plus"></i></a>
                </h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Inventory</a>
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Purchase List</a>
                        </li>
                    </ol>
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
                                                <th>Reference No</th>
                                                <th>Date</th>
                                                <th>Supplier</th>
                                                <th>Payment Method</th>
                                                <th>Grand Total</th>
                                                <th>Due</th>
                                                <th>Total Ingredient</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @if(sizeof($datas) > 0)
                                                    @foreach($datas as $data)
                                                        <tr>
                                                            <td>{{++$sl}}</td>
                                                            <td>{{$data->reference_no}}</td>
                                                            <td>{{date('Y-m-d', strtotime($data->date))}}</td>
                                                            <td>{{$data->supplier ? $data->supplierInfo->name : ''}}</td>
                                                            <td>{{$data->payment_method ? $data->paymentInfo->name : ''}}</td>
                                                            <td>{{$data->total}}</td>
                                                            <td>{{$data->due}}</td>
                                                            <td>{{$data->totalIngredient()}}</td>
                                                            <td>
                                                                <a href="{{route('purchase.edit', [$data->id])}}">
                                                                    <button type="button" title="Edit" class="btn btn-icon btn-outline-primary btn-sm">
                                                                        <i class="fa fa-pencil-square"></i></button>
                                                                </a>
                                                                <button type="button" class="btn btn-icon btn-outline-danger btn-sm" title="Inactive"
                                                                        onclick="deleteData('{{ route('purchase.delete', [$data->id]) }}')">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </button>
                                                            </td>
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
