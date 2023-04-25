@extends('layouts.simple.master')
@section('title', 'Announcements')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/photoswipe.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Announcements</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">Announcements List</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="user-profile social-app-profile">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 ">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="new-users-social">
                                                <div class="media"><img class="rounded-circle image-radius m-r-15"
                                                                        src="{{ asset('assets/images/user/1.jpg') }}" alt="">
                                                    <div class="media-body">
                                                        <h6 class="mb-0 f-w-700">ELANA</h6>
                                                        <p>January, 12,2019</p>
                                                    </div><span class="pull-right mt-0"><i
                                                            data-feather="more-vertical"></i></span>
                                                </div>
                                            <div class="timeline-content">
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed
                                                    urna in justo euismod condimentum. Fusce
                                                    placerat enim et odio molestie sagittis.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 ">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="new-users-social">
                                        <div class="media"><img class="rounded-circle image-radius m-r-15"
                                                                src="{{ asset('assets/images/user/1.jpg') }}" alt="">
                                            <div class="media-body">
                                                <h6 class="mb-0 f-w-700">ELANA</h6>
                                                <p>January, 12,2019</p>
                                            </div><span class="pull-right mt-0"><i
                                                    data-feather="more-vertical"></i></span>
                                        </div>
                                        <div class="timeline-content">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed
                                                urna in justo euismod condimentum. Fusce
                                                placerat enim et odio molestie sagittis.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 ">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="new-users-social">
                                        <div class="media"><img class="rounded-circle image-radius m-r-15"
                                                                src="{{ asset('assets/images/user/1.jpg') }}" alt="">
                                            <div class="media-body">
                                                <h6 class="mb-0 f-w-700">ELANA</h6>
                                                <p>January, 12,2019</p>
                                            </div><span class="pull-right mt-0"><i
                                                    data-feather="more-vertical"></i></span>
                                        </div>
                                        <div class="timeline-content">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed
                                                urna in justo euismod condimentum. Fusce
                                                placerat enim et odio molestie sagittis.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/photoswipe/photoswipe.min.js') }}"></script>
    <script src="{{ asset('assets/js/photoswipe/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('assets/js/photoswipe/photoswipe.js') }}"></script>
@endsection
