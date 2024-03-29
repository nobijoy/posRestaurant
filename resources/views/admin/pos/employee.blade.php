@extends('master.admin.master')
@section('title', 'Employee')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-4 mb-1">
                <h3 class="content-header-title">
                    <a href="#" data-toggle="modal" data-target="#add_employee" class="btn btn-primary">Add Employee <i class="fa fa-plus"></i></a>
                </h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Setup</a></li>
                        <li class="breadcrumb-item active"><a href="#">Employee List</a></li>
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
                                                <th>ID</th>
                                                <th>Employee Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Department</th>
                                                <th>Designation</th>
                                                <th>Date Of Birth</th>
                                                <th>Address</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if (sizeof ($datas) > 0)
                                                @foreach ($datas as $data)
                                                    <tr>
                                                        <td>{{++$sl}}</td>
                                                        <td>{{$data->name}}</td>
                                                        <td>{{$data->phone}}</td>
                                                        <td>{{$data->email}}</td>
                                                        <td>{{$data->department ? $data->deptInfo->name : ''}}</td>
                                                        <td>{{$data->designation ? $data->designationInfo->name : ''}}</td>
                                                        <td>{{$data->date_of_birth}}</td>
                                                        <td>{{$data->address}}</td>
                                                        <td>
                                                            @if($data->is_active == 1)
                                                                <a data-toggle="modal" data-target="#edit_employee" data-target-id="{{$data->id}}"
                                                                   data-name="{{$data->name}}" data-address="{{$data->address}}" data-date_of_birth="{{$data->date_of_birth}}"
                                                                   data-phone="{{$data->phone}}" data-email="{{$data->email}}" data-department="{{$data->department}}"
                                                                   data-designation="{{$data->designation}}" data-access="{{$data->login_access}}">
                                                                    <button type="button" title="Edit" class="btn btn-icon btn-outline-primary btn-sm">
                                                                        <i class="fa fa-pencil-square"></i></button>
                                                                </a>
                                                                <button type="button" class="btn btn-icon btn-outline-danger btn-sm" title="Inactive"
                                                                        onclick="deleteData('{{ route('employee.delete', [$data->id]) }}')">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </button>
                                                            @else
                                                                <button type="button" class="btn btn-icon btn-outline-primary btn-sm" title="Restore"
                                                                        onclick="restoreData('{{ route('employee.restore', [$data->id]) }}')">
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

        <!-- Start Add Modal -->
        <div class="modal fade text-left" id="add_employee" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Add Employee Info</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('employee.store')}}" method="POST"  class="clearForm form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Rahim Miya" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="phone">Phone<span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="department">Select Department<span class="text-danger">*</span></label>
                                    <select name="department" id="department" class="select2 form-control" required>
                                        <option value="" >Select</option>
                                        @foreach ($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="designation">Select Designation<span class="text-danger">*</span></label>
                                    <select name="designation" id="designation" class="select2 form-control" required>
                                        <option value="" >Select</option>
{{--                                            @foreach ($designations as $designation)--}}
{{--                                                <option value="{{$designation->id}}">{{$designation->name}}</option>--}}
{{--                                            @endforeach--}}
                                    </select>
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="email">Email<span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="example@.com" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="date_of_birth">Date Of Birth<span class="text-danger">*</span></label>
                                    <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" placeholder="" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="address">Address<span class="text-danger">*</span></label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="House-1, Road-2" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <div class="col-md-12 mt-2">
                                        <label class="font-weight-bold">Can Use Login System :<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="form-check form-check-inline ml-3">
                                        <input class="form-check-input" type="radio" name="login_access" id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="login_access" id="inlineRadio2" value="0" checked>
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group hidden" id="hidden_pass">
                                    <label for="new_password">New Password<span class="text-danger">*</span></label>
                                    <input type="password" id="new_password" class="form-control" placeholder="" name="password" value="">
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group hidden" id="confirm_hidden_pass">
                                    <label for="confirm_password">Confirm New Password<span class="text-danger">*</span></label>
                                    <input type="password" id="confirm_password" class="form-control" placeholder="" name="confirm_password" value="">
                                    <div style="margin-top: 7px;" id="wrong_pass_alert"></div>
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group hidden" id="hidden_role">
                                    <label for="user_role">Select User Role<span class="text-danger">*</span></label>
                                    <select name="user_role" id="user_role" class="select2 form-control">
                                        <option value="" >Select</option>
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                            <input type="submit" class="btn btn-outline-primary" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Add Modal -->

        <!-- Start Edit Modal -->
        <div class="modal fade text-left" id="edit_employee" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Edit Employee Info</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('employee.update') }}" method="POST"  class="clearForm form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" name="id" id="id">
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" id="edit_name" placeholder="" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="phone">Phone<span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" id="edit_phone" placeholder="" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="department">Select Department<span class="text-danger">*</span></label>
                                    <select name="department" id="edit_department" class="select2 form-control" required>
                                        <option value="" >Select</option>
                                        @foreach ($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="designation">Select Designation<span class="text-danger">*</span></label>
                                    <select name="designation" id="edit_designation" class="select2 form-control" required>
                                        <option value="" >Select</option>
                                        @foreach ($designations as $designation)
                                            <option value="{{$designation->id}}">{{$designation->name}}</option>
                                        @endforeach

                                    </select>
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="email">Email<span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" id="edit_email" placeholder="" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="date_of_birth">Date Of Birth<span class="text-danger">*</span></label>
                                    <input type="date" name="date_of_birth" class="form-control" id="edit_date_of_birth" placeholder="" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="address">Address<span class="text-danger">*</span></label>
                                    <input type="text" name="address" class="form-control" id="edit_address" placeholder="" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <div class="col-md-12 mt-2">
                                        <label class="font-weight-bold text-left">Can Use Login System :<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="form-check form-check-inline ml-3">
                                        <input class="form-check-input" type="radio" name="edit_login_access" id="edit_inlineRadio1" value="1">
                                        <label class="form-check-label" for="edit_inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_login_access" id="edit_inlineRadio2" value="0" >
                                        <label class="form-check-label" for="edit_inlineRadio2">No</label>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group hidden" id="edit_hidden_pass">
                                    <label for="edit_new_password">New Password<span class="text-danger">*</span></label>
                                    <input type="password" id="edit_new_password" class="form-control" placeholder="" name="password" value="">
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group hidden" id="edit_confirm_hidden_pass">
                                    <label for="edit_confirm_password">Confirm New Password<span class="text-danger">*</span></label>
                                    <input type="password" id="edit_confirm_password" class="form-control" placeholder="" name="confirm_password" value="">
                                    <div style="margin-top: 7px;" id="edit_wrong_pass_alert"></div>
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group hidden" id="edit_hidden_role">
                                    <label for="edit_user_role">Select User Role<span class="text-danger">*</span></label>
                                    <select name="user_role" id="edit_user_role" class="select2 form-control">
                                        <option value="" >Select</option>
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                            <input type="submit"  class="btn btn-outline-primary" value="Update">
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
            var address = $(e.relatedTarget).data('address');
            var date_of_birth = $(e.relatedTarget).data('date_of_birth');
            var phone = $(e.relatedTarget).data('phone');
            var email = $(e.relatedTarget).data('email');
            var department = $(e.relatedTarget).data('department');
            var designation = $(e.relatedTarget).data('designation');
            var login_access = $(e.relatedTarget).data('access');

            $('.modal-body #id').val(id);
            $('.modal-body #edit_name').val(name);
            $('.modal-body #edit_department').val(department).change();
            $('.modal-body #edit_designation').val(designation).change();
            $('.modal-body #edit_address').val(address);
            $('.modal-body #edit_date_of_birth').val(date_of_birth);
            $('.modal-body #edit_phone').val(phone);
            $('.modal-body #edit_email').val(email);
            // $("[name='edit_login_access']").val(login_access).change();
            if (login_access == 0){
                $("#edit_inlineRadio2").prop('checked', true);
            }
            else{
                $("#edit_inlineRadio1").prop('checked', true);
                $('#edit_hidden_pass').removeClass('hidden');
                $('#edit_confirm_hidden_pass').removeClass('hidden');
                $('#edit_hidden_role').removeClass('hidden');
                $('#edit_user_role').attr("required", true);
                $('#edit_new_password').attr("required", true);
                $('#edit_confirm_password').attr("required", true);
            }
            $('#edit_department').on('change', function () {
                var id = $(this).val();
                var url = "{{route('getDegAgainstDept')}}";
                if(id != ''){
                    getDegAgainstDept(id, url, '#edit_designation');
                }else{
                    var output = '<option value="">No data available</option>';
                    $('#edit_designation').html(output) ;
                }
            });
            $('.select2').select2();

        });

        $("#edit_employee").on("hide.bs.modal", function (e) {
            location.reload();
        });

        $("#add_employee").on("show.bs.modal", function (e) {
            $('#department').on('change', function () {
                var id = $(this).val();
                var url = "{{route('getDegAgainstDept')}}";
                if(id != ''){
                    getDegAgainstDept(id, url, '#designation');
                }else{
                    var output = '<option value="">No data available</option>';
                    $('#designation').html(output) ;
                }
            });
            $('.select2').select2();
        });
    </script>
    <script type="text/javascript">
        $("input[type='radio']").click(function(){
            var radioValue = $("input[name='login_access']:checked").val();
            if(radioValue == 1){
                $('#hidden_pass').removeClass('hidden');
                $('#confirm_hidden_pass').removeClass('hidden');
                $('#hidden_role').removeClass('hidden');
                $('#user_role').attr("required", true);
                $('#new_password').attr("required", true);
                $('#confirm_password').attr("required", true);
            }
            else{
                $('#hidden_pass').addClass('hidden');
                $('#confirm_hidden_pass').addClass('hidden');
                $('#hidden_role').addClass('hidden');
                $("#new_password").val('');
                $("#confirm_password").val('');
            }
        });
        $("input[type='radio']").click(function(){
            var radioValue = $("input[name='edit_login_access']:checked").val();
            if(radioValue == 1){
                $('#edit_hidden_pass').removeClass('hidden');
                $('#edit_confirm_hidden_pass').removeClass('hidden');
                $('#edit_hidden_role').removeClass('hidden');
                $('#edit_user_role').attr("required", true);
                $('#edit_new_password').attr("required", true);
                $('#edit_confirm_password').attr("required", true);
            }
            else{
                $('#edit_hidden_pass').addClass('hidden');
                $('#edit_confirm_hidden_pass').addClass('hidden');
                $('#edit_hidden_role').addClass('hidden');
                $("#edit_new_password").val('');
                $("#edit_confirm_password").val('');
            }
        });

        $("#confirm_password").on('keyup', function(){
            var password = $("#new_password").val();
            var confirmPassword = $("#confirm_password").val();
            if (password != confirmPassword)
                $("#wrong_pass_alert").html("Password does not match !").css("color","red");
            else
                $("#wrong_pass_alert").html("Password match !").css("color","green");
        });

        $("#edit_confirm_password").on('keyup', function(){
            var password = $("#edit_new_password").val();
            var confirmPassword = $("#edit_confirm_password").val();
            console.log(password, confirmPassword);
            if (password != confirmPassword)
                $("#edit_wrong_pass_alert").html("Password does not match !").css("color","red");
            else
                $("#edit_wrong_pass_alert").html("Password match !").css("color","green");
        });
    </script>
@endsection
