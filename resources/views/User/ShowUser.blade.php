@extends('Layouts/layout')



@section('content')
 <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Show User</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Master Modules</a></li>
                                            <li class="breadcrumb-item active">User</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                                <div class="row">
                                        <div class="row">
                                            <div class="mb-4 col-lg-6">
                                                <label class="form-label" for="name">Name:</label>
                                                <span id="name" class="form-control">{{$user->name}}</span>
                                            </div>
                                            <div class="mb-4 col-lg-6">
                                                <label class="form-label" for="email">Email:</label>
                                                <span id="email" class="form-control">{{$user->email}}</span>
                                            </div>
                                            <div class="mb-4 col-lg-6">
                                                <label class="form-label" for="pharmacy_name">Pharmacy Name:</label>
                                                <span id="pharmacy_name" class="form-control">{{$user->pharmacy_name}}</span>
                                            </div>
                                            <div class="mb-4 col-lg-6">
                                                <label class="form-label" for="phone_number">Phone Number:</label>
                                                <span id="phone_number" class="form-control">{{$user->phone_number}}</span>
                                            </div>
                                            <div class="mb-4 col-lg-6">
                                                <label class="form-label" for="city">City:</label>
                                                <span id="city" class="form-control">{{$user->city}}</span>
                                            </div>
                                            <div class="mb-4 col-lg-6">
                                                <label class="form-label" for="address">Address:</label>
                                                <span id="address" class="form-control">{{$user->address}}</span>
                                            </div>
                                            <div class="mb-4 col-lg-6">
                                                <label class="form-label" for="license_certificate">License Certificate:</label>
                                                <span id="license_certificate" class="form-control">{{$user->license_certificate}}</span>
                                            </div>
                                            <div class="mb-4 col-lg-6">
                                                <label class="form-label" for="activated">Activated:</label>
                                                <span id="activated" class="form-control">{{$user->activated}}</span>
                                            </div>
                                            <div class="mb-4 col-lg-6">
                                                <label class="form-label" for="activated_at">Activated at:</label>
                                                <span id="activated_at" class="form-control">{{$user->activated_at}}</span>
                                            </div>
                                            <div class="mb-4 col-lg-6">
                                                <label class="form-label" for="image">Image:</label>
                                                <span id="image" class="form-control">
                                                    <img src="{{asset('storage/image/'.$user->image)}}" alt="error" height="400px" width="400px">
                                                </span>
                                            </div>
                                        </div>  
                                </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
@stop
