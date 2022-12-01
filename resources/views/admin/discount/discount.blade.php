@extends('master.admin.master')
@section('title', 'Discount')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-1 col-4 mb-1">
                <h3 class="content-header-title">
{{--                    <a href="#" data-toggle="modal"data-target="#" class="btn btn-primary"></a>--}}
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
                                                <th>Type</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Permission</th>
                                                <th>Status</th>
                                                <th>Modify Date</th>
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
                                                <td>Super Admin</td>
                                                <td>12.00</td>
                                                <td>
                                                    <a data-toggle="modal"data-target="#edit_discount" data-target-id=""
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
        <div class="modal fade text-left" id="edit_discount" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Edit Attendence Info</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post"  class="clearForm form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="user_name">User Name<span class="text-danger">*</span></label>
                                <input type="text" name="user_name" class="form-control" id="user_name" placeholder="User Name" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="action_type">Type of Action<span class="text-danger">*</span></label>
                                <select class="form-select w-100" id="action_type" name="action_type" required>
                                    <option selected>Select</option>
                                    <option value="0" selected>In</option>
                                    <option value="1" selected>Out</option>
                                </select>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="action_time">Action Time<span class="text-danger">*</span></label>
                                <input type="datetime-local" name="action_time" class="form-control" id="action_time" value="" required>
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
        $("#edit_discount").on("show.bs.modal", function (e) {
            var id = $(e.relatedTarget).data('target-id');
            var name = $(e.relatedTarget).data('name');

            $('.modal-body #id').val(id);
            $('.modal-body #ename').val(name);

        });

        $("#edit_discount").on("hide.bs.modal", function (e) {
            location.reload();
        });
    </script>
@endsection
