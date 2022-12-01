@extends('master.admin.master')
@section('title', 'Employee')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-1 col-4 mb-1">
                <h3 class="content-header-title">
                    <a href="#" data-toggle="modal"data-target="#add_employee" class="btn btn-primary">Add Employee</a>
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
                                                <th>ID</th>
                                                <th>Employee ID</th>
                                                <th>Full Name</th>
                                                <th>Designation</th>
                                                <th>Mobile</th>
                                                <th>Salary</th>
                                                <th>Joining Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>126</td>
                                                <td>Karim</td>
                                                <td>Cashier</td>
                                                <td>0123</td>
                                                <td>12000</td>
                                                <td>12.02.2022</td>
                                                <td>active</td>
                                                <td>
                                                    <a data-toggle="modal"data-target="#edit_employee" data-target-id=""
                                                       data-name="" >
                                                        <button type="button" title="Edit" class="btn btn-icon btn-outline-primary btn-sm">
                                                            <i class="fa fa-pencil-square"></i></button>
                                                    </a>
                                                    <button type="button" class="btn btn-icon btn-outline-danger btn-sm" title="Inactive"
                                                            onclick="deleteData()">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                            </tr>
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
        <div class="modal fade text-left" id="add_employee" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Add Employee Info</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post"  class="clearForm form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="employee_id">Employee Id<span class="text-danger">*</span></label>
                                <input type="text" name="employee_id" class="form-control" id="employee_id" placeholder="" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="employee_name">Full Name<span class="text-danger">*</span></label>
                                <input type="text" name="employee_name" class="form-control" id="employee_name" placeholder="" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="employee_designation">Designation<span class="text-danger">*</span></label>
                                <input type="text" name="employee_designation" class="form-control" id="employee_designation" placeholder="" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="employee_mobile">Mobile<span class="text-danger">*</span></label>
                                <input type="text" name="employee_mobile" class="form-control" id="employee_mobile" placeholder="" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="employee_salary">Salary<span class="text-danger">*</span></label>
                                <input type="number" name="employee_salary" class="form-control" id="employee_salary" placeholder="" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="joining_date">Joining Date<span class="text-danger">*</span></label>
                                <input type="date" name="joining_date" class="form-control" id="joining_date" value="" required>
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
        <div class="modal fade text-left" id="edit_employee" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Edit Employee Info</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post"  class="clearForm form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="employee_id">Employee Id<span class="text-danger">*</span></label>
                                <input type="text" name="employee_id" class="form-control" id="employee_id" placeholder="" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="employee_name">Full Name<span class="text-danger">*</span></label>
                                <input type="text" name="employee_name" class="form-control" id="employee_name" placeholder="" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="employee_designation">Designation<span class="text-danger">*</span></label>
                                <input type="text" name="employee_designation" class="form-control" id="employee_designation" placeholder="" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="employee_mobile">Mobile<span class="text-danger">*</span></label>
                                <input type="text" name="employee_mobile" class="form-control" id="employee_mobile" placeholder="" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="employee_salary">Salary<span class="text-danger">*</span></label>
                                <input type="number" name="employee_salary" class="form-control" id="employee_salary" placeholder="" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="joining_date">Joining Date<span class="text-danger">*</span></label>
                                <input type="date" name="joining_date" class="form-control" id="joining_date" value="" required>
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
        $("#edit_employee").on("show.bs.modal", function (e) {
            var id = $(e.relatedTarget).data('target-id');
            var name = $(e.relatedTarget).data('name');

            $('.modal-body #id').val(id);
            $('.modal-body #ename').val(name);

        });

        $("#edit_employee").on("hide.bs.modal", function (e) {
            location.reload();
        });
    </script>
@endsection
