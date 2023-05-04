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

@section('breadcrumb-items')
    <li class="breadcrumb-item">Users</li>
    <li class="breadcrumb-item active">Edit Profile</li>
@endsection

@section('content')
    <div class="container-fluid">
        <x-app-layout>


            <div>
                <div class="max-w-6xl mx-auto py-9 sm:px-6 lg:px-8  " >
                    <div class="mt-10 sm:mt-0 bg-gray-800">

                    @livewire('profile.update-profile-information-form')
                    </div>
                        <div class="mt-10 sm:mt-0 bg-gray-800">
                            @livewire('profile.update-password-form')
                        </div>

                        <div class="mt-10 sm:mt-0  bg-gray-800">
                            @livewire('profile.two-factor-authentication-form')
                        </div>
                    <div class="mt-10 sm:mt-0 bg-gray-800">
                        @livewire('profile.logout-other-browser-sessions-form')
                    </div>
                </div>
            </div>
        </x-app-layout>

    </div>
@endsection

@section('script')

@endsection
