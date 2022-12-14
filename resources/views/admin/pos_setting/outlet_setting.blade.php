@extends('master.admin.master')
@section('title', 'Outlet Settings')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Setup</a>
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Outlet Settings</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Column selectors table -->
            <section id="basic-form-layouts">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content collpase show">
                                <div class="card-body">
                                    <form class="form" method="post" action="{{ route ('outlet_setting') }}" enctype="multipart/form-data">
                                        @csrf
                                        <h4 class="form-section">Outlet Settings</h4>
                                        <div class="row align-items-center d-block">
                                            <div class="form-group col-md-6 mb-2 mx-auto">
                                                <label for="name">User Name</label>
                                                <input type="text" id="name" class="form-control" placeholder="" name="name" value="{{$data ? $data->name : ''}}">
                                            </div>
                                            <div class="form-group col-md-6 mb-2 mx-auto">
                                                <label for="email">Email</label>
                                                <input type="email" id="email" class="form-control" placeholder="" name="email" value="{{$data ? $data->email : ''}}">
                                            </div>
                                            <div class="form-group col-md-6 mb-2 mx-auto">
                                                <label for="phone">Phone No.</label>
                                                <input type="text" id="phone" class="form-control" placeholder="" name="phone" value="{{$data ? $data->phone : ''}}">
                                            </div>
                                            <div class="form-group col-md-6 mb-2 mx-auto">
                                                <label for="address">Address</label>
                                                <input type="text" id="address" class="form-control" placeholder="" name="address" value="{{$data ? $data->address : ''}}">
                                            </div>

                                            <div class="form-group col-md-6 mb-2 mx-auto text-right">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="feather icon-x"></i> Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Save
                                                </button>
                                            </div>

                                        </div>


                                    </form>
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
