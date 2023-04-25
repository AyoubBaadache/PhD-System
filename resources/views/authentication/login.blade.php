@extends('layouts.authentication.master')
@section('title', 'Login')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
<div class="container-fluid p-0">
   <div class="row m-0">
      <div class="col-12 p-0">
         <div class="login-card">
            <div>
               <div><a class="logo" href="" style="height: 50px;width: 180px"><img class="img-fluid  for-light" src="{{asset('assets/images/logo/login.png')}}" alt="looginpage">
                       <img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="login page">
                   </a></div>
               <div class="login-main">
                  <form class="theme-form"  method="POST" action="{{ route('login') }}">
                     <h4 style="color: #0c0c0c">Sign in to account</h4>
                     <p>Enter your email & password to login</p>
                     <div class="form-group">
                        <label class="col-form-label" value="{{ __('Email') }}" >Email Address</label>
                        <input class="form-control" type="email"   name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email">
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password">
                     </div>
                     <div class="form-group mb-0">
                        <div class="checkbox p-0">
                           <input id="checkbox1" type="checkbox">
                           <label class="text-muted" for="checkbox1">Remember password</label>
                        </div>
                        <a class="link" href="">Forgot password?</a>
                        <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
@endsection
