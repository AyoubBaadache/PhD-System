@extends('layouts.simple.CFDmaster')
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
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-9" >
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Subject</th>
                                    <th>Participant</th>
                                    <th>Reason</th>
                                    <th>Created at</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Claims as $item)
                                <tr>

                                        <td>{{$item->title}}</td>
                                        <td>{{$item->subject_id}}</td>
                                        <td>{{$item->user_id}}</td>
                                        <td>{{$item->claim}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit">
                                                    <a class="btn btn-sm btn-transparent delete-item-btn acceptClaimBtn" href="claims/accept/{{$item->id}}" type="button" value="{{$item->id}}"><i class="fa fa-check"></i></a>
                                                </li>
                                                <li class="delete">
                                                    <a class="btn btn-sm btn-transparent delete-item-btn refuseClaimBtn" href="claims/refuse/{{$item->id}}" type="button" value="{{$item->id}}" ><i class="fa fa-file-excel-o"></i></a>
                                                </li>
                                            </ul>
                                        </td>

                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Subject</th>
                                    <th>Participant</th>
                                    <th>Reason</th>
                                    <th>Created at</th>
                                    <th>Status</th>
                                    <th></th>
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
