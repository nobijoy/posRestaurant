@extends('master.admin.master')
@section('title', 'Add Stock Item')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">
                    <a href="{{ route ('stock_adjustment.add')}}" class="btn btn-primary">Add Stock Item <i class="fa fa-plus"></i></a>
                </h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Inventory</a>
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Stock Adjustment List</a>
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
                                                <th>Ingredient Count</th>
                                                <th>Responsible Person</th>
                                                <th>Note</th>
                                                <th>Added By</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
{{--                                                        <td>--}}
{{--                                                                <a href="{{route('stock_adjustment.edit')}}">--}}
{{--                                                                    <button type="button" title="Edit" class="btn btn-icon btn-outline-primary btn-sm">--}}
{{--                                                                        <i class="fa fa-pencil-square"></i></button>--}}
{{--                                                                </a>--}}
{{--                                                                <button type="button" class="btn btn-icon btn-outline-danger btn-sm" title="Inactive"--}}
{{--                                                                        onclick="">--}}
{{--                                                                    <i class="fa fa-trash" aria-hidden="true"></i>--}}
{{--                                                                </button>--}}
{{--                                                                <button type="button" class="btn btn-icon btn-outline-primary btn-sm" title="Restore"--}}
{{--                                                                        onclick="">--}}
{{--                                                                    <i class="fa fa-undo" aria-hidden="true"></i>--}}
{{--                                                                </button>--}}
{{--                                                        </td>--}}
                                                    </tr>
                                            </tbody>
                                            <tfoot class="display-hidden">
                                            <tr>

                                            </tr>
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
