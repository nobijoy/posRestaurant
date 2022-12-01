@extends('master.admin.master')
@section('title', 'Invoice Due')
@section('body')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-1 col-4 mb-1">
                <h3 class="content-header-title">
                </h3>
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
                                                <th>Invoice No.</th>
                                                <th>Customer Name</th>
                                                <th>Phone No.</th>
                                                <th>Date</th>
                                                <th>Grand</th>
                                                <th>Paid</th>
                                                <th>Invoice Due</th>
                                                <th>Due Paid</th>
                                                <th>Due</th>
                                                <th>Due Pay</th>
                                                <th>Print</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Name</td>
                                                <td>xyz</td>
                                                <td>xyz</td>
                                                <td>Super Admin</td>
                                                <td>12.00</td>
                                                <td>12.00</td>
                                                <td>12.00</td>
                                                <td>12.00</td>
                                                <td>12.00</td>
                                                <td>12.00</td>
                                            </tr>
                                            </tbody>

                                            </tr>
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

    </div>
@endsection
@section('script')
    <script type="text/javascript">
    </script>
@endsection
