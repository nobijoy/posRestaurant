@extends('master.admin.master')
@section('title', 'Setting')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-1 col-4 mb-1">

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
{{--            <section id="column-selectors">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="card">--}}
{{--                            <div class=" card-content card-header">--}}
{{--                                <h1>Hello {{Auth()->user()->name}}</h1>--}}
{{--                            </div>--}}
{{--                            <div class="card-content collapse show">--}}
{{--                                <div class="card-body card-dashboard">--}}
{{--                                    <p>Change Password</p>--}}
{{--                                    <form action="" method="post"  class="clearForm form" enctype="multipart/form-data">--}}
{{--                                        @csrf--}}
{{--                                        <div class="col-md-4 pb-2">--}}
{{--                                                <label for="password">password<span class="text-danger">*</span></label>--}}
{{--                                                <input type="password" name="password" class="form-control" id="password" value="">--}}

{{--                                        </div>--}}
{{--                                        <div class="col-md-4">--}}
{{--                                            <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">--}}
{{--                                            <input type="submit" id="submitBtn" class="btn btn-outline-primary" value="Save">--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
            <!--/ Column selectors table -->
        </div>

        <!-- Start Add Modal -->
        <!-- End Add Modal -->

        <!-- Start Edit Modal -->
        <!-- End Add Modal -->
    </div>
@endsection
@section('script')

@endsection

