@extends('layouts.simple.CFDmaster')
@section('title', 'Assign Teachers')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/sweetalert2.css')}}">

@endsection

@section('style')
@endsection

@section('content')


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Teacher</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{url("cfd/assignTeachers/store")}}" method="post"  >
                        @csrf
                        <div >
                            <input type="hidden" name="subject_id" id="subject_id"  >
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-4 col-form-label" for="teacher">Choose a teacher:</label>
                                            <div class="col-sm-8">
                                                <select class="js-example-basic-single" name="teacher_id" id="teacher_id">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-4 col-form-label" for="teacher">Copies number:</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="number" name="c_nbr" id="c_nbr"  >
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-4 col-form-label" for="phases">Choose a phase:</label>
                                            <div class="col-sm-8">
                                                <select class="js-example-basic-single" name="phase" id="phase">
                                                    <option value="1">phase 1</option>
                                                    <option value="2">phase 2</option>
                                                    <option id ="3" value="3">phase 3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid" style="margin-top: 120px">
        @if($errors->any())
            <div class="alert alert-danger inverse alert-dismissible fade show" role="alert">
                <i class="icon-alert"></i>
                <p>You have  <b> exceeded </b> the copies numbers </p>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"><span class="bg-danger" aria-hidden="true"></span></button>
            </div>
        @endif
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
                                    <th>Name</th>
                                    <th>Copies Number</th>
                                    <th>Phase 1</th>
                                    <th>Copies </th>
                                    <th>Phase 2</th>
                                    <th>Copies</th>
                                    <th>Phase 3</th>
                                    <th>Copies</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="myTable" >
                                @foreach($subjects as $subject)
                                    <tr >
                                        <td id="NAME">{{$subject['name']}}  </td>
                                        <td  id="NAME">{{$subject['copies']}}  </td>
                                        <td  id="#teacher_info">
                                            @foreach($subject['ph1'] as $teacher)
                                                <div id="info_t">
                                                    {{$teacher->lname}} copies :
                                                </div>

                                            @endforeach

                                        </td>
                                        <td  id="#teacher_info">
                                            @foreach($subject['c1'] as $copies)
                                                <div id="info_t">
                                                    {{$copies->t_copies}}
                                                </div>

                                            @endforeach

                                        </td>

                                        <td  id="NAME">
                                            @foreach($subject['ph2'] as $teacher)
                                                <div>
                                                    {{$teacher->lname}} copies :
                                                </div>

                                            @endforeach
                                        </td>
                                        <td  id="#teacher_info">
                                            @foreach($subject['c2'] as $copies)
                                                <div id="info_t">
                                                    {{$copies->t_copies}}
                                                </div>

                                            @endforeach

                                        </td>
                                        <td  id="NAME">
                                            @foreach($subject['ph3'] as $teacher)
                                                <div>
                                                    {{$teacher->lname}} copies :
                                                </div>

                                            @endforeach
                                        </td>
                                        <td  id="#teacher_info">
                                            @foreach($subject['c3'] as $copies)
                                                <div id="info_t">
                                                    {{$copies->t_copies}}
                                                </div>

                                            @endforeach

                                        </td>


                                        <td  id="NAME">
                                            <!-- Button trigger modal -->
                                            <button type="button" id="add" class="btn btn-pill  btn-light AssignTeacherBtn" value="{{$subject['id']}}" data-value="{{$subject['ph1']}}" data-value2="{{$subject['ph2']}}" data-value3="{{$subject['c3']}}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Add teacher
                                            </button>


                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Copies Number</th>
                                    <th>Phase 1</th>
                                    <th>Copies </th>
                                    <th>Phase 2</th>
                                    <th>Copies</th>
                                    <th>Phase 3</th>
                                    <th>Copies</th>
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
    <script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/sweet-alert/app.js')}}"></script>
    <script type="text/javascript">

        $(document).ready(function(){

            $(".AssignTeacherBtn").click(function (e){

                    e.preventDefault();
                    let subject_id=$(this).val();

                    var dataValue = this.getAttribute("data-value");
                    var dataValue2 = this.getAttribute("data-value2");

                    console.log(subject_id);
                    console.log(dataValue);
                    console.log(dataValue2);
                    $("#subject_id").val(subject_id);
                    $.ajax({
                        url:"{{route('get_teacher')}}",
                        type : "POST",
                        dataType:'json',
                        data : {
                            dataValue,
                            dataValue2,
                            _token: '{!! csrf_token() !!}'
                        },
                        // handle a successful response
                        success : function(response){
                            console.log('success',response)
                            jQuery('#teacher_id').find('option')
                                .remove()
                                .end()
                            jQuery.each(response,function(key,value){
                                console.log(value);
                                jQuery('#teacher_id')
                                    .append('<option  value='+ value.id +'>'+ value.fname+ '</option>')
                            })
                        },
                        error:function(error)
                        {
                            console.log('error')
                        },
                    })

                }
            )
        })
        $(document).ready(function(){

            $(".AssignTeacherBtn1").click(function (e){

                    e.preventDefault();
                    let subject_id=$(this).val();

                    var dataValue = this.getAttribute("data-value");
                    var dataValue2 = this.getAttribute("data-value2");

                    console.log(subject_id);
                    console.log(dataValue);
                    console.log(dataValue2);
                    $("#subject_id1").val(subject_id);
                    $.ajax({
                        url:"{{route('get_teacher')}}",
                        type : "POST",
                        dataType:'json',
                        data : {
                            dataValue,
                            dataValue2,
                            _token: '{!! csrf_token() !!}'
                        },
                        // handle a successful response
                        success : function(response){
                            console.log('success',response)
                            jQuery('#teacher_id1').find('option')
                                .remove()
                                .end()
                            jQuery.each(response,function(key,value){
                                console.log(value);
                                jQuery('#teacher_id1')
                                    .append('<option  value='+ value.id +'>'+ value.fname+ '</option>')
                            })
                        },
                        error:function(error)
                        {
                            console.log('error')
                        },
                    })

                }
            )
        })
        $('#phase').change(function (){
            var c=document.querySelector('#phase')
            var inp=document.querySelector('#c_nbr')
            console.log(c.value)
            if (c.value==="3"){
                inp.disabled = true;
            }else {
                inp.disabled = false;
            }
        })
    </script>

@endsection
