@extends('Layouts/AddOrUpdate')
@section('title','Register')
@section('content')
<form class="login100-form validate-form" action="{{route('store')}}" method="post" enctype='multipart/form-data'>
    @csrf
    <span class="login100-form-title p-b-49">
        Register
    </span>
    <div class="wrap-input100 validate-input m-b-23">
        <span class="label-input100">Email</span>
        <input class="input100" type="email" name="email" placeholder="Type your Email" value="{{ old('email') }}">
        @error('email')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="wrap-input100 validate-input m-b-23">
        <span class="label-input100">Password</span>
        <input class="input100" type="password" name="password" placeholder="Type your Password">
        @error('password')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Employee</label>
        <select class="form-control select2" name="employee_id">
            <option value="">Employee</option>
            @foreach ($employees as $employee)
                <option value="{{$employee->id}}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>{{$employee->email}}</option>
            @endforeach
        </select>
        @error('employee_id')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Seat</label>
        <select class="form-control select2" name="number">
            <option value="">Seat</option>
            @foreach ($seats as $seat)
                <option value="{{$seat->number}}" {{ old('number') == $seat->number ? 'selected' : '' }}>{{$seat->number}}</option>
            @endforeach
        </select>
        @error('number')
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
                Register
            </button>
        </div>
    </div>
</form>
<div id="dropDownSelect1"></div>
@stop
