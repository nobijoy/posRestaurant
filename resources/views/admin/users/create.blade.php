@extends('master.admin.master')
@section('title', 'Users')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-1 col-4 mb-1">
                <h3 class="content-header-title">
                    <a href="#" data-toggle="modal"data-target="#addUser" class="btn btn-primary">Add User</a>
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
                                                <th>User Name</th>
                                                <th>Password</th>
                                                <th>Full Name</th>
                                                <th>Permission</th>
                                                <th>Create Date</th>
                                                <th>Updated Date</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Name</td>
                                                    <td>xyz</td>
                                                    <td>Full Name</td>
                                                    <td>Super Admin</td>
                                                    <td>11.00</td>
                                                    <td>12.00</td>
                                                    <td>
                                                        <a data-toggle="modal"data-target="#editUser" data-target-id=""
                                                           data-name="" >
                                                            <button type="button" title="Edit" class="btn btn-icon btn-outline-primary btn-sm">
                                                                <i class="fa fa-pencil-square"></i></button>
                                                        </a>
                                                        <button type="button" class="btn btn-icon btn-outline-danger btn-sm" title="Inactive"
                                                                onclick="deleteData()">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-icon btn-outline-primary btn-sm" title="Restore"
                                                                onclick="restoreData()">
                                                            <i class="fa fa-undo" aria-hidden="true"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot class="display-hidden">
                                            <tr>
                                                <th>Sl</th>
                                                <th>Name</th>
                                                <th>Action</th>
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
        <div class="modal fade text-left" id="addUser" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Add User Info</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post"  class="clearForm form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="full_name">Full Name<span class="text-danger">*</span></label>
                                <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Full Name" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="user_name">User Name<span class="text-danger">*</span></label>
                                <input type="text" name="user_name" class="form-control" id="user_name" placeholder="User Name" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="password">Password<span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="select_role">Permission Category<span class="text-danger">*</span></label>
{{--                                <input type="text" name="name" class="form-control" id="name" placeholder="Category Name" required>--}}
                                <select class="form-select form-group w-100 select2" id="select_role" name="select_role" required>
                                    <option selected>Select</option>
                                        <option value="0" selected>Super Admin</option>
                                        <option value="1" selected>Store</option>
                                        <option value="2" selected>Sales</option>
                                        <option value="3" selected>Others</option>
                                </select>
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
        <div class="modal fade text-left" id="editUser" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Edit User</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post"  class="clearForm form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="full_name">Full Name<span class="text-danger">*</span></label>
                                <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Full Name" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="user_name">User Name<span class="text-danger">*</span></label>
                                <input type="text" name="user_name" class="form-control" id="user_name" placeholder="User Name" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="password">Password<span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="select_role">Permission Category<span class="text-danger">*</span></label>
                                {{--                                <input type="text" name="name" class="form-control" id="name" placeholder="Category Name" required>--}}
                                <select class="form-select form-group w-100 select2" id="select_role" name="select_role" value="" required>
                                    <option selected>Select</option>
                                    <option value="0" selected>Super Admin</option>
                                    <option value="1" selected>Store</option>
                                    <option value="2" selected>Sales</option>
                                    <option value="3" selected>Others</option>
                                </select>
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
        $("#editUser").on("show.bs.modal", function (e) {
            var id = $(e.relatedTarget).data('target-id');
            var name = $(e.relatedTarget).data('name');

            $('.modal-body #id').val(id);
            $('.modal-body #ename').val(name);

        });

        $("#editUser").on("hide.bs.modal", function (e) {
            location.reload();
        });
    </script>
@endsection
