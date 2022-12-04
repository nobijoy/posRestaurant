@extends('master.admin.master')
@section('title', 'SMTP Mail Configuration')
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
                        <li class="breadcrumb-item active"><a href="#">SMTP Mail Configuration</a>
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
                                    <form class="form" method="post" action="" enctype="multipart/form-data">
                                        @csrf
                                        <h4 class="form-section">SMTP Mail Configuration</h4>
                                        <div class="row align-items-center d-block">

                                            <div class="form-group col-md-6 mb-2 mx-auto ">
                                                <input type="checkbox" id="switchery" role="switch" class="switchery form-switch" checked />
                                                <label for="switchery" class="font-medium-2 text-bold-600 ml-1">Switchery Default</label>
                                            </div>

                                            <div class="form-group col-md-6 mb-2 mx-auto">
                                                <label for="mail_driver">Mail Driver</label>
                                                <input type="text" id="mail_driver" class="form-control" placeholder="" name="mail_driver" value="">
                                            </div>

                                            <div class="form-group col-md-6 mb-2 mx-auto">
                                                <label for="mail_host">Mail Host</label>
                                                <input type="email" id="mail_host" class="form-control" placeholder="" name="mail_host" value="">
                                            </div>

                                            <div class="form-group col-md-6 mb-2 mx-auto">
                                                <label for="mail_port">Mail Port</label>
                                                <input type="text" id="mail_port" class="form-control" placeholder="" name="mail_port" value="">
                                            </div>

                                            <div class="form-group col-md-6 mb-2 mx-auto">
                                                <label for="mail_encryption">Mail Encryption</label>
                                                <input type="text" id="mail_encryption" class="form-control" placeholder="" name="mail_encryption" value="">
                                            </div>

                                            <div class="form-group col-md-6 mb-2 mx-auto">
                                                <label for="mail_name">Mail Username</label>
                                                <input type="text" id="mail_name" class="form-control" placeholder="" name="mail_name" value="">
                                            </div>

                                            <div class="form-group col-md-6 mb-2 mx-auto">
                                                <label for="password">Mail Password</label>
                                                <input type="password" id="password" class="form-control" placeholder="" name="password" value="">
                                            </div>

                                            <div class="form-group col-md-6 mb-2 mx-auto">
                                                <label for="name">Mail From Name</label>
                                                <input type="text" id="name" class="form-control" placeholder="" name="name" value="">
                                            </div>

                                            <div class="form-group col-md-6 mb-2 mx-auto">
                                                <label for="mail_address">Mail From Address</label>
                                                <input type="text" id="mail_address" class="form-control" placeholder="" name="mail_address" value="">
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
