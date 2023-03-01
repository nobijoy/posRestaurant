@extends('master.admin.master')
@section('title', 'Expenses')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">
                    <a href="#" data-toggle="modal" data-target="#addexpense" class="btn btn-primary">Add Expense <i class="fa fa-plus"></i></a>
                </h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route ('home') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="#">Expenses</a></li>
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
                                                <th>Date</th>
                                                <th>Responsible Person</th>
                                                <th>Amount</th>
                                                <th>Category</th>
                                                <th>Note</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if (sizeof ($datas) > 0)
                                                @foreach ($datas as $data)
                                                    <tr>
                                                        <td>{{++$sl}}</td>
                                                        <td>{{$data->date}}</td>
                                                        <td>{{$data->responsible_person ? $data->employeeinfo->name: ''}}</td>
                                                        <td>{{$data->amount}}</td>
                                                        <td>{{$data->category ? $data->categoryInfo->name: ''}}</td>
                                                        <td>{{$data->note}}</td>
                                                        <td>
                                                            @if($data->is_active == 1)
                                                                <a data-toggle="modal" data-target="#editTable"
                                                                   data-target-id="{{$data->id}}" data-date="{{$data->date}}"
                                                                   data-responsible_person="{{$data->responsible_person}}" data-amount="{{$data->amount}}"
                                                                   data-category="{{$data->category}}" data-note="{{$data->note}}">
                                                                    <button type="button" title="Edit"
                                                                            class="btn btn-icon btn-outline-primary btn-sm">
                                                                        <i class="fa fa-pencil-square"></i></button>
                                                                </a>
                                                                <button type="button" class="btn btn-icon btn-outline-danger btn-sm"
                                                                        title="Inactive"
                                                                        onclick="deleteData('{{ route('expense.delete', [$data->id]) }}')">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </button>
                                                            @else
                                                                <button type="button"
                                                                        class="btn btn-icon btn-outline-primary btn-sm" title="Restore"
                                                                        onclick="">
                                                                    <i class="fa fa-undo" aria-hidden="true"></i>
                                                                </button>
                                                            @endif
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

        <!-- Start Add Modal -->
        <div class="modal fade text-left" id="addexpense" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Add Expense</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route ('expense.store') }}" method="post" class="clearForm form"
                          enctype="multipart/form-data">@csrf
                        <div class="modal-body">
                            <div class="row">
                                <fieldset class="col-md-6 form-group floating-label-form-group">
                                    <label for="date">Date<span class="text-danger">*</span></label>
                                    <input type="date" name="date" class="form-control" id="date" value="{{date('Y-m-d')}}" required>
                                </fieldset>
                                <fieldset class="col-md-6 form-group floating-label-form-group">
                                    <label for="responsible_person">Responsible Person<span class="text-danger">*</span></label>
                                    <select name="responsible_person" id="responsible_person" class="form-control select2" >
                                        <option value="">Select</option>
                                        @foreach ($res_persons as $person)
                                            <option value="{{$person->id}}">{{$person->name}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                                <fieldset class="col-md-6 form-group floating-label-form-group">
                                    <label for="amount">Amount<span class="text-danger">*</span></label>
                                    <input type="number" name="amount" class="form-control" id="amount" placeholder="Enter total amount">
                                </fieldset>
                                <fieldset class="col-md-6 form-group floating-label-form-group">
                                    <label for="category">Category<span class="text-danger">*</span></label>
                                    <select name="category" id="category" class="form-control select2" required>
                                        <option value="">Select</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="note">Note<span class="text-danger">*</span></label>
                                    <textarea name="note" class="form-control" id="note" placeholder="Enter note" value=""></textarea>
                                </fieldset>
                            </div>
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
        <div class="modal fade text-left" id="editTable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Edit Expenses Item</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route ('expense.update') }}" method="post" class="clearForm form"
                          enctype="multipart/form-data">@csrf
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            <div class="row">
                                <fieldset class="col-md-6 form-group floating-label-form-group">
                                    <label for="date">Date<span class="text-danger">*</span></label>
                                    <input type="date" name="date" class="form-control" id="edit_date" required>
                                </fieldset>
                                <fieldset class="col-md-6 form-group floating-label-form-group">
                                    <label for="responsible_person">Responsible Person<span class="text-danger">*</span></label>
                                    <select name="responsible_person" id="edit_responsible_person" class="form-control select2" required>
                                        <option value="">Select</option>
                                        @foreach ($res_persons as $person)
                                            <option value="{{$person->id}}">{{$person->name}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                                <fieldset class="col-md-6 form-group floating-label-form-group">
                                    <label for="amount">Amount<span class="text-danger">*</span></label>
                                    <input type="number" name="amount" class="form-control" id="edit_amount" placeholder="Enter total amount">
                                </fieldset>
                                <fieldset class="col-md-6 form-group floating-label-form-group">
                                    <label for="category">Category<span class="text-danger">*</span></label>
                                    <select name="category" id="edit_category" class="form-control select2" required>
                                        <option value="">Select</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="note">Note<span class="text-danger">*</span></label>
                                    <textarea name="note" class="form-control" id="edit_note" placeholder="Enter note" value=""></textarea>
                                </fieldset>
                            </div>
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
        $("#editTable").on("show.bs.modal", function (e) {
            var id = $(e.relatedTarget).data('target-id');
            var date = $(e.relatedTarget).data('date');
            var responsible_person = $(e.relatedTarget).data('responsible_person');
            var category = $(e.relatedTarget).data('category');
            var amount = $(e.relatedTarget).data('amount');
            var note = $(e.relatedTarget).data('note');

            $('.modal-body #id').val(id);
            $('.modal-body #edit_date').val(date);
            $('.modal-body #edit_responsible_person').val(responsible_person).change();
            $('.modal-body #edit_amount').val(amount);
            $('.modal-body #edit_category').val(category).change();
            $('.modal-body #edit_note').val(note);

        });

        $("#editTable").on("hide.bs.modal", function (e) {
            location.reload();
        });
    </script>
@endsection
