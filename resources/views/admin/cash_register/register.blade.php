@extends('master.admin.master')
@section('title', 'Register Details')
@section('body')


    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h1>Register Details</h1>
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
                                    <form class="form" method="post" action="{{ route ('setting') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class=" align-items-center d-block">
                                            <div class="row form-group col-md-12 mb-2 mx-auto">
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="cash">Cash <span class="text-danger">*</span></label>
                                                    <input type="number" id="cash" class="form-control" placeholder="0.00" name="cash" value="" required>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="credit">Credit <span class="text-danger">*</span></label>
                                                    <input type="number" id="credit" class="form-control" placeholder="0.00" name="credit" value="" required>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="debit">Debit <span class="text-danger">*</span></label>
                                                    <input type="number" id="debit" class="form-control" placeholder="0.00" name="debit" value="" required>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="check">Check <span class="text-danger">*</span></label>
                                                    <input type="number" id="check" class="form-control" placeholder="0.00" name="check" value="" required>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="bank_transfer">Bank Transfer <span class="text-danger">*</span></label>
                                                    <input type="number" id="bank_transfer" class="form-control" placeholder="0.00" name="bank_transfer" value="" required>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="bkash">Bkash <span class="text-danger">*</span></label>
                                                    <input type="number" id="bkash" class="form-control" placeholder="0.00" name="bkash" value="" required>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="rocket">Rocket <span class="text-danger">*</span></label>
                                                    <input type="number" id="rocket" class="form-control" placeholder="0.00" name="rocket" value="" required>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="nagad">Nagad <span class="text-danger">*</span></label>
                                                    <input type="number" id="nagad" class="form-control" placeholder="0.00" name="nagad" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 mx-auto ms-2">
                                                <div class="col-sm-4 col-md-3 col-lg-3">
                                                    <button type="submit" class="btn d-block btn-primary">Save</button>
                                                </div>
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
