@extends('master.admin.master')
@section('title', 'Printer Setup')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h1>Printer Setup</h1>
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

            <section id="basic-form-layouts">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content collpase show">
                                <div class="card-body">
                                    <form class="form" method="post" action="{{ route ('setting') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row form-group col-md-12 mb-2 mx-auto">
                                            <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                <label for="printing_invoice">Printing (Invoice) </label>
                                                <select name="printing_invoice" id="printing_invoice" class="form-control select2">
                                                    <option value="">Select</option>
                                                    <option value="1"  >Service</option>
                                                    <option value="2"  >Delivery</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                <label for="printing_invoice_receipt">Receipt Printer</label>
                                                <select name="printing_invoice_receipt" id="printing_invoice_receipt" class="form-control select2">
                                                    <option value="">Select</option>
                                                    <option value="1"  >Service</option>
                                                    <option value="2"  >Delivery</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                <label for="printing_bill">Printing (Bill)</label>
                                                <select name="printing_bill" id="printing_bill" class="form-control select2">
                                                    <option value="">Select</option>
                                                    <option value="1"  >Service</option>
                                                    <option value="2"  >Delivery</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                <label for="printing_bill_receipt">Receipt Printer</label>
                                                <select name="printing_bill_receipt" id="printing_bill_receipt" class="form-control select2">
                                                    <option value="">Select</option>
                                                    <option value="1"  >Service</option>
                                                    <option value="2"  >Delivery</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                <label for="printing_kot">Printing (KOT)</label>
                                                <select name="printing_kot" id="printing_kot" class="form-control select2">
                                                    <option value="">Select</option>
                                                    <option value="1"  >Service</option>
                                                    <option value="2"  >Delivery</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                <label for="printing_kot_receipt">Receipt Printer</label>
                                                <select name="printing_kot_receipt" id="printing_kot_receipt" class="form-control select2">
                                                    <option value="">Select</option>
                                                    <option value="1"  >Service</option>
                                                    <option value="2"  >Delivery</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-3 ">
                                                <label for="print_server">Print Server URL <span class="text-danger">*</span></label>
                                                <input type="text" id="print_server" class="form-control" placeholder="" name="print_server" value="">
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-3 ">
                                            </div>

                                            <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                <label for="printing_bot">Printing (BOT)</label>
                                                <select name="printing_bot" id="printing_bot" class="form-control select2">
                                                    <option value="">Select</option>
                                                    <option value="1"  >Service</option>
                                                    <option value="2"  >Delivery</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                <label for="printing_bot_receipt">Receipt Printer</label>
                                                <select name="printing_bot_receipt" id="printing_bot_receipt" class="form-control select2">
                                                    <option value="">Select</option>
                                                    <option value="1"  >Service</option>
                                                    <option value="2"  >Delivery</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-group col-md-12 mb-2 mx-auto ms-2">
                                            <div class="col-sm-4 col-md-3 col-lg-3 mt-2">
                                                <button type="submit" class="btn d-block btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>
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
