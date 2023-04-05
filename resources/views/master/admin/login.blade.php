<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$gsetting->title ? $gsetting->title : "POS"}}</title>
    <link rel="apple-touch-icon" href="{{asset('public/uploads/image/'.$gsetting->favicon)}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/uploads/image/' . $gsetting->favicon)}}">

    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/backend/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset ('/public/backend/vendors/css/forms/selects/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('/public/backend/vendors/css/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/backend/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/backend/vendors/css/extensions/unslider.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('/public/backend/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset ('/public/backend/vendors/css/tables/datatable/datatables.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/backend/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/backend/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/backend/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/backend/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('/public/backend/css/plugins/extensions/toastr.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('/public/backend/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/backend/css/core/colors/palette-gradient.css')}}">
    <!-- link(rel='stylesheet', type='text/css', href=app_assets_path+'/css'+rtl+'/pages/users.css')-->
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/backend/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/css/admin-styles.css')}}">
    <!-- END: Custom CSS-->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">


</head>


<body class="vertical-layout vertical-menu 1-column   blank-page blank-page" data-open="click" data-menu="vertical-menu"
    data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <div class="p-1">
                                            <img src="{{asset ('public/uploads/image/'. $gsetting->logo)}}"
                                                alt="branding logo">
                                        </div>
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>{{$gsetting->title}}</span></h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
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
                                        <form class="form-horizontal form-simple" action="{{route('login')}}"
                                            method="POST">
                                            @csrf
                                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                                <input type="text" class="form-control form-control-lg" name="email"
                                                    id="user-name" placeholder="Your Email" required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-user"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control form-control-lg"
                                                    name="password" id="user-password" placeholder="Enter Password"
                                                    required>
                                                <div class="form-control-position">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-sm-6 col-12 text-center text-sm-left"></div>
                                                <div class="col-sm-6 col-12 text-center text-sm-right">
                                                    @if ($gsetting->smtp_check == 1)
                                                        <a href="{{ route('password.request') }}" class="card-link">Forgot Password?</a>
                                                    @endif
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                <i class="feather icon-unlock"></i> Login</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>






    <script src="{{asset('/public/backend/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset ('/public/backend/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset ('/public/backend/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{ asset ('/public/backend/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <script src="{{ asset ('/public/backend/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/public/backend/data/jvector/visitor-data.js')}}"></script>
    <script src="{{asset('/public/backend/vendors/js/charts/chart.min.js')}}"></script>
    <script src="{{asset('/public/backend/vendors/js/charts/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('/public/backend/vendors/js/extensions/unslider-min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('/public/backend/css/core/colors/palette-climacon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/backend/fonts/simple-line-icons/style.min.css')}}">
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('/public/backend/js/core/app-menu.js')}}"></script>
    <script src="{{asset('/public/backend/js/core/app.js')}}"></script>
    <script src="{{asset('/public/backend/assets/js/datatable.js')}}"></script>
    <script src="{{asset('/public/backend/assets/js/common.js')}}"></script>
    <script src="{{asset('/public/backend/assets/js/scripts.js')}}"></script>
    <script src="{{asset('/public/app-assets/js/scripts/forms/form-login-register.js')}}"></script>

    <!-- END: Theme JS-->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            $(".form").submit(function () {
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
    </script>
    @yield('script')
</body>
<!-- END: Body-->

</html>
