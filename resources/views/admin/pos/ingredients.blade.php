@extends('master.admin.master')
@section('title', 'Ingredient')
@section('body')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-1">
            <h3 class="content-header-title">
                <a href="#" data-toggle="modal" data-target="#addcategory" class="btn btn-primary">Add Ingredients <i class="fa fa-plus"></i></a>
            </h3>
        </div>
        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Setup</a></li>
                        <li class="breadcrumb-item active"><a href="#">Ingredients</a></li>
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
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Purchase Price(in unit)</th>
                                                <th>Category</th>
                                                <th>Warehouse</th>
                                                <th>Alert Quantity</th>
                                                <th>Units</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (sizeof ($datas) > 0)
                                            @foreach ($datas as $data)
                                            <tr>
                                                <td>{{++$sl}}</td>
                                                <td>{{$data->code}}</td>
                                                <td>{{$data->name}}</td>
                                                <td>{{$data->price}}</td>
                                                <td>{{$data->category->name}}</td>
                                                <td>{{$data->warehouse ? $data->warehouseInfo->name : ''}}</td>
                                                <td>{{$data->alert_qty}}</td>
                                                <td>{{$data->unit->name}}</td>
                                                <td>
                                                    @if($data->is_active == 1)
                                                    <a data-toggle="modal" data-target="#editcategory"
                                                        data-target-id="{{$data->id}}" data-name="{{$data->name}}"
                                                        data-price="{{$data->price}}" data-category_id="{{$data->category_id}}"
                                                        data-unit_id="{{$data->unit_id}}" data-alert_qty="{{$data->alert_qty}}"
                                                        data-code="{{$data->code}}" data-warehouse = {{$data->warehouse}}>
                                                        <button type="button" title="Edit"
                                                            class="btn btn-icon btn-outline-primary btn-sm">
                                                            <i class="fa fa-pencil-square"></i></button>
                                                    </a>
                                                    <button type="button" class="btn btn-icon btn-outline-danger btn-sm"
                                                        title="Inactive"
                                                        onclick="deleteData('{{ route('ingredient.delete', [$data->id]) }}')">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                    @else
                                                    <button type="button"
                                                        class="btn btn-icon btn-outline-primary btn-sm" title="Restore"
                                                        onclick="restoreData('{{ route('ingredient.restore', [$data->id]) }}')">
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
    <div class="modal fade text-left" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel35">Add Ingredients</h3>
                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route ('ingredient.store') }}" method="post" class="clearForm form"
                    enctype="multipart/form-data">@csrf
                    <div class="modal-body">
                        <div class="row">
                            <fieldset class="col-md-6 form-group floating-label-form-group">
                                <label for="name">Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                                    required>
                            </fieldset>
                            <fieldset class="col-md-6 form-group floating-label-form-group">
                                <label for="warehouse">Warehouse <span class="text-danger">*</span></label>
                                <select name="warehouse" id="warehouse" class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach($warehouses as $type)
                                        <option value="{{$type->id}}" @if(($url == 'purchase.edit') && ($data->supplier == $type->id)) selected @endif">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <fieldset class="col-md-6 form-group floating-label-form-group">
                                <label for="price">Purchase Price( <small>you can change it in purchage form</small>
                                    )</label>
                                <input type="number" name="price" class="form-control" id="price"
                                    placeholder="210">
                            </fieldset>
                            <fieldset class="col-md-6 form-group floating-label-form-group">
                                <label for="category_id">Category<span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id" class="form-control select2" required>
                                    <option value="">Select</option>
                                    @foreach ($categories as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <fieldset class="col-md-6 form-group floating-label-form-group">
                                <label for="alert_qty">Alert Quantity<span class="text-danger">*</span></label>
                                <input type="number" name="alert_qty" class="form-control" id="alert_qty"
                                    placeholder="1" required>
                            </fieldset>
                            <fieldset class="col-md-6 form-group floating-label-form-group">
                                <label for="unit_id">Units<span class="text-danger">*</span></label>
                                <select name="unit_id" id="unit_id" class="form-control select2" required>
                                    <option value="">Select</option>
                                    @foreach ($units as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <fieldset class="col-md-6 form-group floating-label-form-group">
                                <label for="code">Code<span class="text-danger">*</span></label>
                                <input type="text" name="code" class="form-control" id="code" placeholder="1" required>
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
    <div class="modal fade text-left" id="editcategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel35">Edit Ingredients</h3>
                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route ('ingredient.update') }}" method="post" class="clearForm form"
                    enctype="multipart/form-data">@csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <fieldset class="col-md-6 form-group floating-label-form-group">
                                <label for="ename">Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" id="ename" placeholder="Name"
                                    required>
                            </fieldset>
                            <fieldset class="col-md-6 form-group floating-label-form-group">
                                <label for="ewarehouse">Warehouse <span class="text-danger">*</span></label>
                                <select name="warehouse" id="ewarehouse" class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach($warehouses as $type)
                                        <option value="{{$type->id}}" @if(($url == 'purchase.edit') && ($data->supplier == $type->id)) selected @endif">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <fieldset class="col-md-6 form-group floating-label-form-group">
                                <label for="price">Purchase Price( <small>you can change it in purchage form</small>
                                    )</label>
                                <input type="number" name="price" class="form-control" id="eprice" placeholder="210">
                            </fieldset>
                            <fieldset class="col-md-6 form-group floating-label-form-group">
                                <label for="category_id">Category<span class="text-danger">*</span></label>
                                <select name="category_id" id="ecategory_id" class="form-control select2" required>
                                    <option value="">Select</option>
                                    @foreach ($categories as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <fieldset class="col-md-6 form-group floating-label-form-group">
                                <label for="ealert_qty">Alert Quantity<span class="text-danger">*</span></label>
                                <input type="number" name="alert_qty" class="form-control" id="ealert_qty"
                                    placeholder="1" required>
                            </fieldset>
                            <fieldset class="col-md-6 form-group floating-label-form-group">
                                <label for="unit_id">Units<span class="text-danger">*</span></label>
                                <select name="unit_id" id="eunit_id" class="form-control select2" required>
                                    <option value="">Select</option>
                                    @foreach ($units as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <fieldset class="col-md-6 form-group floating-label-form-group">
                                <label for="ecode">Code<span class="text-danger">*</span></label>
                                <input type="text" name="code" class="form-control" id="ecode" placeholder="1" required>
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
    $("#editcategory").on("show.bs.modal", function (e) {
        var id = $(e.relatedTarget).data('target-id');
        var name = $(e.relatedTarget).data('name');
        var price = $(e.relatedTarget).data('price');
        var category_id = $(e.relatedTarget).data('category_id');
        var unit_id = $(e.relatedTarget).data('unit_id');
        var alert_qty = $(e.relatedTarget).data('alert_qty');
        var code = $(e.relatedTarget).data('code');
        var warehouse = $(e.relatedTarget).data('warehouse');

        $('.modal-body #id').val(id);
        $('.modal-body #ename').val(name);
        $('.modal-body #eprice').val(price);
        $('.modal-body #ecategory_id').val(category_id).change();
        $('.modal-body #eunit_id').val(unit_id).change();
        $('.modal-body #ealert_qty').val(alert_qty);
        $('.modal-body #ecode').val(code);
        $('.modal-body #ewarehouse').val(warehouse).change();

    });

    $("#editcategory").on("hide.bs.modal", function (e) {
        location.reload();
    });
</script>
@endsection
