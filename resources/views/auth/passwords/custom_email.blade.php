<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>{{$gsetting->title ? $gsetting->title : "POS"}}</title>
    <link rel="apple-touch-icon" href="{{asset('public/uploads/image/' . $gsetting->favicon)}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/uploads/image/' . $gsetting->favicon)}}">
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/components.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('public/backend/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/core/colors/palette-gradient.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

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
                            <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                                <div class="card-header border-0 pb-0">
                                    <div class="card-title text-center">
                                        <img src="{{asset ('public/uploads/image/'. $gsetting->logo)}}"
                                            alt="branding logo">
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>We will send
                                            you a link to reset password.</span></h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal" action="{{ route('password.email') }}"
                                            method="POST">
                                            @csrf
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" autofocus>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                @if(session()->has('status'))
                                                <div class="alert alert-success pt-2">
                                                    {{ session()->get('status') }}
                                                </div>
                                                @endif
                                                <div class="form-control-position">
                                                    <i class="feather icon-mail"></i>
                                                </div>
                                            </fieldset>
                                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block"><i
                                                    class="feather icon-unlock"></i> Recover Password</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer border-0">
                                    <p class="float-sm-left text-center">
                                        <a href="{{route('login')}}" class="card-link">Login</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('public/backend/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('public/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('public/backend/js/core/app-menu.js')}}"></script>
    <script src="{{asset('public/backend/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('public/app-assets/js/scripts/forms/form-login-register.js')}}"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>