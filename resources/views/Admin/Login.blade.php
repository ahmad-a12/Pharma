@extends('Layouts/AddOrUpdate')
@section('title','Login')
@section('content')
<form class="login100-form validate-form" action="{{route('save')}}" method="post">
    @csrf
    <span class="login100-form-title p-b-49">
        Login
    </span>
    <div class="wrap-input100 validate-input m-b-23" data-validate="Email is required">
        <span class="label-input100">Email</span>
        <input class="input100" type="email" name="email" placeholder="Type your Email" value="{{ old('email') }}">
        @error('email')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="wrap-input100 validate-input m-b-23" data-validate="Password is required">
        <span class="label-input100">Password</span>
        <input class="input100" type="password" name="password" placeholder="Type your Password">
        @error('password')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
    </div>

    <br><br>
    <div class="container-login100-form-btn">
        <div class="wrap-login100-form-btn">
            <div class="login100-form-bgbtn"></div>
            <button class="login100-form-btn">
                Login
            </button>
        </div>
    </div>
</form>
<div id="dropDownSelect1"></div>
@stop
