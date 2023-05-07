@extends('layouts.simple.CFDmaster')
@section('title', 'Assign Teachers')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('style')
    <style>
        select {

            /* styling */
            background-color: white;
            border: thin solid blue;
            border-radius: 4px;
            width: 100%;
            height: 50px;
            display: inline-block;
            font: inherit;
            line-height: 1.5em;
            padding: 0.5em 3.5em 0.5em 1em;

            /* reset */

            margin: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        select.minimal {
            background-image:
                linear-gradient(45deg, transparent 50%, gray 50%),
                linear-gradient(135deg, gray 50%, transparent 50%),
                linear-gradient(to right, #ccc, #ccc);
            background-position:
                calc(100% - 20px) calc(1em + 2px),
                calc(100% - 15px) calc(1em + 2px),
                calc(100% - 2.5em) 0.5em;
            background-size:
                5px 5px,
                5px 5px,
                1px 1.5em;
            background-repeat: no-repeat;
        }

        select.minimal:focus {
            background-image:
                linear-gradient(45deg, green 50%, transparent 50%),
                linear-gradient(135deg, transparent 50%, green 50%),
                linear-gradient(to right, #ccc, #ccc);
            background-position:
                calc(100% - 15px) 1em,
                calc(100% - 20px) 1em,
                calc(100% - 2.5em) 0.5em;
            background-size:
                5px 5px,
                5px 5px,
                1px 1.5em;
            background-repeat: no-repeat;
            border-color: green;
            outline: 0;
        }


        select:-moz-focusring {
            color: transparent;
            text-shadow: 0 0 0 #000;
        }



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
                                        <select id="select1" class="minimal select-class " >
                                            <option value="1" selected disabled>Teacher 1</option>
                                            <option value="VD">1</option>
                                            <option value="CD">2</option>
                                            <option value="TC">3</option>
                                            <option value="PA">4</option>
                                            <option value="AD">5</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select id="select2" class="minimal select-class " >
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
    <script>

        const selectElements = document.querySelectorAll('.select-class');


        selectElements.forEach(selectElement => {
            selectElement.addEventListener('change', updateSelectOptions);
        });

        function updateSelectOptions() {
            const selectedValue = this.value;

            if (this === select1) {
                select2.querySelectorAll('option').forEach(option => {
                    if (option.value === selectedValue) {
                        option.style.display = 'none';
                        option.disabled = true;
                    } else {
                        option.style.display = 'block';
                        option.disabled = false;
                    }
                });
            } else {
                select1.querySelectorAll('option').forEach(option => {
                    if (option.value === selectedValue) {
                        option.style.display = 'none';
                        option.disabled = true;
                    } else {
                        option.style.display = 'block';
                        option.disabled = false;
                    }
                });
            }
        }
    </script>

    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
@endsection
