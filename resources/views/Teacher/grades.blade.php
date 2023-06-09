@extends('layouts.simple.Teachermaster')
@section('title', 'Grades')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('style')
@endsection



@section('content')
    <div class="container-fluid" style="margin-top: 100px">
        <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <form  method="post" action = "{{url("teacher/final_grades/store")}}">
                                    @csrf
                                <button class="btn btn-pill  btn-light" type="submit"  style="margin-top: 20px;margin-left:20px; font-size: 15px;display: inline-block"><i data-feather="save" style="height: 20px; margin-right: 15px;align-items: center"></i>Save Changes</button>
                                <div class="card-header">
                                    <input name="folder_id" value="{{$folder->id}}" hidden>
                                </div>
                                <div class="card-body">
                                    <div class="dt-ext table-responsive">
                                        <table class="display" id="basic-2">
                                            <thead>
                                            <tr>
                                                <th>Student's Secret</th>
                                                <th>Mark</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($students as $student)
                                            <tr>
                                                <input name="secret_id[]" value="{{$student->secret}}" hidden>
                                                <td >{{$student->secret_code}}</td>
                                                <td style="align-items: center; width: 550px">
                                                    <div class="col-sm-12">
                                                        <div hidden> {{$student->note}}</div>
                                                    <input class="form-control" name="student_mark[]" value="{{$student->note}}">
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Student's Secret</th>
                                                <th>Mark</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                </form>
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
{{--    <script>$('.display').dataTable( {--}}
{{--            "ordering": false--}}
{{--        } );</script>--}}
@endsection
