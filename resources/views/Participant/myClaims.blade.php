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
                        <a class="btn btn-pill btn-light d-flex  align-items-center" href="{{url('/users/create')}}" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" style="font-size: 15px;width: 180px"><i data-feather="plus" style="height: 20px; align-items: baseline"></i> Make Claim</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-9" >
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Subject</th>
                                    <th>Created_at</th>
                                    <th>Status</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($myClaims as $item)
                                    <tr>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->subject_id}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->status}}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Subject</th>
                                    <th>Created_at</th>
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
    <!--Claim Model-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Make Claim</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{url('/participant/myclaims/create')}}" method="post">
                    {!! csrf_field() !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Title</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="title" id="title" type="text" placeholder="Title">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Reason</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="Reason" id="Reason"  type="text" placeholder="Reason">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Subject</label>
                                    <div class="col-sm-12">
                                        <select class="js-example-basic-single " name="subject" id="subject" >
                                            <option disabled selected >Subject</option>
                                            @foreach($subjects as $subject)
                                                <option value="{{$subject->id}}">{{$subject->name}}</option>

                                            @endforeach
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
                </form>
            </div>

        </div>
    </div>

    <!--Claim Model-->




@endsection

@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
@endsection
