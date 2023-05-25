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
                                <tr>
                                    @foreach($Claims as $item)
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->subject_id}}</td>
                                    <td>{{$item->user_id}}</td>
                                    <td>{{$item->claim}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        <ul class="action">

                                            <li class="edit"> <form action="{{url('/vd/claims/accept')}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input class="form-control" name="accept" id="accept"  type="hidden" value="{{$item->id}}">
                                            <button class="btn btn-sm btn-transparent delete-item-btn acceptClaimBtn" type="submit" value="{{$item->id}}"><i class="fa fa-check"></i></button>
                                        </form>
                                            </li>
                                            <li class="delete">
                                                <form action="{{url('/vd/claims/refuse')}}" method="post">
                                                    @csrf
                                                    @method('PUT')

                                                    <input class="form-control" name="refuse" id="refuse"  type="hidden" value="{{$item->id}}" >
                                            <button class="btn btn-sm btn-transparent delete-item-btn refuseClaimBtn" type="submit" value="{{$item->id}}" ><i class="fa fa-file-excel-o"></i></button>
                                        </form>
                                            </li>
                                        </ul>
                                    </td>
                                    @endforeach
                                </tr>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Subject</th>
                                    <th>Participant</th>
                                    <th>Reason</th>
                                    <th>Created at</th>
                                    <th>Status</th>
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
