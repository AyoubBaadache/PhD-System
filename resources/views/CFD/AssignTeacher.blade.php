@extends('layouts.simple.CFDmaster')
@section('title', 'Assign Teachers')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Assign Teachers</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">CFD</li>
    <li class="breadcrumb-item active">Assign Teachers</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- State saving Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-9" >
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>last name</th>
                                    <th>Subject</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>Edinburgh</td>
                                    <td>$320,800</td>
                                    <td>
                                        <ul class="action">
                                            <li class="edit"> <a  type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i data-feather="link-2"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>First Name</th>
                                    <th>last name</th>
                                    <th>Subject</th>
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
                    <h5 class="modal-title">Assign Teacher</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Subject</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single ">
                                        <option value="" selected disabled>Subject</option>
                                        <option value="VD">1</option>
                                        <option value="CD">2</option>
                                        <option value="TC">3</option>
                                        <option value="PA">4</option>
                                        <option value="AD">5</option>
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







@endsection

@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
@endsection
