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
                                    <h4 class="mb-sm-0">Users</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Master Modules</a></li>
                                            <li class="breadcrumb-item active">Users</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Pharmacy Name</th>
                                                    <th>Phone Number</th>
                                                    <th>City</th>
                                                    <th>Address</th>
                                                    <th>License Certificate</th>
                                                    <th>Image</th>
                                                    <th>Activated</th>
                                                    <th>Activated at</th>
                                                    <th>Created at</th>
                                                    <th>Updated at</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    @if ($user->name !== 'user')
                                                        <tr>
                                                            <td>{{ $user->id }}</td>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>{{ $user->pharmacy_name }}</td>
                                                            <td>{{ $user->phone_number }}</td>
                                                            <td>{{ $user->city }}</td>
                                                            <td>{{ $user->address }}</td>
                                                            <td>{{ $user->license_certificate }}</td>
                                                            <td><img src="{{asset('storage/image/'.$store->image)}}" alt="error" height="70px" width="70px"></td>
                                                            <td>{{ $user->activated }}</td>
                                                            <td>{{ $user->activated_at }}</td>
                                                            <td>{{ $user->created_at }}</td>
                                                            <td>{{ $user->updated_at }}</td>
                                                            <td>
                                                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary">Show</a>
                                                                <a href="{{ route('user.activate', $user->id) }}" class="btn btn-success">Activate</a>
                                                                <a href="{{ route('user.deactivate', $user->id) }}" class="btn btn-danger">Deactivate</a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                        
        
        
                                 
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

@stop