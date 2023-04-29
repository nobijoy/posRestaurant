@extends('master.admin.master')
@section('title', 'Tables')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">
                    <a href="#" data-toggle="modal" data-target="#addtable" class="btn btn-primary">Add Table <i class="fa fa-plus"></i></a>
                </h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route ('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Setup</a></li>
                            <li class="breadcrumb-item active"><a href="#">Table</a></li>
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
                                                <th>Table No</th>
                                                <th>Seat Capacity</th>
                                                <th>Position</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @if (sizeof ($datas) > 0)
                                                    @foreach ($datas as $data)
                                                    <tr>
                                                        <td>{{++$sl}}</td>
                                                        <td>{{$data->name}}</td>
                                                        <td>{{$data->seat_capacity}}</td>
                                                        <td>{{$data->position}}</td>
                                                        <td>{{$data->description}}</td>
                                                        <td>
                                                            @if($data->is_active == 1)
                                                                <a data-toggle="modal" data-target="#editTable"
                                                                   data-target-id="{{$data->id}}" data-name="{{$data->name}}"
                                                                   data-seat_capacity="{{$data->seat_capacity}}" data-position="{{$data->position}}"
                                                                   data-outlet_id="{{$data->outlet_id}}" data-description="{{$data->description}}">
                                                                    <button type="button" title="Edit"
                                                                            class="btn btn-icon btn-outline-primary btn-sm">
                                                                        <i class="fa fa-pencil-square"></i></button>
                                                                </a>
                                                                <button type="button" class="btn btn-icon btn-outline-danger btn-sm"
                                                                        title="Inactive"
                                                                        onclick="deleteData('{{ route('table.delete',[$data->id]) }}')">
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
        <div class="modal fade text-left" id="addtable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Add Table</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route ('table.store') }}" method="post" class="clearForm form"
                          enctype="multipart/form-data">@csrf
                        <div class="modal-body">
                            <div class="row">
                                <fieldset class="col-md-6 form-group floating-label-form-group">
                                    <label for="name">Table No<span class="text-danger">*</span></label>
                                    <input type="number" name="name" class="form-control" id="name" placeholder="Name" required>
                                </fieldset>
                                <fieldset class="col-md-6 form-group floating-label-form-group">
                                    <label for="seat_capacity">Seat Capacity<span class="text-danger">*</span></label>
                                    <input type="number" name="seat_capacity" class="form-control" id="seat_capacity" placeholder="Enter number of seat">
                                </fieldset>
                                <fieldset class="col-md-6 form-group floating-label-form-group">
                                    <label for="position">Position<span class="text-danger">*</span></label>
                                    <input type="text" name="position" class="form-control" id="position" placeholder="" required>
                                </fieldset>
                                <fieldset class="col-md-6 form-group floating-label-form-group">
                                    <label for="outlet_id">Outlet<span class="text-danger">*</span></label>
                                    <select name="outlet_id" id="outlet_id" class="form-control select2" required>
                                        <option value="">Select</option>
                                            @foreach ($outlets as $outlet)
                                                <option value="{{$outlet->id}}">{{$outlet->name}}</option>
                                            @endforeach
                                    </select>
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="description">Description<span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" id="description" placeholder="Enter description" value=""></textarea>
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
                        <h3 class="modal-title" id="myModalLabel35">Edit Table</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route ('table.update') }}" method="post" class="clearForm form"
                          enctype="multipart/form-data">@csrf
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            <div class="row">
                                <fieldset class="col-md-6 form-group floating-label-form-group">
                                    <label for="name">Table No<span class="text-danger">*</span></label>
                                    <input type="number" name="name" class="form-control" id="edit_name" placeholder="Name" required>
                                </fieldset>
                                <fieldset class="col-md-6 form-group floating-label-form-group">
                                    <label for="seat_capacity">Seat Capacity<span class="text-danger">*</span></label>
                                    <input type="number" name="seat_capacity" class="form-control" id="edit_seat_capacity" placeholder="Enter number of seat">
                                </fieldset>
                                <fieldset class="col-md-6 form-group floating-label-form-group">
                                    <label for="position">Position<span class="text-danger">*</span></label>
                                    <input type="text" name="position" class="form-control" id="edit_position" placeholder="South" required>
                                </fieldset>
                                <fieldset class="col-md-6 form-group floating-label-form-group">
                                    <label for="outlet_id">Outlet<span class="text-danger">*</span></label>
                                    <select name="outlet_id" id="edit_outlet_id" class="form-control select2" required>
                                        @foreach ($outlets as $outlet)
                                            <option value="{{$outlet->id}}">{{$outlet->name}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" id="edit_description" placeholder="Enter description" value=""></textarea>
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
            var name = $(e.relatedTarget).data('name');
            var seat_capacity = $(e.relatedTarget).data('seat_capacity');
            var position = $(e.relatedTarget).data('position');
            var outlet_id = $(e.relatedTarget).data('outlet_id');
            var description = $(e.relatedTarget).data('description');

            $('.modal-body #id').val(id);
            $('.modal-body #edit_name').val(name);
            $('.modal-body #edit_seat_capacity').val(seat_capacity);
            $('.modal-body #edit_position').val(position);
            $('.modal-body #edit_outlet_id').val(outlet_id);
            $('.modal-body #edit_description').val(description);

        });

        $("#editTable").on("hide.bs.modal", function (e) {
            location.reload();
        });
    </script>
@endsection
