@extends('master.admin.master')
@section('title', 'Booking List')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">
                <!-- <a href="{{ route ('booking.create')}}" class="btn btn-primary">Booking <i class="fa fa-plus"></i></a> -->
                </h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Manage Guest</a>
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Booking List</a>
                        </li>
                    </ol>
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
                                                <th>Guest Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Total Guest</th>
                                                <th>Prefered Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @if (sizeof ($datas) > 0)
                                                    @foreach ($datas as $data)
                                                        <tr>
                                                            <td>{{++$sl}}</td>
                                                            <td>{{$data->fullName()}}</td>
                                                            <td>{{$data->phone_number}}</td>
                                                            <td>{{$data->email}}</td>
                                                            <td>{{$data->no_of_guest}}</td>
                                                            <td>{{date('d M Y', strtotime($data->date))}}</td>
                                                            <td>{{$data->status}}</td>
                                                            <td>
                                                                <button type="button" title="Confirmed" class="btn btn-icon btn-outline-primary btn-sm" onclick="changeStatus('{{route('bookingConfirm', $data->id)}}')">
                                                                    <i class="fa fa-check-circle"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-icon btn-outline-danger btn-sm" title="Cancel"  onclick="changeStatus('{{route('bookingCancel', $data->id)}}')">
                                                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
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
    </div>
@endsection
@section('script')

<script type="text/javascript">
    function changeStatus(url) {
        $.ajax({
            url : url,
            dataType : 'json',
            success: function () {
                // $("#menu-section").empty().html(data.view);
                location.reload();
            },

            error: function (error) {
                console.log(error);
            }
        });
    }
</script>

@endsection
