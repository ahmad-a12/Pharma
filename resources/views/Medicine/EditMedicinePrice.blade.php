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
                        <h4 class="mb-sm-0">Edit Medicine Prices</h4>

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

            <!-- Edit Medicine Prices Form -->
            <div class="row">
                <form action="{{ route('medicine.updatePrice', $medicine->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Main Medicine Price Fields -->
                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="purchase_price">Purchase Price</label>
                            <input id="purchase_price" class="form-control" placeholder="Purchase Price" name="purchase_price" type="number" value="{{ old('purchase_price', $medicine->purchase_price) }}">
                        </div>
                        @error('purchase_price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="selling_price">Selling Price</label>
                            <input id="selling_price" class="form-control" placeholder="Selling Price" name="selling_price" type="number" value="{{ old('selling_price', $medicine->selling_price) }}">
                        </div>
                        @error('selling_price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror

                        <!-- Submit Button -->
                        <div class="col-12">
                            <button class="btn btn-success mb-2"><i class="mdi mdi-check me-2"></i> Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
@stop
