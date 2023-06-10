@extends('layouts.simple.VDmaster')
@section('title', 'Code')

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
                    <div class="card-header pb-0 card-no-border">
                        <a class="btn btn-pill btn-light" href="{{url('/users/create')}}" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" style="font-size: 15px;display: inline-block"><i class="fa fa-share-alt" style=" margin-right: 10px;align-items: center"></i> Make Announcement</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-9">
                                <thead>
                                <tr>
                                    <th style="width: 200px;">Title</th>
                                    <th style="width: 200px">Content</th>
                                    <th style="width: 200px">Priority</th>
                                    <th style="width: 150px;">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                              @foreach($Announcements as $Announcement)
                                <tr>
                                    <th>{{$Announcement->title}}</th>
                                    <th>{{$Announcement->Content}}</th>
                                    <th>{{$Announcement->priority}}</th>

                                    <th>
                                        <ul class="action">
                                            <li class="edit" > <button class="btn btn-sm btn-transparent edit-item-btn editUserBtn" type="button" value="{{$Announcement->id}}" data-bs-toggle="modal" data-bs-target="#editModal"><i class="icon-pencil-alt"></i></button>
                                            </li>
                                            <li class="delete"><button class="btn btn-sm btn-transparent delete-item-btn deleteUserBtn" type="button" value="{{$Announcement->id}}" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="icon-trash"></i></button></li>
                                        </ul>
                                    </th>
                                </tr>
                              @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Priority</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Add Announcement Model-->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Announcement</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{url('/vd/announcementsList/create')}}" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="card-body">
                            <div class="form theme-form">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Announcement Title</label>
                                            <input class="form-control" type="text" id="title" name="title" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Priority</label>
                                            <select class="form-select "  id="priority" name="priority">
                                                <option selected disabled>priority</option>
                                                <option>Low</option>
                                                <option>Medium</option>
                                                <option>High</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Enter some Details</label>
                                            <textarea class="form-control" name="Content" id="exampleFormControlTextarea4 Content " style="height: 80px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Upload File</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="file" id="file" type="file">
                                            </div>
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
        <!--Add Announcement Model-->

        <!--Modify Announcement Model-->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modify Announcements</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/vd/announcementsList/update" method="post">
                        {!! csrf_field() !!}
                        <div class="card-body">
                            <input class="form-control" name="user_edit_id" id="user_id"  type="hidden" >

                            <div class="form theme-form">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Announcement Title</label>
                                            <input class="form-control" type="text" id="title1" name="ttl" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label> Details</label>
                                            <textarea class="form-control" name="cntnt" id="cntnt" style="height:80px;"></textarea>
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
        <!--Modify Announcement Model-->

        <!--Delete Announcement Model-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete User</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{url('vd/announcementsList/delete')}}" method="post" >
                        @csrf
                        @method('DELETE')
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="user_delete_id" id="user_delete_id"  >
                                <div class="col">
                                    <p> Are You Sure You Want <strong style="color:#ff1552">To Delete</strong> This Announcement ?</p>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-end">
                            <div class="col-sm-9 offset-sm-3">
                                <button class="btn btn-danger" type="submit">Delete</button>
                                <button class="btn btn-light" type="button" data-bs-dismiss="modal" aria-label="Close" value="Cancel">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Delete Announcement Model-->
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>

    <script>
        $(document).ready(function(){
            $(".deleteUserBtn").click(function(e){
                e.preventDefault();
                let user_id=$(this).val();
                $("#user_delete_id").val(user_id);
                $("#deleteModel").modal("show");
            });
        });

        $(document).ready(function() {
            $(".editUserBtn").click(function(e) {
                e.preventDefault();
                let user_id = $(this).val();
                $("#user_id").val(user_id);
                $('#editModal').modal('show');
                $tr = $(this).closest("tr");
                let data = $tr.find("th").map(function() {
                    return $(this).text();
                }).get();
                $('#title1').val(data[0]);
                $('#cntnt').val(data[1]);
            });
        });
    </script>

@endsection
