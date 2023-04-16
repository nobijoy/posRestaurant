@extends('master.admin.master')
@section('title', 'Supplier Payment')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-4 mb-1">
                <h3 class="content-header-title">
                    <a href="#" data-toggle="modal" data-target="#add_payment" class="btn btn-primary">Supplier Due Payment <i class="fa fa-plus"></i></a>
                </h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route ('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Supplier</a></li>
                            <li class="breadcrumb-item active"><a href="#">Supplier Payments</a></li>
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
                                                <th>ID</th>
                                                <th>Company Name</th>
                                                <th>Payment Method</th>
                                                <th>Receipt No</th>
                                                <th>Payment Amount</th>
                                                <th>Payment Time</th>
                                                <th>Added By</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if (sizeof ($datas) > 0)
                                                @foreach ($datas as $data)
                                                    <tr>
                                                        <td>{{++$sl}}</td>
                                                        <td>{{$data->name ? $data->supplierInfo->name: ''}}</td>
                                                        <td>{{$data->payment_method }}</td>
                                                        <td>{{$data->receipt_number}}</td>
                                                        <td>{{$data->amount}}</td>
                                                        <td>{{$data->payment_time}}</td>
                                                        <td>{{$data->created_by ? $data->createdBy->name: ''}}</td>
                                                        <td>
                                                            @if($data->is_active == 1)
                                                                <a data-toggle="modal" data-target="#edit_payment" data-target-id="{{$data->id}}"
                                                                   data-name="{{$data->name}}" data-receipt_number="{{$data->receipt_number}}" data-amount="{{$data->amount}}"
                                                                   data-payment_time="{{$data->payment_time}}" data-payment="{{ $data->payment_method }}">
                                                                    <button type="button" title="Edit" class="btn btn-icon btn-outline-primary btn-sm">
                                                                        <i class="fa fa-pencil-square"></i></button>
                                                                </a>
                                                                <button type="button" class="btn btn-icon btn-outline-danger btn-sm" title="Inactive"
                                                                        onclick="deleteData('{{ route('supplier_payment.delete', [$data->id]) }}')">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </button>
                                                            @else
                                                                <button type="button" class="btn btn-icon btn-outline-primary btn-sm" title="Restore"
                                                                        onclick="restoreData('{{ route('supplier_payment.restore', [$data->id]) }}')">
                                                                    <i class="fa fa-undo" aria-hidden="true"></i>
                                                                </button>
                                                            @endif
                                                        </td>
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

        <!-- Start Edit Modal -->
        <div class="modal fade text-left" id="add_payment" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Add Payment Info</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('supplier_payment.store')}}" method="POST"  class="clearForm form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="name">Supplier Name<span class="text-danger">*</span></label>
                                <select name="name" id="name" class="select2 form-control" required>
                                    <option value="" >Select</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="receipt_number">Receipt Number<span class="text-danger">*</span></label>
                                <select name="receipt_number" id="receipt_number" class="select2 form-control" required>
                                    <option value="" >Select</option>

                                </select>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="payment_method">Payment Method<span class="text-danger">*</span></label>
                                <select name="payment_method" id="payment_method" class="select2 form-control" required>
                                    <option value="" >Select</option>
                                    <option value="cash">Cash</option>
                                    <option value="bkash">Bkash</option>
                                    <option value="nagad">Nagad</option>
                                    <option value="rocket">Rocket</option>
                                    <option value="credit">Credit </option>
                                    <option value="debit">Debit</option>
                                    <option value="check">Check</option>
                                    <option value="bank_transfer">Bank Transfer</option>
                                </select>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="amount">Amount<span class="text-danger">*</span></label>
                                <input type="number" name="amount" class="form-control" id="amount" placeholder="" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="payment_time">Payment Time<span class="text-danger">*</span></label>
                                <input type="datetime-local" name="payment_time" class="form-control" id="payment_time" value="" required>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                            <input type="submit" id="submitBtn" class="btn btn-outline-primary" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Add Modal -->

        <!-- Start Add Modal -->
        <div class="modal fade text-left" id="edit_payment" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Edit Payment Info</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('supplier_payment.update')}}" method="POST"  class="clearForm form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="edit_name">Supplier Name<span class="text-danger">*</span></label>
                                <select name="name" id="edit_name" class="select2 form-control" required>
                                    <option value="" >Select</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="edit_receipt_number">Receipt Number<span class="text-danger">*</span></label>
                                <select name="receipt_number" id="edit_receipt_number" class="select2 form-control" required>
                                    <option value="" >Select</option>

                                </select>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="edit_payment_method">Payment Method<span class="text-danger">*</span></label>
                                <select name="payment_method" id="edit_payment_method" class="select2 form-control" required>
                                    <option value="" >Select</option>
                                    <option value="cash">Cash</option>
                                    <option value="bkash">Bkash</option>
                                    <option value="nagad">Nagad</option>
                                    <option value="rocket">Rocket</option>
                                    <option value="credit">Credit </option>
                                    <option value="debit">Debit</option>
                                    <option value="check">Check</option>
                                    <option value="bank_transfer">Bank Transfer</option>
                                </select>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="amount">Amount<span class="text-danger">*</span></label>
                                <input type="number" name="amount" class="form-control" id="edit_amount" placeholder="" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="payment_time">Payment Time<span class="text-danger">*</span></label>
                                <input type="datetime-local" name="payment_time" class="form-control" id="edit_payment_time" value="" required>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                            <input type="submit" id="submitBtn" class="btn btn-outline-primary" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Add Modal -->
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $("#edit_payment").on("show.bs.modal", function (e) {
            var id = $(e.relatedTarget).data('target-id');
            var name = $(e.relatedTarget).data('name');
            var receipt_number = $(e.relatedTarget).data('receipt_number');
            var amount = $(e.relatedTarget).data('amount');
            var payment_time = $(e.relatedTarget).data('payment_time');
            var payment = $(e.relatedTarget).data('payment');


            $('.modal-body #id').val(id);
            $('.modal-body #edit_name').val(name).change();
            $('.modal-body #edit_receipt_number').val(receipt_number).change();
            $('.modal-body #edit_amount').val(amount);
            $('.modal-body #edit_payment_time').val(payment_time);
            $('.modal-body #edit_payment_method').val(payment).change();

            $('#edit_name').on('change', function () {
                var id = $(this).val();
                var url = "{{route('getReceiptBySupplier')}}";
                if(id != ''){
                    getReceiptBySupplier(id, url, '#edit_receipt_number');
                }else{
                    var output = '<option value="">No data available</option>';
                    $('#edit_designation').html(output) ;
                }
            });
            $('.select2').select2();
        });

        $("#add_payment").on("show.bs.modal", function (e) {
            $('#name').on('change', function () {
                var id = $(this).val();
                var url = "{{route('getReceiptBySupplier')}}";
                if(id != ''){
                    getReceiptBySupplier(id, url, '#receipt_number');
                }else{
                    var output = '<option value="">No data available</option>';
                    $('#designation').html(output) ;
                }
            });

            $('.select2').select2();
        });

        function getReceiptBySupplier(id, url, view) {
            $.ajax({
                url: url,
                type: "get",
                data: {
                    "id": id,
                },
                contentType: "application/json;charset=UTF-8",
                dataType: "json",
                success: function (data) {

                    if (data.length > 0) {
                        var output = '<option value="">Select</option>';
                        $.each(data, function (index, value) {
                            console.log(value);
                            output += '<option value="' + value['id'] + '">' + value['reference_no'] + '</option>';
                        });
                    } else {
                        var output = '<option value="">No data available</option>';
                    }
                    $(view).html(output);
                },

                error: function (e) {
                    console.log(e);
                }
            });
        }

        $("#edit_payment").on("hide.bs.modal", function (e) {
            location.reload();
        });
    </script>
@endsection

