@extends('master.admin.master')

@section('title')
    Add Waste Item
@endsection

@section('body')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">
                    <a href="{{route('waste.index')}}" class="btn btn-primary">Waste Item List<i class="fa fa-eye"></i></a>
                </h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Inventory</a>
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Add Waste Item</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Column selectors table -->
            <section id="basic-form-layouts">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-card-center">Add Waste Item</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" method="post" action="" enctype="multipart/form-data">@csrf
                                        <div class="form-body">
                                            @include('admin.inventory.waste.form')
                                        </div>

                                        <div class="form-actions text-right">
                                            <a href="{{ route ('waste.index')}}" class="btn btn-warning mr-1">
                                                <i class="feather icon-x"></i> Cancel</a>
                                            <button type="submit" id="submitBtn" class="btn btn-primary">
                                                <i class="fa fa-check-square-o"></i> Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Column selectors table -->
            @include('admin.partials.readme')
        </div>
    </div>

@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            //Once add button is clicked
            $("#food_menu").on("change", function(){
                var id = $(this).val();
                var url = "{{ route('menu.info', ['-a']) }}";
                url = url.replace('-a', id);
                // console.log(url)
                $.get(url, function (data) {
                    console.log(data);
                });
                var name = $("#food_menu option:selected").text();
                if (id != "") {
                    var sl = parseInt($("#ingredient_sl").val());
                    var sum = sl + 1;
                    var count = $("#ingredient_count").val() + 1;
                    $("#ingredient_count").val(count);
                    $("#ingredient_sl").val(sum);
                    var newRow = '<tr id="ingredient_row_'+count + '">' +
                        '<td id="sl_'+count + '">'+sum+'</td>' +
                        '<td>' +
                        '<input type="hidden" id="ingreadient_id_'+count + '" name="ingredient_id[]" value="'+id+'">' +
                        '<span id="ingreadient_name_'+count +'">'+name+'</span>' +
                        '</td>' +
                        // '<td>' +
                        // '<div class="input-group">' +
                        // '<input type="text" class="form-control" name="consumption[]" placeholder="" aria-describedby="basic-addon_'+count + '">' +
                        // '<div class="input-group-append">' +
                        //     '<span class="input-group-text" id="basic-addon_'+count + '">unit</span>' +
                        // '</div>' +
                        // '</div>' +
                        // '</td>' +
                        '<td>' +
                        '<input type="number" class="form-control" id="quantity'+count + '" name="quantity[]" value="" readonly>' +
                        '</td>' +
                        '<td>' +
                        '<input type="number" class="form-control" id="loss_amount'+count + '" name="loss_amount[]" value="" readonly>' +
                        '</td>' +
                        // '<td>' +
                        // '<button type="button" title="Delete" class="btn btn-danger" onclick="deleteContactRow(this)" data-count="'+count + '"> <i class="fa fa-trash"></i></button>' +
                        // '</td>' +
                        '</tr>';
                    $('#ingredient_items').append(newRow);
                }
             });

        });
        // function deleteContactRow(cr){
        //     var rowId = $(cr).attr('data-count');
        //     var el = document.getElementById("ingredient_row_"+rowId);
        //     el.remove();
        // }
    </script>
@endsection
