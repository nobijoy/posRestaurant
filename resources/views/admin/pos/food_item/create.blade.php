@extends('master.admin.master')

@section('title')
    Add New Item
@endsection

@section('body')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">
                    <a href="{{ route('menu.index') }}" class="btn btn-primary">Item List<i class="fa fa-eye"></i></a>
                </h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Menu</a>
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Add Menu</a>
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
                                <h4 class="card-title" id="basic-layout-card-center">Add New Menu</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" method="post" action="{{ route('menu.store') }}" enctype="multipart/form-data">@csrf
                                        <div class="form-body">
                                            @include('admin.pos.food_item.form')
                                        </div>

                                        <div class="form-actions text-right">
                                            <a href="{{ route ('menu.index')}}" class="btn btn-warning mr-1">
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
        let addedIngradient = [];
        let ingredientSl = 0;
        $(document).ready(function () {
            //Once add button is clicked
            $("#ingredient_consumption").on("change", function(){
                var id = $(this).val();
                var ingredient = $("#ingredient_consumption").val();
                if (id != "") {
                    var ingredient_details = ingredient.split('|');
                    let index = addedIngradient.indexOf(ingredient_details[0]);
                    if (index > -1) {
                        Swal.fire({
                            title: "Warning!",
                            text: "Ingredient already remains in cart, you can change Quantity/Amount!",
                            type: "warning",
                            confirmButtonClass: "btn btn-primary",
                            buttonsStyling: false
                        });
                        $('#ingredient_consumption').val('').change();
                        return false;
                    }

                    ingredientSl++;

                    var newRow = '<tr id="ingredient_row_'+ingredient_details[0] + '">' +
                            '<input type="hidden" name="ingredient_consuption_id[]" value="">'+
                            '<td id="sl_'+ingredient_details[0] + '"><p>'+ingredientSl+'</p></td>' +
                            '<td>' +
                                '<input type="hidden" id="ingreadient_id_'+ingredient_details[0] + '" name="ingredient_id[]" value="'+ingredient_details[0]+'">' +
                                '<span id="ingreadient_name_'+ingredient_details[0] +'">'+ingredient_details[1]+'</span>' +
                            '</td>' +
                            '<td>' +
                                '<div class="input-group">' +
                                    '<input type="text" class="form-control" name="consumption[]" placeholder="Consumption" aria-describedby="basic-addon_'+ingredient_details[0] + '" required>' +
                                    '<div class="input-group-append">' +
                                        '<span class="input-group-text" id="basic-addon_'+ingredient_details[0] + '">'+ingredient_details[2]+'</span>' +
                                    '</div>' +
                                '</div>' +
                            '</td>' +
                            '<td>' +
                                '<button type="button" title="Delete" class="btn btn-danger" onclick="deleteConsumptionRow(this)" data-count="'+ingredient_details[0] + '"> <i class="fa fa-trash"></i></button>' +
                            '</td>' +
                        '</tr>';
                    $('#ingredient_items').append(newRow);
                    addedIngradient.push(ingredient_details[0])
                    $('#ingredient_consumption').val('').change();
                    updateRowNo();
                }
            });

        });
        function deleteConsumptionRow(cr){
            var rowId = $(cr).attr('data-count');
            var el = document.getElementById("ingredient_row_"+rowId);
            el.remove();
            let ingredient_id_container_new = [];

            for (let i = 0; i < addedIngradient.length; i++) {
                if (addedIngradient[i] != rowId) {
                    ingredient_id_container_new.push(addedIngradient[i]);
                }
            }
            addedIngradient = ingredient_id_container_new;
            updateRowNo();
        }

        function updateRowNo() {
            let numRows = $("#ingredient_consumption_table tbody tr").length;
            for (let r = 0; r < numRows; r++) {
                $("#ingredient_consumption_table tbody tr").eq(r).find("td:first p").text(r + 1);
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            var url = "{{ route ('getSubCatAgainstCat') }}";
            $("#category_id").on("change", function(){
                var id = $(this).val();
                if (id != '') {
                    getSubCatAgainstCat(id, url, '#category');
                }
            });
        })
    </script>
@endsection
