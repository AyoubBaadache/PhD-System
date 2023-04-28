@extends('layouts.simple.master')
@section('title', 'Users Table')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Users Table</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">Users Table</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- State saving Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <a class="btn btn-pill btn-light" href="{{url('/users/create')}}" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" style="font-size: 15px;display: inline-block"><i data-feather="user-plus" style="height: 20px; margin-right: 15px;align-items: center"></i> Add User</a>
                        <a class="btn btn-pill  btn-light" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter2" style="font-size: 15px;display: inline-block"><i data-feather="file-plus" style="height: 20px; margin-right: 15px;align-items: center"></i>Add Users</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-9" >
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Ar First Name</th>
                                    <th>last name</th>
                                    <th>Ar last name</th>
                                    <th>Birthdate</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $item)
                                <tr>
                                    <td>{{$item->fname}}</td>
                                    <td>{{$item->ar_fname}}</td>
                                    <td>{{$item->lname}}</td>
                                    <td>{{$item->ar_fname}}</td>
                                    <td>{{$item->birthdate}}</td>
                                    <td>{{$item->email}}</td>
                                    @switch($item->role)
                                            @case('1')
                                                <td>Vice Dean</td>
                                                @break
                                            @case('2')
                                                 <td>CFD</td>
                                                 @break
                                            @case('3')
                                                 <td>Teacher</td>
                                                 @break
                                            @case('4')
                                                 <td>Participant</td>
                                                 @break
                                    @endswitch
                                    <td>
                                        <ul class="action">
                                            <li class="edit" > <button class="btn btn-sm btn-transparent edit-item-btn editUserBtn" type="button" value="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#editModal"><i class="icon-pencil-alt"></i></button>
                                            </li>
                                            <li class="delete"><button class="btn btn-sm btn-transparent delete-item-btn deleteUserBtn" type="button" value="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="icon-trash"></i></button></li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>First Name</th>
                                    <th>Ar First Name</th>
                                    <th>last name</th>
                                    <th>Ar last name</th>
                                    <th>Birthdate</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
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
    <!--Add user Model-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{url('/admin/users')}}" method="post">
                    {!! csrf_field() !!}

                    <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="fname" id="fname" type="text" placeholder="First Name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label"> Arabic First Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="ar_fname" id="ar_fname"  type="text" placeholder="First Name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="lname" id="lname"  type="text" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Arabic Last Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="ar_lname" id="ar_lname"  type="text" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Birthdate</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="birthdate" id="birthdate"  type="date" placeholder="BirthDate">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">age</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="age" id="age"  type="number" placeholder="Age">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="email" id="email"  type="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="password" id="password"  type="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single " name="role" id="role" >
                                        <option value="" selected disabled>Role</option>
                                        <option value="1">Vice Dean</option>
                                        <option value="2">CFD</option>
                                        <option value="3">Teacher</option>
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
    <!--Add user Model-->

    <!--Add users Model-->
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Users</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Upload File</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal" aria-label="Close" value="Cancel">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!--Add users Model-->

    <!--Modify Model-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modify User</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/users/update" method="post">
                    {!! csrf_field() !!}
                    {{method_field('PUT')}}
                    <div class="card-body">
                        <div class="row">
                            <input class="form-control" name="user_edit_id" id="user_id"  type="hidden" >
                                <div class="col">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="Fname" id="Fname" type="text">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Ar First Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="ar_Fname" id="ar_Fname"  type="text">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="Lname" id="Lname"  type="text" >
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Ar Last Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="ar_Lname" id="ar_Lname"  type="text">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Birthdate</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="Birthdate" id="Birthdate"  type="date">
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
    <!--Modify Model-->

    <!--Delete Model-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete User</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{url('/admin/users/delete_user')}}" method="post" >
                    @csrf
                    @method('DELETE')
                    <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="user_delete_id" id="user_delete_id"  >
                        <div class="col">
                            <p> Are You Sure You Want <strong style="color:#ff1552">To Delete</strong> This User ?</p>
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
    <!--Delete Model-->



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



        $(document).ready(function(){
            $(".editUserBtn").click(function(e){
                e.preventDefault();
                let user_id=$(this).val();
                $("#user_id").val(user_id);
                $('editModal').modal('show');
                $tr =$(this).closest("tr");
                let data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();
                console.log(data);
                $('#Fname').val(data[0]);
                $('#ar_Fname').val(data[1]);
                $('#Lname').val(data[2]);
                $('#ar_Lname').val(data[3]);
                $('#Birthdate').val(data[4]);




            });
        });
    </script>

@endsection
