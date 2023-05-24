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
    <div class="container-fluid" style="margin-top: 100px">
        <div class="row">
            <!-- State saving Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                    </div>
                    <from>

                        <div class="card-body">
                            <button class="btn btn-pill btn-light" style="margin-bottom: 15px;" type="submit">Validate</button>

                        <div class="table-responsive">
                            <table class="display" id="basic-9" >
                                <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>First Teacher</th>
                                    <th>Second Teacher</th>
                                    <th>Papers</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>
                                        <select id="select1" class=" js-example-basic-single " >
                                            <option value="1" selected disabled>Teacher 1</option>
                                            <option value="VD">1</option>
                                            <option value="CD">2</option>
                                            <option value="TC">3</option>
                                            <option value="PA">4</option>
                                            <option value="AD">5</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select id="select2" class=" js-example-basic-single " >
                                            <option value="2" selected disabled>Teacher 2</option>
                                            <option value="VD">1</option>
                                            <option value="CD">2</option>
                                            <option value="TC">3</option>
                                            <option value="PA">4</option>
                                            <option value="AD">5</option>
                                        </select>
                                    </td>
                                    <td class="col-sm-4">
                                            <input  class="form-control" name="paper" id="paper"  type="number" placeholder="Papers Number">

                                    </td>
                                </tr>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Subject</th>
                                    <th>First Teacher</th>
                                    <th>Second Teacher</th>
                                    <th>Papers</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    </from>
                </div>
            </div>
            <!-- State saving Ends-->
        </div>
    </div>




@endsection

@section('script')

    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
@endsection
