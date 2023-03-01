@extends('master.admin.master')
@section('title', 'Attendence')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-1 col-4 mb-1">
                <h3 class="content-header-title">
                    <a href="#" data-toggle="modal"data-target="#add_attendence" class="btn btn-primary">Add Attendence</a>
                </h3>
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
                                                <th>SN</th>
                                                <th>Reference No</th>
                                                <th>Date</th>
                                                <th>Employee</th>
                                                <th>In Time</th>
                                                <th>Out Time</th>
                                                <th>Time Count</th>
                                                <th>Note</th>
                                                <th>Added By</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @if (sizeof ($datas) > 0)
                                                    @foreach ($datas as $data)
                                                        <tr>
                                                            <td>{{++$sl}}</td>
                                                            <td>{{$data->reference_no}}</td>
                                                            <td>{{$data->date}}</td>
                                                            <td>{{$data->employee ? $data->employeeInfo->name : ''}}</td>
                                                            <td>{{$data->in_time}}</td>
                                                            <td>{{$data->out_time}}</td>
                                                            <td>{{$data->time_count}} Hour</td>
                                                            <td>{{$data->note}}</td>
                                                            <td>{{$data->created_by ? $data->createdBy->name : ''}}</td>
                                                            <td>
                                                                @if($data->is_active == 1)
                                                                    <a data-toggle="modal" data-target="#edit_attendence" data-target-id="{{$data->id}}"
                                                                       data-reference_no="{{$data->reference_no}}" data-date="{{$data->date}}" data-employee="{{$data->employee}}"
                                                                       data-in_time="{{$data->in_time}}" data-out_time="{{$data->out_time}}" data-note="{{$data->note}}" >
                                                                        <button type="button" title="Edit" class="btn btn-icon btn-outline-primary btn-sm">
                                                                            <i class="fa fa-pencil-square"></i></button>
                                                                    </a>
                                                                    <button type="button" class="btn btn-icon btn-outline-danger btn-sm" title="Inactive"
                                                                            onclick="deleteData('{{ route('attendence.delete', [$data->id]) }}')">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                    </button>
                                                                @else
                                                                    <button type="button" class="btn btn-icon btn-outline-primary btn-sm" title="Restore"
                                                                            onclick="restoreData('{{ route('attendence.restore', [$data->id]) }}')">
                                                                        <i class="fa fa-undo" aria-hidden="true"></i>
                                                                    </button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>

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

        <!-- Start Add Modal -->
        <div class="modal fade text-left" id="add_attendence" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Add Attendence Info</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('attendence.store')}}" method="post"  class="clearForm form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="reference_no">Reference Number <span class="text-danger">*</span></label>
                                <input type="text" name="reference_no" class="form-control" id="reference_no" placeholder="" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="date">Date <span class="text-danger">*</span></label>
                                <input type="date" name="date" class="form-control" id="date" value="{{date('Y-m-d')}}" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="employee">Employee<span class="text-danger">*</span></label>
                                <select class="form-select w-100 select2" id="employee" name="employee" required>
                                    <option value="" selected >Select</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{$employee->id}}" >{{$employee->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="in_time">In Time <span class="text-danger">*</span></label>
                                <input type="time" name="in_time" class="form-control" id="in_time" placeholder="" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="out_time">Out Time <span class="text-danger">*</span></label>
                                <input type="time" name="out_time" class="form-control" id="out_time" placeholder="" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="note">Note</label>
                                <textarea name="note" class="form-control" id="note" placeholder="Enter description" value=""></textarea>
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

        <!-- Start Edit Modal -->
        <div class="modal fade text-left" id="edit_attendence" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Edit Attendence Info</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('attendence.update')}}" method="post"  class="clearForm form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="reference_no">Reference Number <span class="text-danger">*</span></label>
                                <input type="text" name="reference_no" class="form-control" id="edit_reference_no" placeholder="" value="" >
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="date">Date <span class="text-danger">*</span></label>
                                <input type="date" name="date" class="form-control" id="edit_date" value="" >
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="employee">Employee<span class="text-danger">*</span></label>
                                <select class="form-select w-100 select2" id="edit_employee" name="employee" >
                                    <option value="">Select</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{$employee->id}}" @if(($url == 'attendence.edit') && $data->employee == $employee->id) selected @endif>{{$employee->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="in_time">In Time <span class="text-danger">*</span></label>
                                <input type="time" name="in_time" class="form-control" id="edit_in_time" placeholder="" value="" >
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="out_time">Out Time <span class="text-danger">*</span></label>
                                <input type="time" name="out_time" class="form-control" id="edit_out_time" placeholder="" value="" >
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="note">Note</label>
                                <textarea name="note" class="form-control" id="edit_note" placeholder="Enter description" value=""></textarea>
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
        $("#edit_attendence").on("show.bs.modal", function (e) {
            var id = $(e.relatedTarget).data('target-id');
            var reference_no = $(e.relatedTarget).data('reference_no');
            var date = $(e.relatedTarget).data('date');
            var employee = $(e.relatedTarget).data('employee');
            var in_time = $(e.relatedTarget).data('in_time');
            var out_time = $(e.relatedTarget).data('out_time');
            var note = $(e.relatedTarget).data('note');

            $('.modal-body #id').val(id);
            $('.modal-body #edit_reference_no').val(reference_no);
            $('.modal-body #edit_date').val(date);
            $('.modal-body #edit_employee').val(employee).change();
            $('.modal-body #edit_in_time').val(in_time);
            $('.modal-body #edit_out_time').val(out_time);
            $('.modal-body #edit_note').val(note);

        });

        $("#edit_attendence").on("hide.bs.modal", function (e) {
            location.reload();
        });
    </script>
@endsection
