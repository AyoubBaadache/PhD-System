@switch(Auth::user()->role)
    @case(0)
{{$path = 'layouts.simple.master'}}
        return $path
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
        @break

@endswitch
@extends($path)

@section('title', ' Profile')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3> Profile</h3>
@endsection



@section('content')
    <div class="container-fluid">
        <x-app-layout>


                <div class="col-sm-118 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>My Profile</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="tab-content text-end" id="v-pills-secondary-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-secondary-home" role="tabpanel" aria-labelledby="v-pills-secondary-home-tab">
                                            <div class="mt-10 sm:mt-0 bg-light-dark">

                                                @livewire('profile.update-profile-information-form')
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-secondary-profile" role="tabpanel" aria-labelledby="v-pills-secondary-profile-tab">
                                            <div class="mt-10 sm:mt-0 bg-light-dark">
                                                @livewire('profile.update-password-form')
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="v-pills-secondary-messages" role="tabpanel" aria-labelledby="v-pills-secondary-messages-tab">
                                            <div class="mt-10 sm:mt-0  bg-light-dark">
                                                @livewire('profile.two-factor-authentication-form')
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="v-pills-secondary-settings" role="tabpanel" aria-labelledby="v-pills-secondary-settings-tab">
                                            <div class="mt-10 sm:mt-0 bg-light-dark">
                                                @livewire('profile.logout-other-browser-sessions-form')
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 tabs-responsive-side">
                                    <div class="nav flex-column nav-info border-tab nav-right" id="v-pills-secondary-tab" role="tablist" aria-orientation="vertical"><a class="nav-link active" id="v-pills-secondary-home-tab" data-bs-toggle="pill" href="#v-pills-secondary-home" role="tab" aria-controls="v-pills-secondary-home" aria-selected="true">Information</a>
                                        <a class="nav-link" id="v-pills-secondary-profile-tab" data-bs-toggle="pill" href="#v-pills-secondary-profile" role="tab" aria-controls="v-pills-secondary-profile" aria-selected="false">Password</a>
                                        <a class="nav-link" id="v-pills-secondary-messages-tab" data-bs-toggle="pill" href="#v-pills-secondary-messages" role="tab" aria-controls="v-pills-secondary-messages" aria-selected="false">2FA</a>
                                        <a class="nav-link" id="v-pills-secondary-settings-tab" data-bs-toggle="pill" href="#v-pills-secondary-settings" role="tab" aria-controls="v-pills-secondary-settings" aria-selected="false">Sessions</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



        </x-app-layout>

    </div>
@endsection

@section('script')

@endsection
