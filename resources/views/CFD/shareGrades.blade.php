@extends('layouts.simple.CFDmaster')
@section('title', 'Grades')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatable-extension.css')}}">
@endsection

@section('style')
@endsection



@section('content')
    <div class="container-fluid" style="margin-top: 100px">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-9" >
                                <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Nbr Copies</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subjects as $subject)
                                    <tr >
                                        <td  id="NAME">{{$subject->id}}  </td>
                                        <td  id="NAME">{{$subject->nbr_copies}}  </td>
                                        <td style="width: 150px" id="NAME">
                                            <a href="/cfd/share_grades/{{$subject->id}}" id="add" class="btn btn-pill  btn-light ">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Subject</th>
                                    <th>Nbr Copies</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
@endsection
