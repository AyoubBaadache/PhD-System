@switch(Auth::user()->role)
    @case(0)
        {{$path = 'layouts.simple.master'}}
        @break
    @case(1)
        {{ $path = 'layouts.simple.VDmaster'}}
        @break
    @case(2)
        {{ $path = 'layouts.simple.CFDmaster'}}
        @break
    @case(3)
        {{ $path = 'layouts.simple.Teachermaster'}}
        @break
    @case(4)
        {{ $path = 'layouts.simple.Participantmaster'}}
@endswitch

@extends($path)
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
    <li class="breadcrumb-item">Vice Dean</li>
    <li class="breadcrumb-item active">Announcements</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="user-profile social-app-profile">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 ">
                    <div class="row">
                        <div class="col-sm-12">
                            @foreach($Announcements as $Announcement)
                                <div class="card">
                                    <div class="card-body">
                                        <div class="new-users-social">
                                            <div class="media"><img class="rounded-circle image-radius m-r-15"
                                                                    src="{{$user->profile_photo_url}}" alt="">
                                                <div class="media-body">
                                                    <h6 class="mb-0 f-w-900">{{$user->fname}}  {{$user->lname}}</h6>
                                                    <i style="font-size: 12px">Priority:
                                                        @switch($Announcement->priority)
                                                            @case ("Urgent")
                                                                <span class="font-danger "> {{$Announcement->priority}}</span>
                                                                @break
                                                            @case ("High")
                                                                <span class="font-warning"> {{$Announcement->priority}}</span>
                                                                @break
                                                            @case ("Medium")
                                                                <span class="font-info"> {{$Announcement->priority}}</span>
                                                                @break
                                                            @case ("Low")
                                                                <span class="info-success"> {{$Announcement->priority}}</span>
                                                                @break
                                                        @endswitch

                                                        </i>
                                                </div>
                                            </div>
                                            <br />
                                            <div class="timeline-content">
                                                <i  style="font-size: 15px"> Title : <span style="font-size: 20px;font-weight: 500">{{$Announcement->title}}</span></i>
                                                <p>
                                                    {{$Announcement->Content}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

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