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
                    @if($nt_nbr==$vd_nbr)
                        <div>
                                <a class="btn btn-pill btn-light" href="/cfd/Ranking/calc/f">Calc</a>
                        </div>

                    @endif

                </div>
                @if($nbr==0)

                    <div class="alert alert-danger inverse alert-dismissible fade show" role="alert">
                        <i class="icon-alert"></i>
                        <p> Ranking hasn't been recorded yet</p>
                    </div>
                @else
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-2" >
                            <thead>
                            <tr>
                                <th>Secret</th>
                                <th>Final Avg</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($f_grades as $g)
                                <tr >
                                    <td  id="NAME">{{$g->secret_code}}  </td>
                                    <td  id="NAME">{{$g->Final_AVG}}  </td>
                                    <td  id="NAME">{{$g->status}}  </td>

                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Secret</th>
                                <th>Final Avg</th>
                                <th>Status</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                @endif
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
