@extends('layouts.simple.CFDmaster')
@section('title', 'Assign Teachers')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('style')
    <style>
        .hidden {display:none}

    </style>
@endsection

@section('breadcrumb-title')
    <h3>Assign Teachers</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">CFD</li>
    <li class="breadcrumb-item active">Assign Teachers</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- State saving Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                    </div>
                    <from>

                        <div class="card-body">
                            <button class="btn btn-pill btn-light" style="margin-bottom: 15px;" type="submit">Validate</button>

                        <div class="table-responsive">
                            <table class="display" id="basic-9" >
                                <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>First Teacher</th>
                                    <th>Second Teacher</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>
                                        <select class="js-example-basic-single " id="select-form-1">
                                            <option value="1" selected disabled>Teacher 1</option>
                                            <option value="VD">1</option>
                                            <option value="CD">2</option>
                                            <option value="TC">3</option>
                                            <option value="PA">4</option>
                                            <option value="AD">5</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="js-example-basic-single " id="select-form-2">
                                            <option value="2" selected disabled>Teacher 2</option>
                                            <option value="VD">1</option>
                                            <option value="CD">2</option>
                                            <option value="TC">3</option>
                                            <option value="PA">4</option>
                                            <option value="AD">5</option>
                                        </select>
                                    </td>
                                    <td>
                                        <ul class="action">

                                        </ul>
                                    </td>
                                </tr>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Subject</th>
                                    <th>First Teacher</th>
                                    <th>Second Teacher</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    </from>
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
    <script>
        $( document ).ready(function() {

            // Get references to the two select forms
            const selectForm1 = document.getElementById('select-form-1');
            const selectForm2 = document.getElementById('select-form-2');

            // Add event listeners to both select forms
            selectForm1.addEventListener('change', handleSelectChange);
            selectForm2.addEventListener('change', handleSelectChange);

            // Define the event handler function
            function handleSelectChange(event) {
                // Get the selected value of the current form
                const selectedValue = event.target.value;

                // Determine which form triggered the event
                const isForm1 = event.target === selectForm1;

                // Get a reference to the other form
                const otherForm = isForm1 ? selectForm2 : selectForm1;

                // Remove the options that have already been selected in the other form
                Array.from(otherForm.options).forEach(option => {
                    if (option.value === selectedValue) {
                        option.remove();
                    }
                });
            }});
    </script>
@endsection
