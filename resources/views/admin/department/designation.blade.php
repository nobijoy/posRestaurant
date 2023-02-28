@extends('master.admin.master')
@section('title', 'Designation')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">
                    <a href="#" data-toggle="modal"data-target="#addDesignation" class="btn btn-primary">ADD Designation</a>
                </h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Department</a></li>
                            <li class="breadcrumb-item active"><a href="#">Designation</a></li>
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
                                                <th>Name</th>
                                                <th>Department</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if (sizeof ($datas) > 0)
                                                @foreach ($datas as $data)
                                                    <tr>
                                                        <td>{{++$sl}}</td>
                                                        <td>{{$data->name}}</td>
                                                        <td>{{$data->department ? $data->departmentInfo->name : ''}}</td>
                                                        <td>
                                                            @if($data->is_active == 1)
                                                                <a data-toggle="modal"data-target="#editDesignation" data-target-id="{{$data->id}}"
                                                                   data-name="{{$data->name}}" data-department="{{$data->department}}" >
                                                                    <button type="button" title="Edit" class="btn btn-icon btn-outline-primary btn-sm">
                                                                        <i class="fa fa-pencil-square"></i></button>
                                                                </a>
                                                                <button type="button" class="btn btn-icon btn-outline-danger btn-sm" title="Inactive"
                                                                        onclick="deleteData('{{ route('designation.delete', [$data->id]) }}')">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </button>
                                                            @else
                                                                <button type="button" class="btn btn-icon btn-outline-primary btn-sm" title="Restore"
                                                                        onclick="restoreData('{{ route('designation.restore', [$data->id]) }}')">
                                                                    <i class="fa fa-undo" aria-hidden="true"></i>
                                                                </button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                            <tfoot class="display-hidden">
                                            <tr>
                                                <th>Sl</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Short Note</th>
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
        <div class="modal fade text-left" id="addDesignation" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Add Designation</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route ('designation.store')}}" method="post"  class="clearForm form"
                          enctype="multipart/form-data">@csrf
                        <div class="modal-body">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="department">Select Department<span class="text-danger">*</span></label>
                                <select name="department" id="department" class="form-control select2" required>
                                    <option value="" >Select</option>
                                    @foreach ($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="name">Designation Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Designation Name" required>
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
        <div class="modal fade text-left" id="editDesignation" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Edit Sub Category Form</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route ('designation.update')}}" method="post"  class="clearForm form"
                          enctype="multipart/form-data">@csrf
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="edepartment">Select Department<span class="text-danger">*</span></label>
                                <select name="department" id="edepartment" class="select2 form-control" required>
                                        <option value="" >Select</option>
                                    @foreach ($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="name">Designation Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" id="ename" placeholder="Designation Name" required>
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
        $("#editDesignation").on("show.bs.modal", function (e) {
            var id = $(e.relatedTarget).data('target-id');
            var name = $(e.relatedTarget).data('name');
            var department = $(e.relatedTarget).data('department');

            $('.modal-body #id').val(id);
            $('.modal-body #ename').val(name);
            $('.modal-body #edepartment').val(department).change();

        });

        $("#editDesignation").on("hide.bs.modal", function (e) {
            location.reload();
        });
    </script>
@endsection
