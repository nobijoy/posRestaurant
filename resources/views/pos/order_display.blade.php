@extends('layouts.pos.master')

@section('title', 'POS')

@section('body')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Order Status</h4>
                    </div>
                    <div class="card-body">
                        <p>Order Id: <span> 001</span></p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Order Status</h4>
                    </div>
                    <div class="card-body">
                        <p>Order Id: <span> 001</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset ('/app-assets/js/scripts/forms/input-groups.js') }}"></script>
@endsection
