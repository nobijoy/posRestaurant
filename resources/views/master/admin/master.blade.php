<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$gsetting->title}} | @yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('/uploads/image/' . $gsetting->favicon)}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/uploads/image/' . $gsetting->favicon)}}">

    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('/backend/vendors/css/forms/selects/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('/backend/vendors/css/forms/toggle/switchery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('/backend/vendors/css/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/vendors/css/extensions/unslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('/backend/vendors/css/tables/datatable/datatables.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/css/bootstrap-extended.css?v1.1')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('/backend/css/plugins/extensions/toastr.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/css/core/menu/menu-types/vertical-menu.css?v1.1')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/css/core/colors/palette-gradient.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/assets/css/style.css?v1.2')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/admin-styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/assets/css/pos_style.css?v2.2.2')}}">
    <!-- END: Custom CSS-->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    @yield('css')


</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-col="2-columns">
        <input type="hidden" id="csrfToken" value="{{ csrf_token() }}">
    <!-- BEGIN: Header-->


    @include('master.admin.header')

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('master.admin.sidebar')
{{--    @include('master.admin.sidebar')--}}
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        @yield('body')
    </div>


    <!-- END: Content-->

    {{--<div class="sidenav-overlay"></div>--}}
    {{--<div class="drag-target"></div>--}}
    <!-- BEGIN: Footer-->
    @include('master.admin.footer')
    <!-- END: Footer-->

    <div class="modal fade " id="pos_window" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
        <div class="modal-dialog modal-xl m-0" role="document">
            <div class="modal-content">
                <div class="modal-body p-0" id="pos_html">
                </div>
            </div>
        </div>
    </div>


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('/backend/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset ('/backend/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset ('/backend/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{ asset ('/backend/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <script src="{{ asset ('/backend/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"></script>
    <script src="{{ asset ('/backend/vendors/js/forms/toggle/switchery.min.js')}}"></script>
    <script src="{{ asset ('/backend/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/backend/data/jvector/visitor-data.js')}}"></script>
    <script src="{{asset('/backend/vendors/js/charts/chart.min.js')}}"></script>
    <script src="{{asset('/backend/vendors/js/charts/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('/backend/vendors/js/extensions/unslider-min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/css/core/colors/palette-climacon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/fonts/simple-line-icons/style.min.css')}}">
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('/backend/js/core/app-menu.js')}}"></script>
    <script src="{{asset('/backend/js/core/app.js')}}"></script>
    <script src="{{asset('/backend/assets/js/datatable.js')}}"></script>
    <script src="{{asset('/backend/assets/js/common.js?v1.2.0')}}"></script>
    <script src="{{asset('/backend/assets/js/scripts.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/forms/form-login-register.js')}}"></script>

        <!-- END: Theme JS-->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $(".form").submit( function (){
                $("#submitBtn").attr("disabled", true);
                return true;
            });

            $('.summernote').summernote(
                {
                    height: 300,
                }
            );
            $(".select2").select2();
        });

        function openPosWindow(pos){
            $.ajax({
                url : "{{ route('pos') }}",
                dataType: "json",

                success:function (data) {
                    $('#pos_html').empty().html(data.view);
                    $("#pos_window").modal('show');
                }
            })
        }
    </script>
    @yield('script')
</body>
<!-- END: Body-->

</html>
