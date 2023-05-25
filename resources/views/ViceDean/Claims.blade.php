@extends('layouts.simple.Participantmaster')
@section('title', 'Finale Grades')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('style')
@endsection



@section('content')
    <div class="container-fluid" style="margin-top: 100px">
        <div class="row">
            <!-- State saving Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <a class="btn btn-pill btn-light" href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" style="font-size: 15px;display: inline-block"><i data-feather="alert-triangle" style="height: 20px;margin-top: 4px; margin-right: 15px;align-items: center"></i> Make Claim</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-9" >
                                <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Average</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>Edinburgh</td>

                                </tr>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Subject</th>
                                    <th>Average</th>
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




@endsection

@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
@endsection
