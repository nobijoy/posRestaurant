@extends('master.admin.master')
@section('title', 'Payment Method')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">
                    <a href="#" data-toggle="modal"data-target="#add_payment_method" class="btn btn-primary">Add Payment Method <i class="fa fa-plus"></i></a>
                </h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route ('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Setup</a></li>
                            <li class="breadcrumb-item active"><a href="#">Add Payment Method</a></li>
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
                                                <th>Payment Method Name</th>
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
                                                        <td>{{$data->description}}</td>
                                                        <td>
                                                            <a data-toggle="modal" data-target="#edit_payment_method" data-target-id="{{$data->id}}"
                                                               data-name="{{$data->name}}" data-desc="{{$data->description}}">
                                                                <button type="button" title="Edit" class="btn btn-icon btn-outline-primary btn-sm">
                                                                    <i class="fa fa-pencil-square"></i></button>
                                                            </a>
                                                            <button type="button" class="btn btn-icon btn-outline-danger btn-sm" title="Inactive"
                                                                    onclick="deleteData('{{ route('payment_method.delete', [$data->id]) }}')">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
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
        <div class="modal fade text-left" id="add_payment_method" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Add Payment Method</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route ('payment_method.store')}}" method="post"  class="clearForm form"
                          enctype="multipart/form-data">@csrf
                        <div class="modal-body">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="name">Payment Method Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Category Name" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description" placeholder="description"></textarea>
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
        <div class="modal fade text-left" id="edit_payment_method" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Edit Payment Method</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('payment_method.update')}}" method="post"  class="clearForm form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="name">Payment Method Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" id="edit_name" placeholder="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="edit_description" placeholder="" ></textarea>
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
        $("#edit_payment_method").on("show.bs.modal", function (e) {
            var id = $(e.relatedTarget).data('target-id');
            var name = $(e.relatedTarget).data('name');
            var desc = $(e.relatedTarget).data('desc');

            $('.modal-body #id').val(id);
            $('.modal-body #edit_name').val(name);
            $('.modal-body #edit_description').val(desc);

        });

        $("#edit_payment_method").on("hide.bs.modal", function (e) {
            location.reload();
        });
    </script>
@endsection
