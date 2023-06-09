@extends('layouts.simple.Participantmaster')
@section('title', 'Grades')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatable-extension.css')}}">
@endsection

@section('style')
    <style>
        .dot {
            height: 10px;
            width: 10px;
            margin-right: 5px;
            background-color: rgba(186,0,18,0.3);
            border-radius: 50%;
            display: inline-block;
        }
    </style>
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
                                        <th>subject</th>
                                        <th>Grade</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($grades as $grade)
                                        <tr>

                                            <td  id="NAME">{{$grade->name}}  </td>
                                            <td  id="NAME">{{$grade->note}}  </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>subject</th>
                                        <th>Grade</th>
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
