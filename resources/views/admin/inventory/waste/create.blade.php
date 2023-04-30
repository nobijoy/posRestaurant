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
                                    <form class="form" method="post" action="{{route('waste.store')}}" enctype="multipart/form-data">@csrf
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
        let addedIngradient = [];
        let ingredientSl = 0;
        $(document).ready(function () {
            // Once add button is clicked
            $("#food_menu").on("change", function(){
                foodMenuAndQtyChange();
            })
            $("#waste_quantity").keyup(function(){
                foodMenuAndQtyChange();
             });

            $("#ingredients").on("change", function(){
                var id = $(this).val();
                var ingredient = $("#ingredients").val();
                if (id != ''){
                    $('#food_menu').prop('disabled', true);
                    $('#waste_quantity').prop('readonly', true);
                    var ingredient_details = ingredient.split('|');
                    console.log(ingredient_details);
                    let index = addedIngradient.indexOf(ingredient_details[0]);
                    if (index > -1) {
                        Swal.fire({
                            title: "Warning!",
                            text: "Ingredient already remains in cart, you can change Quantity/Amount!",
                            type: "warning",
                            confirmButtonClass: "btn btn-primary",
                            buttonsStyling: false
                        });
                        $('#ingredients').val('').change();
                        return false;
                    }

                    ingredientSl++;
                    var newRow = '<tr id="ingredient_row_'+ingredient_details[0] + '">' +
                        // '<input type="hidden" name="ingredient_consuption_id[]" value="">'+
                        '<td id="sl_'+ingredient_details[0] + '"><p>'+ingredientSl+'</p></td>' +
                        '<td>' +
                        '<input type="hidden" id="ingreadient_id_'+ingredient_details[0] + '" name="ingredient_id[]" value="'+ingredient_details[0]+ '">' +
                        '<span id="ingreadient_name_'+ingredient_details[0]+ '">'+ingredient_details[1]+ '</span>' +
                        '</td>' +
                        '<td>' +
                        '<div class="input-group">' +
                        '<input type="text" class="form-control" onkeyup="lostCost(this)" data-check_id="'+ingredient_details[0]+'" data-unit_price="'+ingredient_details[3]+'" name="quantity[]" placeholder="Waste Amount/Quantity" aria-describedby="basic-addon_'+ingredient_details[0] + '" required>' +
                        '<div class="input-group-append">' +
                        '<span class="input-group-text" id="basic-addon_'+ingredient_details[0] + '">'+ingredient_details[2]+'</span>' +
                        '</div>' +
                        '</div>' +
                        '</td>' +
                        '<td>' +
                        '<input type="number" class="form-control total-price" id="loss_amount'+ingredient_details[0] + '" name="loss_amount[]" value="0.00" readonly>' +
                        '</td>' +
                        '<td>' +
                        '<button type="button" title="Delete" class="btn btn-danger" onclick="deleteConsumptionRow(this)" data-count="'+ingredient_details[0] + '"> <i class="fa fa-trash"></i></button>' +
                        '</td>' +
                        '</tr>';

                    $('#ingredient_items').append(newRow);
                    addedIngradient.push(ingredient_details[0])
                    $('#ingredients').val('').change();
                    updateRowNo();

                }
             });

        });
        function deleteConsumptionRow(cr){
            Swal.fire({
                title: "Are you sure?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
                confirmButtonClass: "btn btn-warning mr-10",
                cancelButtonClass: "btn btn-danger ml-1",
                buttonsStyling: false,
            }).then(function (result) {
                if (result.value) {
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
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                }
            });

        }

        function updateRowNo() {
            let numRows = $("#ingredient_table tbody tr").length;
            for (let r = 0; r < numRows; r++) {
                $("#ingredient_table tbody tr").eq(r).find("td:first p").text(r + 1);
            }
        }

        function lostCost(lost) {
            var qty = $(lost).val();
            var unitPrice = $(lost).attr('data-unit_price');
            var target = $(lost).attr('data-check_id');

            // $("#loss_amount"+target).val(( parseFloat(qty) * parseFloat(unitPrice)).toFixed(2));

            var totalPrice = parseFloat(qty) * parseFloat(unitPrice);
            $("#loss_amount"+target).val(totalPrice.toFixed(2));
            grandTotal();
        }

        function grandTotal() {
            var total = 0;
            $('.total-price').each(function (index, element) {
                total = total + parseFloat($(element).val());
            });
            $("#total_loss").val(total.toFixed(2));
        }

        function foodMenuAndQtyChange(){
            $("#ingredient_items > tr").remove();
            $('#ingredients').prop('disabled', true);
            var qty = $("#waste_quantity").val();
            var id = $("#food_menu").val();
            if (id != "" && qty != '') {
                var url = "{{ route('menu.info') }}";
                $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        "id": id,
                    },
                    contentType: "application/json;charset=UTF-8",
                    dataType: "json",
                    success: function (data) {
                        if (data.length > 0) {
                            var sl = 0;
                            $.each(data, function (index, value) {
                                sl = sl + 1;
                                let wasteQty = (parseFloat(qty) * parseFloat(value.consumption_amount));
                                let lostAmount = (parseFloat(qty) * parseFloat(value.consumption_amount) * parseFloat(value.ingredient.price));
                                let newRow = '<tr id="ingredient_row_'+value.ingredient.id + '">' +
                                    '<td id="sl_'+value.ingredient.id + '"><p>'+ sl +'</p></td>' +
                                    '<td>' +
                                    '<input type="hidden" id="ingreadient_id_'+value.ingredient.id + '" name="ingredient_id[]" value="'+value.ingredient.id+ '">' +
                                    '<span id="ingreadient_name_'+value.ingredient.id+ '">'+value.ingredient.name+ ' ('+ value.ingredient.code + ')'+ '</span>' +
                                    '</td>' +
                                    '<td>' +
                                    '<div class="input-group">' +
                                    '<input type="number" class="form-control" value="'+wasteQty.toFixed(2)+'" name="quantity[]" placeholder="Waste Amount/Quantity" aria-describedby="basic-addon_'+value.ingredient.id + '" readonly>' +
                                    '<div class="input-group-append">' +
                                    '<span class="input-group-text" id="basic-addon_'+value.ingredient.id + '">'+value.ingredient.unit.name+'</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</td>' +
                                    '<td>' +
                                    '<input type="number" class="form-control total-price" id="loss_amount'+value.ingredient.id + '" name="loss_amount[]" value="'+lostAmount.toFixed(2)+'" readonly>' +
                                    '</td>' +
                                    '<td>' +
                                    '</td>' +
                                    '</tr>';

                                $('#ingredient_items').append(newRow);
                            });
                            var total = 0;
                            $('.total-price').each(function (index, element) {
                                total = total + parseFloat($(element).val());
                            });
                            $("#total_loss").val(total.toFixed(2));
                        }
                    },

                    error: function (e) {
                        console.log(e);
                    }
                });

            }else{
                $("#total_loss").val('');
                Swal.fire({
                    title: "Warning!",
                    text: "Please Select Food Menu And Quantity First",
                    type: "warning",
                    confirmButtonClass: "btn btn-primary",
                    buttonsStyling: false
                });
            }
        }
        function deleteTableRow(){
            $("#ingredient_items > tr").remove();
            $("#total_loss").val('');
        }

    </script>
@endsection
