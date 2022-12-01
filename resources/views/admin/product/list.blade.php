@extends('master.admin.master')
@section('title', 'Product List')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-1 col-4 mb-1">
                <h3 class="content-header-title">
                    <a href="#" data-toggle="modal"data-target="#add_product_list" class="btn btn-primary">Product List Information</a>
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
                                                <th>Category Name</th>
                                                <th>Product Name</th>
                                                <th>Sales Price</th>
                                                <th>Barcode</th>
                                                <th>Create Date</th>
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
                                                <td>12.00</td>
                                                <td>
                                                    <a data-toggle="modal"data-target="#edit_product_list" data-target-id=""
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
        <div class="modal fade text-left" id="add_product_list" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Add Product List Info</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post"  class="clearForm form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="category_name">Category<span class="text-danger">*</span></label>
                                <select class="form-select w-100" id="category_name" name="category_name" required>
                                    <option selected>Select</option>
                                    <option value="0" selected>Rice</option>
                                    <option value="1" selected>Wheat</option>
                                </select>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="product_name">Product Name<span class="text-danger">*</span></label>
                                <input type="text" name="product_name" class="form-control" id="product_name" placeholder="" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="sale_price">Sales Price<span class="text-danger">*</span></label>
                                <input type="number" name="sale_price" class="form-control" id="sale_price" placeholder="" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="product_barcode">Barcode<span class="text-danger">*</span></label>
                                <input type="text" name="product_barcode" class="form-control" id="product_barcode" value="" required>
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
        <div class="modal fade text-left" id="edit_product_list" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35">Edit Product List Info</h3>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post"  class="clearForm form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="category_name">Category<span class="text-danger">*</span></label>
                                <select class="form-select w-100" id="category_name" name="category_name" required>
                                    <option selected>Select</option>
                                    <option value="0" selected>Rice</option>
                                    <option value="1" selected>Wheat</option>
                                </select>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="product_name">Product Name<span class="text-danger">*</span></label>
                                <input type="text" name="product_name" class="form-control" id="product_name" placeholder="" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="sale_price">Sales Price<span class="text-danger">*</span></label>
                                <input type="number" name="sale_price" class="form-control" id="sale_price" placeholder="" value="" required>
                            </fieldset>
                            <fieldset class="form-group floating-label-form-group">
                                <label for="product_barcode">Barcode<span class="text-danger">*</span></label>
                                <input type="text" name="product_barcode" class="form-control" id="product_barcode" value="" required>
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
        $("#edit_product_list").on("show.bs.modal", function (e) {
            var id = $(e.relatedTarget).data('target-id');
            var name = $(e.relatedTarget).data('name');

            $('.modal-body #id').val(id);
            $('.modal-body #ename').val(name);

        });

        $("#edit_product_list").on("hide.bs.modal", function (e) {
            location.reload();
        });
    </script>
@endsection

