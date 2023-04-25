@extends('layouts.simple.master')
@section('title', 'Users Table')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Users Table</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">Users Table</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- State saving Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <button class="btn btn-pill btn-air-info btn-light" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" style="font-size: 15px;display: inline-block"><i data-feather="user-plus" style="height: 20px; margin-right: 15px;align-items: center"></i> Add User</button>
                        <button class="btn btn-pill btn-air-danger btn-light" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter2" style="font-size: 15px;display: inline-block"><i data-feather="file-plus" style="height: 20px; margin-right: 15px;align-items: center"></i>Add Users</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-9" >
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>last name</th>
                                    <th>User name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Year</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td><span class="badge rounded-pill badge-light-primary">System Architect</span>
                                    </td>
                                    <td>$320,800</td>
                                    <td>
                                        <ul class="action">
                                            <li class="edit"> <a  type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter3"><i class="icon-pencil-alt"></i></a>
                                            </li>
                                            <li class="delete"><a  type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter4"><i class="icon-trash"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>First Name</th>
                                    <th>last name</th>
                                    <th>User name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Year</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- State saving Ends-->
        </div>
    </div>
    <!--Add user Model-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" placeholder="First Name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" placeholder="User Name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single ">
                                        <option value="" selected disabled>Role</option>
                                        <option value="VD">Vice Dean</option>
                                        <option value="CD">CFD</option>
                                        <option value="TC">Teacher</option>
                                        <option value="PA">Participant</option>
                                        <option value="AD">Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-end">
                    <div class="col-sm-9 offset-sm-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-light" type="button" data-bs-dismiss="modal" aria-label="Close" value="Cancel">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Add user Model-->

    <!--Add users Model-->
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Users</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Upload File</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal" aria-label="Close" value="Cancel">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!--Add users Model-->

    <!--Modify Model-->
    <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modify User</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" placeholder="First Name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" placeholder="User Name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="password" placeholder="Password">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-end">
                    <div class="col-sm-9 offset-sm-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-light" type="button" data-bs-dismiss="modal" aria-label="Close" value="Cancel">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modify Model-->

    <!--Delete Model-->
    <div class="modal fade" id="exampleModalCenter4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete User</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p> Are You Sure You Want <strong style="color:#ff1552">To Delete</strong> This User ?</p>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-end">
                    <div class="col-sm-9 offset-sm-3">
                        <button class="btn btn-danger" type="submit">Delete</button>
                        <button class="btn btn-light" type="button" data-bs-dismiss="modal" aria-label="Close" value="Cancel">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Delete Model-->



@endsection

@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
@endsection
