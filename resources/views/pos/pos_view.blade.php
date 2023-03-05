@extends('layouts.pos.master')

@section('title', 'POS')

@section('body')

    <section class="mt-1">
        <div class="row">
            <div class="col-md-2">
                <div class="ml-1 card vh-100 rounded">
                    <div class="card-header mx-auto">
                        <h4 class="text-center font-weight-bold">Running Orders <span><i class="feather icon-repeat"></i></span></h4>
                        <input type="text" name="" id="" class="rounded form-control" placeholder="">
                    </div>
                    </br>
                    <div class="card-body h-75">
                        <div class="content">

                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card vh-100 rounded">
                    <h3>cart</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mr-1 card vh-100 rounded">
                    <h3>item</h3>
                </div>
            </div>
        </div>
    </section>
@endsection
