@extends('master.admin.master')
@section('title', 'Settings')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h1>Setting</h1>
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
                                                    <label for="name">Restaurant Name <span class="text-danger">*</span></label>
                                                    <input type="text" id="name" class="form-control" placeholder="" name="name" value="">
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="invoice_logo" class="text-left">Invoice Logo</label>
                                                    <a class="btn btn-sm btn-primary text-white text-right">Show</a>
                                                    <input type="file" id="invoice_logo" class="form-control" placeholder="" name="invoice_logo" value="">
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="website">Website</label>
                                                    <input type="text" id="website" class="form-control" placeholder="" name="website" value="">
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="date_format">Date Format <span class="text-danger">*</span></label>
                                                    <select name="date_format" id="date_format" class="form-control select2">
                                                        <option value="">Select</option>
                                                        <option value="1"  >D/M/Y</option>
                                                        <option value="2"  >M/D/Y</option>
                                                        <option value="3"  >Y/M/D</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="time_zone">Time Zone <span class="text-danger">*</span></label>
                                                    <select name="time_zone" id="time_zone" class="form-control select2">
                                                        <option value="">Select</option>
                                                        <option value="1"  >Asia/Karachi</option>
                                                        <option value="2"  >Asia/India</option>
                                                        <option value="3"  >Asia/Bangladesh</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="currency_symbol">Currency Symbol <span class="text-danger">*</span></label>
                                                    <input type="text" id="currency_symbol" class="form-control" placeholder="" name="currency_symbol" value="">
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="currency_position">Currency Position </label>
                                                    <select name="currency_position" id="currency_position" class="form-control select2">
                                                        <option value="">Select</option>
                                                        <option value="1"  >Before Currency</option>
                                                        <option value="2"  >After Currency</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="precision">Precision</label>
                                                    <select name="precision" id="precision" class="form-control select2">
                                                        <option value="">Select</option>
                                                        <option value="1"  >2 Digits</option>
                                                        <option value="2"  >3 Digits</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="default_waiter">Default Waiter</label>
                                                    <select name="default_waiter" id="default_waiter" class="form-control select2">
                                                        <option value="">Select</option>
                                                        <option value="1"  >Rahim</option>
                                                        <option value="2"  >Karim</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="default_customer">Default Customer</label>
                                                    <select name="default_customer" id="default_customer" class="form-control select2">
                                                        <option value="">Select</option>
                                                        <option value="1"  >Mr. Marshall</option>
                                                        <option value="2"  >Md. Adbur Rauf</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="payment_method">Default Payemnt Method</label>
                                                    <select name="payment_method" id="payment_method" class="form-control select2">
                                                        <option value="">Select</option>
                                                        <option value="1"  >BKash</option>
                                                        <option value="2"  >Rocket</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="charge_type">Charge Type</label>
                                                    <select name="charge_type" id="charge_type" class="form-control select2">
                                                        <option value="1"  >Service</option>
                                                        <option value="2"  >Delivery</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="charge_amount">Charge (Percentage/Amount) <span class="text-danger">*</span></label>
                                                    <input type="text" id="charge_amount" class="form-control" placeholder="" name="charge_amount" value="">
                                                </div>
                                            </div>

                                            <div class="row form-group col-md-12 mb-2 mx-auto">
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="payment_system">Pre or Post Payment <span class="text-danger">*</span></label>
{{--                                                    <input type="text" id="payment_system" class="form-control" placeholder="" name="payment_system" value="">--}}
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Pre Payment
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Post Payment
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form-group col-md-12 mb-2 mx-auto">
                                                <div class="col-sm-12 col-md-4 col-lg-3 mb-2">
                                                    <label for="export_sales">Export Daily Sales & Reset All Sales</label>
                                                    <select name="export_sales" id="export_sales" class="form-control select2">
                                                        <option value="1" selected >Enable</option>
                                                        <option value="2"  >Disable</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mt-2">
                                                    <a class="btn btn-primary font-weight-bolder text-white">Reset Transactional Data</a>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 ">
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 ">
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mt-2">
                                                    <a class="btn btn-primary font-weight-bolder text-white">White Label</a>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mt-2">
                                                    <a class="btn btn-primary font-weight-bolder text-white">Printers</a>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mt-2">
                                                    <a class="btn btn-primary font-weight-bolder text-white">Tax Settings</a>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mt-2">
                                                    <a class="btn btn-primary font-weight-bolder text-white">Software Update</a>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 mt-2">
                                                    <a class="btn btn-primary font-weight-bolder text-white">License Transfer</a>
                                                </div>
                                            </div>

                                            <div class="row form-group col-md-12 mb-2 mx-auto">
                                                <div class="col-sm-12 col-md-6 col-lg-6 mt-2">
                                                    <label>Invoice Footer</label>
                                                    <textarea id="invoice_footer" rows="6" name="invoice_footer" class="form-control" placeholder="Invoice Footer">Thank You!</textarea>
                                                </div>
                                            </div>
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
                                                <div class="col-sm-12 col-md-4 col-lg-3 ">
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 ">
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
                                                <div class="col-sm-12 col-md-4 col-lg-3 ">
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-3 ">
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


                                            <div class="form-group col-md-12 mb-2 mx-auto my-md-4 ms-2">
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
