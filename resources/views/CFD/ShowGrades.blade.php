@extends('layouts.simple.CFDmaster')
@section('title', 'Grades')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatable-extension.css')}}">
@endsection

@section('style')
@endsection



@section('content')
    @if($Message=='Finished')

        <div class="container-fluid" style="margin-top: 100px">

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="alert alert-success inverse alert-dismissible fade show" role="alert" >
                            <i class="icon-check"></i>
                            <p>The teachers have finished.</p>

                        </div>

                        <div class="table-responsive">
                            <table class="display" id="basic-9" >
                                <thead>
                                <tr>
                                    <th>Secret</th>
                                    <th>Phase 1</th>
                                    <th>Phase 2</th>
                                    <th>Phase 3</th>
                                    <th>V Grades</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($grades as $note)
                                    <tr>

                                        @if($note['ph3']== null)
                                            <td  id="NAME">{{$note['secret']}}  </td>
                                        @else
                                            <td style="background-color: rgba(186,0,18,0.2)" id="NAME">{{$note['secret']}}  </td>
                                        @endif
                                        @if($note['ph3']== null)
                                                <td  id="NAME">{{$note['ph1']['note']}}</td>
                                        @else
                                                <td style="background-color: rgba(186,0,18,0.2)" id="NAME">{{$note['ph1']['note']}}</td>
                                         @endif
                                         @if($note['ph3']== null)
                                                <td style="" id="NAME">{{$note['ph2']['note']}}  </td>
                                         @else
                                                <td style="background-color: rgba(186,0,18,0.2)" id="NAME">{{$note['ph2']['note']}}  </td>
                                         @endif

                                        @if($note['ph3']== null)
                                            <td  id="NAME">/  </td>
                                        @else
                                            <td style="background-color: rgba(186,0,18,0.2)" id="NAME">{{$note['ph3']['note']}}  </td>
                                        @endif
                                        @if($note['ph3']== null)
                                                <td  id="NAME">{{$note['v_g']['note']}}  </td>
                                        @else
                                                <td style="background-color: rgba(186,0,18,0.2)" id="NAME">{{$note['v_g']['note']}}  </td>
                                        @endif



                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Secret</th>
                                    <th>Phase 1</th>
                                    <th>Phase 2</th>
                                    <th>Phase 3</th>
                                    <th>V Grades</th>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                        @else
                            <div class="alert alert-danger inverse alert-dismissible fade show" role="alert" style="margin-top: 100px">
                                <i class="icon-alert"></i>
                                <p> The teachers didn't finish</p>

                            </div>

                        @endif
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
