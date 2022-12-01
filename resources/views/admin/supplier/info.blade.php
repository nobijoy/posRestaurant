@extends('master.admin.master')
@section('title', 'Supplier')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-1 col-4 mb-1">
                <h3 class="content-header-title">
                    <a href="#" data-toggle="modal" data-target="#add_supplier" class="btn btn-primary">Add Supplier</a>
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
                                                    <th>Company Name</th>
                                                    <th>Address</th>
                                                    <th>Contact Person</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Description</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (sizeof ($datas) > 0)
                                                    @foreach ($datas as $data)
                                                        <tr>
                                                            <td>{{++$sl}}</td>
                                                            <td>{{$data->name}}</td>
                                                            <td>{{$data->address}}</td>
                                                            <td>{{$data->contact_person}}</td>
                                                            <td>{{$data->phone}}</td>
                                                            <td>{{$data->email}}</td>
                                                            <td>{{$data->description}}</td>
                                                            <td>
                                                                @if($data->is_active == 1)
                                                                    <a data-toggle="modal" data-target="#edit_supplier" data-target-id="{{$data->id}}"
                                                                       data-name="{{$data->name}}" data-address="{{$data->address}}" data-contact-person="{{$data->contact_person}}"
                                                                       data-phone="{{$data->phone}}" data-email="{{$data->email}}" data-description="{{$data->description}}">
                                                                        <button type="button" title="Edit" class="btn btn-icon btn-outline-primary btn-sm">
                                                                            <i class="fa fa-pencil-square"></i></button>
                                                                    </a>
                                                                    <button type="button" class="btn btn-icon btn-outline-danger btn-sm" title="Inactive"
                                                                            onclick="deleteData('{{ route('supplier.delete', [$data->id]) }}')">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                    </button>
                                                                @else
                                                                    <button type="button" class="btn btn-icon btn-outline-primary btn-sm" title="Restore"
                                                                            onclick="restoreData('{{ route('supplier.restore', [$data->id]) }}')">
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
        <div class="modal fade text-left" id="add_supplier" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Add Supplier Info</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('supplier.store')}}" method="POST"  class="clearForm form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Rahim Miya" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="address">Address<span class="text-danger">*</span></label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="House-1, Road-2" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="contact_person">Contact Person<span class="text-danger">*</span></label>
                                    <input type="text" name="contact_person" class="form-control" id="contact_person" placeholder="Contact Person" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="phone">Phone<span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="email">Email<span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="example@.com" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="description">Description<span class="text-danger">*</span></label>
                                    <textarea type="text" name="description" class="form-control" id="description" placeholder="Enter description" value=""></textarea>
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

        <!-- Start Edit Modal -->
        <div class="modal fade text-left" id="edit_supplier" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Edit Supplier Info</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('supplier.update') }}" method="POST"  class="clearForm form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" name="id" id="id">
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" id="edit_name" placeholder="" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="address">Address<span class="text-danger">*</span></label>
                                    <input type="text" name="address" class="form-control" id="edit_address" placeholder="" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="contact_person">Contact Person<span class="text-danger">*</span></label>
                                    <input type="text" name="contact_person" class="form-control" id="edit_contact_person" placeholder="" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="phone">Phone<span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" id="edit_phone" placeholder="" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="email">Email<span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" id="edit_email" placeholder="" value="" >
                                </fieldset>
                                <fieldset class="form-group col-md-6 floating-label-form-group">
                                    <label for="description">Description<span class="text-danger">*</span></label>
                                    <textarea type="text" name="description" class="form-control" id="edit_description" placeholder="" value=""></textarea>
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
        $("#edit_supplier").on("show.bs.modal", function (e) {
            var id = $(e.relatedTarget).data('target-id');
            var name = $(e.relatedTarget).data('name');
            var address = $(e.relatedTarget).data('address');
            var contact_person = $(e.relatedTarget).data('contact-person');
            var phone = $(e.relatedTarget).data('phone');
            var email = $(e.relatedTarget).data('email');
            var description = $(e.relatedTarget).data('description');

            $('.modal-body #id').val(id);
            $('.modal-body #edit_name').val(name);
            $('.modal-body #edit_address').val(address);
            $('.modal-body #edit_contact_person').val(contact_person);
            $('.modal-body #edit_phone').val(phone);
            $('.modal-body #edit_email').val(email);
            $('.modal-body #edit_description').val(description);

        });

        $("#edit_supplier").on("hide.bs.modal", function (e) {
            location.reload();
        });
    </script>
@endsection
