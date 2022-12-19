@extends('master.admin.master')

@section('title')
    Add New Purchase
@endsection

@section('body')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">
                    <a href="{{route('purchase.index')}}" class="btn btn-primary">Purchase List<i class="fa fa-eye"></i></a>
                </h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Inventory</a>
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Add Purchase</a>
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
                                <h4 class="card-title" id="basic-layout-card-center">Add New Purchase</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" method="post" action="{{ route ('purchase.store') }}" enctype="multipart/form-data">@csrf
                                        <div class="form-body">
                                            @include('admin.inventory.purchase.form')
                                        </div>

                                        <div class="form-actions">
                                            <a href="{{ route ('purchase.index')}}" class="btn btn-warning mr-1">
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
        let grandTotalPrice = 0;
        $(document).ready(function () {
            //Once add button is clicked
            $("#ingredient").on("change", function(){
                var id = $(this).val();
                var ingredient = $("#ingredient").val();
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
                        $('#ingredient').val('').change();
                        return false;
                    }

                    ingredientSl++;

                    var newRow = '<tr id="ingredient_row_'+ingredient_details[0] + '">' +
                            '<input type="hidden" name="purchase_ingredient_id[]" value="">'+
                            '<td id="sl_'+ingredient_details[0] + '"><p>'+ingredientSl+'</p></td>' +
                            '<td>' +
                                '<input type="hidden" id="ingreadient_id_'+ingredient_details[0] + '" name="ingredient_id[]" value="'+ingredient_details[0]+'">' +
                                '<span id="ingreadient_name_'+ingredient_details[0] +'">'+ingredient_details[1]+' ('+ingredient_details[3]+') </span>' +
                            '</td>' +
                            '<td>' +
                                '<input type="text" class="form-control" name="unit_price[]" placeholder="unit_price" value="'+ingredient_details[4]+'" required '+
                                'onKeyup="subTotal(this)" data-for="'+ingredient_details[0]+'" id="unit-price_'+ingredient_details[0]+'">'+
                            '</td>' +
                            '<td>' +
                                '<div class="input-group">' +
                                    '<input type="text" class="form-control" name="quantity_amount[]" placeholder="Quantity/Amount" aria-describedby="basic-addon_'+ingredient_details[0] + '" '+
                                    'required onKeyup="subTotal(this)" data-for="'+ingredient_details[0]+'" id="amount_'+ingredient_details[0]+'">' +
                                    '<div class="input-group-append">' +
                                        '<span class="input-group-text" id="basic-addon_'+ingredient_details[0] + '">'+ingredient_details[2]+'</span>' +
                                    '</div>' +
                                '</div>' +
                            '</td>' +
                            '<td>' +
                                '<input type="text" class="form-control total-price" name="total_price[]" id="total_price_'+ingredient_details[0]+'" placeholder="total_price" value="" readonly>'+
                            '</td>' +
                            '<td>' +
                                '<button type="button" title="Delete" class="btn btn-danger" onclick="deleteConsumptionRow(this)" data-count="'+ingredient_details[0] + '"> <i class="fa fa-trash"></i></button>' +
                            '</td>' +
                        '</tr>';
                    $('#ingredient_items').append(newRow);
                    addedIngradient.push(ingredient_details[0])
                    $('#ingredient').val('').change();
                    updateRowNo();
                }
            });

            $("#paid").keyup(function() {
                due();

            })
            
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
            let numRows = $("#ingredient_table tbody tr").length;
            for (let r = 0; r < numRows; r++) {
                $("#ingredient_table tbody tr").eq(r).find("td:first p").text(r + 1);
            }
        }

        function subTotal(total) {
            var target = $(total).attr('data-for');
            if ($("#unit-price_"+target).val()) {
                var unitPrice = $("#unit-price_"+target).val();
            }else{
                var unitPrice = 0;
            }
            if ($("#amount_"+target).val()) {
                var amount = $("#amount_"+target).val();
            }else{
                var amount = 0;
            }
            var totalPrice = parseFloat(unitPrice) * parseFloat(amount);
            $("#total_price_"+target).val(totalPrice.toFixed(2));
            grandTotal();
        }

        function grandTotal() {
            var total = 0;
            $('.total-price').each(function (index, element) {
                total = total + parseFloat($(element).val());
            });
            $("#g_total").val(total);
            due();
        }

        function due() {
            let total = 0, paid= 0;
            if ($("#g_total").val()) {
               total = $("#g_total").val();
            }
            if ($("#paid").val()) {
               paid = $("#paid").val();
            }
            let dueAmount = parseFloat(total) - parseFloat(paid);
            $("#due").val(dueAmount.toFixed(2));
            console.log(total, paid);

        }
    </script>
@endsection
