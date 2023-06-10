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
                            @foreach($informations as $information)
                                <div style="display: flex; justify-content: space-between;">
                                    <h4 class="card-title">Status:
                                            @if($information->status == 'Admitted')
                                                <span style="font-size: 20px; margin-left: 5px; color: green">Passed</span>
                                            @elseif($information->status == 'refused')
                                                <span style="font-size: 20px; margin-left: 5px; color: red">Failed</span>
                                        @endif
                                    </h4>
                                    <h4 class="card-title" >Average:   <span style="font-size: 20px; margin-left: 5px">{{$information->Final_AVG}}</span></h4>
                                </div>
                            @endforeach

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

                                <button class="btn btn-pill btn-transparent d-flex  align-items-center"  onclick="printContent()"><i data-feather="printer" style="height: 20px; "></i> </button>
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
            <script>
                function printContent() {
                    var cardHeader = document.querySelector('.card-header').outerHTML;
                    var cardBody = document.querySelector('.card-body').innerHTML;
                    var originalContents = document.body.innerHTML;

                    // Remove the search, pagination, entries counter, and limiters from the card-body
                    var tempContainer = document.createElement('div');
                    tempContainer.innerHTML = cardBody;
                    var tableWrapper = tempContainer.querySelector('.dataTables_wrapper');
                    if (tableWrapper) {
                        var dataTableFilter = tableWrapper.querySelector('.dataTables_filter');
                        var dataTablePagination = tableWrapper.querySelector('.dataTables_paginate');
                        var dataTableInfo = tableWrapper.querySelector('.dataTables_info');
                        var dataTableLength = tableWrapper.querySelector('.dataTables_length');
                        if (dataTableFilter) {
                            dataTableFilter.remove();
                        }
                        if (dataTablePagination) {
                            dataTablePagination.remove();
                        }
                        if (dataTableInfo) {
                            dataTableInfo.remove();
                        }
                        if (dataTableLength) {
                            dataTableLength.remove();
                        }
                    }
                    cardBody = tempContainer.innerHTML;

                    var printContents = `
      <h1 style="text-align: center;">Transcript of Grades</h1>
      ${cardHeader}
      ${cardBody}
    `;

                    // Add CSS styles for printing
                    var style = document.createElement('style');
                    style.innerHTML = `
      body {
        color: black !important;
      }
    `;
                    document.head.appendChild(style);

                    document.body.innerHTML = printContents;
                    window.print();

                    document.body.innerHTML = originalContents;

                }
            </script>

        @endsection
