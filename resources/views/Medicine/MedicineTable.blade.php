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
                        <h4 class="mb-sm-0">Medicines</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Master Modules</a></li>
                                <li class="breadcrumb-item active">Medicines</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Medicine Table -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="mb-1">
                                <a href="{{ route('medicine.create') }}" class="btn btn-success mb-2"><i class="mdi mdi-plus me-2"></i> Add Medicine</a>
                            </div>
    
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Arabic Name</th>
                                        <th>English Name</th>
                                        <th>Composition</th>
                                        <th>Indication</th>
                                        <th>Type</th>
                                        <th>number</th>
                                        <th>titer</th>
                                        <th>Company Name</th>
                                        <th>Purchase Price</th>
                                        <th>Selling Price</th>
                                        <th>Alternatives</th>
                                        <th>Action</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medicines as $medicine)
                                        <tr>
                                            <td>{{ $medicine->id }}</td>
                                            <td>{{ $medicine->arabic_name }}</td>
                                            <td>{{ $medicine->english_name }}</td>
                                            <td>{{ $medicine->composition }}</td>
                                            <td>{{ $medicine->indication }}</td>
                                            <td>{{ $medicine->type }}</td>
                                            <td>{{ $medicine->number }}</td>
                                            <td>{{ $medicine->titer }}</td>
                                            <td>{{ $medicine->company_name }}</td>
                                            <td>{{ $medicine->purchase_price }}</td>
                                            <td>{{ $medicine->selling_price }}</td>
                                            <td>
                                                @if ($medicine->alternatives->isNotEmpty())
                                                    <ul>
                                                        @foreach ($medicine->alternatives as $alternative)
                                                            <li>{{ $alternative->name }}</li>
                                                        @endforeach
                                                        
                                                    </ul>
                                                @else
                                                    <span class="text-muted">No alternatives</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('medicine.editPrice', $medicine->id) }}" class="btn btn-primary btn-sm">Update Price</a>
                                                <a href="{{ route('medicine.edit', $medicine->id) }}" class="btn btn-success btn-sm">Update</a>
                                                <form action="{{ route('medicine.destroy', $medicine->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                            <td>{{ $medicine->created_at }}</td>
                                            <td>{{ $medicine->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
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
