@extends('master.admin.master')
@section('title', 'User Search')
@section('body')
    <div class="content-wrapper">
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
                                            <th>ID</th>
                                            <th>User Name</th>
                                            <th>Password</th>
                                            <th>Full Name</th>
                                            <th>Permission</th>
                                            <th>Create Date</th>
                                            <th>Updated Date</th>
{{--                                            <th>Actions</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Name</td>
                                            <td>xyz</td>
                                            <td>Full Name</td>
                                            <td>Super Admin</td>
                                            <td>11.00</td>
                                            <td>12.00</td>
{{--                                            <td>--}}
{{--                                                <a data-toggle="modal"data-target="#editUser" data-target-id=""--}}
{{--                                                   data-name="" >--}}
{{--                                                    <button type="button" title="Edit" class="btn btn-icon btn-outline-primary btn-sm">--}}
{{--                                                        <i class="fa fa-pencil-square"></i></button>--}}
{{--                                                </a>--}}
{{--                                                <button type="button" class="btn btn-icon btn-outline-danger btn-sm" title="Inactive"--}}
{{--                                                        onclick="deleteData()">--}}
{{--                                                    <i class="fa fa-trash" aria-hidden="true"></i>--}}
{{--                                                </button>--}}

{{--                                                <button type="button" class="btn btn-icon btn-outline-primary btn-sm" title="Restore"--}}
{{--                                                        onclick="restoreData()">--}}
{{--                                                    <i class="fa fa-undo" aria-hidden="true"></i>--}}
{{--                                                </button>--}}
{{--                                            </td>--}}
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
