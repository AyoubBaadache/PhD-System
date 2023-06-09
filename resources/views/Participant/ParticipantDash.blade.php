@extends('layouts.simple.Participantmaster')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css') }}">

@endsection

@section('style')
@endsection

@section('content')
    <div class="container-fluid" style="margin-top: 150px">
        <div class="row widget-grid">
            <div class="col-xxl-4 col-sm-6 box-col-6">
                <div class="card profile-box">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <div class="greeting-user">
                                    <h4 class="f-w-600">Welcome Back</h4>
                                </div>
                            </div>
                            <div>
                                <div class="clockbox">
                                    <svg id="clock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600">
                                        <g id="face">
                                            <circle class="circle" cx="300" cy="300" r="253.9"></circle>
                                            <path class="hour-marks" d="M300.5 94V61M506 300.5h32M300.5 506v33M94 300.5H60M411.3 107.8l7.9-13.8M493 190.2l13-7.4M492.1 411.4l16.5 9.5M411 492.3l8.9 15.3M189 492.3l-9.2 15.9M107.7 411L93 419.5M107.5 189.3l-17.1-9.9M188.1 108.2l-9-15.6"></path>
                                            <circle class="mid-circle" cx="300" cy="300" r="16.2"></circle>
                                        </g>
                                        <g id="hour">
                                            <path class="hour-hand" d="M300.5 298V142"></path>
                                            <circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
                                        </g>
                                        <g id="minute">
                                            <path class="minute-hand" d="M300.5 298V67"></path>
                                            <circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
                                        </g>
                                        <g id="second">
                                            <path class="second-hand" d="M300.5 350V55"></path>
                                            <circle class="sizing-box" cx="300" cy="300" r="253.9">   </circle>
                                        </g>
                                    </svg>
                                </div>
                                <div class="badge f-10 p-0" id="txt"></div>
                            </div>
                        </div>
                        <div class="cartoon"><img class="img-fluid" src="{{ asset('assets/images/dashboard/cartoon.svg') }}" alt="vector women with leptop"></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-auto col-xl-3 col-sm-6 box-col-6">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card widget-1">
                            <div class="card-body">
                                <div class="widget-content">
                                    <div class="widget-round secondary">
                                        <div class="bg-round">
                                            <i class="svg-fill" data-feather="user"></i>

                                        </div>
                                    </div>
                                    <div>
                                        <h4>10,000</h4><span class="f-light">Teachers</span>
                                    </div>
                                </div>
                                <div class="font-secondary f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>+50%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-auto col-xl-3 col-sm-6 box-col-6">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card widget-1">
                            <div class="card-body">
                                <div class="widget-content">
                                    <div class="widget-round warning">
                                        <div class="bg-round">
                                            <i class="svg-fill" data-feather="users"></i>

                                        </div>
                                    </div>
                                    <div>
                                        <h4>7000</h4><span class="f-light">Participant</span>
                                    </div>
                                </div>
                                <div class="font-warning f-w-500"><i class="icon-arrow-down icon-rotate me-1"></i><span>-20%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-auto col-xl-3 col-sm-6 box-col-6">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card widget-1">
                            <div class="card-body">
                                <div class="widget-content">
                                    <div class="widget-round primary">
                                        <div class="bg-round">
                                            <i class="svg-fil" data-feather="book-open"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h4>4,200</h4><span class="f-light">Subjects</span>
                                    </div>
                                </div>
                                <div class="font-primary f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>+70%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-18 col-sm-20">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header card-no-border">
                                <div class="header-top">
                                    <h5>Total Users</h5>
                                    <div class="dropdown icon-dropdown">
                                        <button class="btn dropdown-toggle" id="userdropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <ul class="user-list">
                                    <li>
                                        <div class="user-icon primary">
                                            <div class="user-box"><i class="font-primary" data-feather="user-plus"></i></div>
                                        </div>
                                        <div>
                                            <h5 class="mb-1">178,098</h5><span class="font-primary d-flex align-items-center"><i class="icon-arrow-up icon-rotate me-1"> </i><span class="f-w-500">+30.89</span></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="user-icon success">
                                            <div class="user-box"><i class="font-success" data-feather="user-minus"></i></div>
                                        </div>
                                        <div>
                                            <h5 class="mb-1">178,098</h5><span class="font-danger d-flex align-items-center"><i class="icon-arrow-down icon-rotate me-1"></i><span class="f-w-500">-08.89</span></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Area Spaline Chart </h5>
                    </div>
                    <div class="card-body">
                        <div id="area-spaline"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12" >
                <div class="card" style="height: 500px">
                    <div class="card-body" >
                        <div class="default-datepicker" >
                            <div class="datepicker-here" data-language="en"></div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('assets/js/clock.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
    <script src="{{ asset('assets/js/notify/index.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/typeahead-custom.js') }}"></script>
    <script src="{{ asset('assets/js/height-equal.js') }}"></script>
    <script src="{{ asset('assets/js/animation/wow/wow.min.js') }}"></script>
    <script src="{{asset('assets/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script src="{{asset('assets/js/chart/apex-chart/stock-prices.js')}}"></script>
    <script src="{{asset('assets/js/chart/apex-chart/chart-custom.js')}}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
@endsection
