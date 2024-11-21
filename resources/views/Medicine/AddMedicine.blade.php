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
                        <h4 class="mb-sm-0">Add Medicine</h4>

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

            <!-- Add Medicine Form -->
            <div class="row">
                <form action="{{ route('medicine.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <!-- Main Medicine Fields -->
                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="arabic_name">Medicine Arabic Name</label>
                            <input id="arabic_name" class="form-control" placeholder="Medicine Arabic Name" name="arabic_name" type="text" value="{{ old('name') }}">
                        </div>
                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="english_name">Medicine English Name</label>
                            <input id="english_name" class="form-control" placeholder="Medicine English Name" name="english_name" type="text" value="{{ old('name') }}">
                        </div>
                        @error('english_name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="composition">Composition</label>
                            <input id="composition" class="form-control" placeholder="Composition" name="composition" type="text" value="{{ old('composition') }}">
                        </div>

                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="indication">Indication</label>
                            <input id="indication" class="form-control" placeholder="Indication" name="indication" type="text" value="{{ old('indication') }}">
                        </div>

                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="type">Type</label>
                            <input id="type" class="form-control" placeholder="Type" name="type" type="text" value="{{ old('type') }}">
                        </div>

                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="number">Number</label>
                            <input id="number" class="form-control" placeholder="Number" name="number" type="text" value="{{ old('number') }}">
                        </div>

                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="titer">Titer</label>
                            <input id="titer" class="form-control" placeholder="Titer" name="titer" type="text" value="{{ old('titer') }}">
                        </div>

                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="company_name">Company Name</label>
                            <input id="company_name" class="form-control" placeholder="Company Name" name="company_name" type="text" value="{{ old('company_name') }}">
                        </div>

                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="purchase_price">Purchase Price</label>
                            <input id="purchase_price" class="form-control" placeholder="Purchase Price" name="purchase_price" type="number" value="{{ old('purchase_price') }}">
                        </div>

                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="selling_price">Selling Price</label>
                            <input id="selling_price" class="form-control" placeholder="Selling Price" name="selling_price" type="number" value="{{ old('selling_price') }}">
                        </div>

                        <!-- Alternatives Section -->
                        <div class="mb-4 col-12">
                            <label class="form-label">Alternatives</label>
                            <div id="alternatives">
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <input class="form-control" placeholder="Alternative Arabic Name" name="alternatives[0][arabic_name]" type="text">
                                    </div>
                                    <div class="col-lg-4">
                                        <input class="form-control" placeholder="Alternative English Name" name="alternatives[0][english_name]" type="text">
                                    </div>
                                    <div class="col-lg-4">
                                        <input class="form-control" placeholder="Composition" name="alternatives[0][composition]" type="text">
                                    </div>
                                    <div class="col-lg-4">
                                        <input class="form-control" placeholder="Indication" name="alternatives[0][indication]" type="text">
                                    </div>
                                    <div class="col-lg-4">
                                        <input class="form-control" placeholder="Type" name="alternatives[0][type]" type="text">
                                    </div>
                                    <div class="col-lg-4">
                                        <input class="form-control" placeholder="Number" name="alternatives[0][number]" type="text">
                                    </div>
                                    <div class="col-lg-4">
                                        <input class="form-control" placeholder="Titer" name="alternatives[0][titer]" type="text">
                                    </div>
                                    <div class="col-lg-4">
                                        <input class="form-control" placeholder="Company Name" name="alternatives[0][company_name]" type="text">
                                    </div>
                                    <div class="col-lg-4">
                                        <input class="form-control" placeholder="Purchase Price" name="alternatives[0][purchase_price]" type="number">
                                    </div>
                                    <div class="col-lg-4">
                                        <input class="form-control" placeholder="Selling Price" name="alternatives[0][selling_price]" type="number">
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="add-alternative" class="btn btn-primary btn-sm"><i class="mdi mdi-plus me-2"></i> Add Alternative</button>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12">
                            <button class="btn btn-success mb-2"><i class="mdi mdi-check me-2"></i> Save Medicine</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>

<script>
    // JavaScript to dynamically add alternatives
    let alternativeIndex = 1;
    document.getElementById('add-alternative').addEventListener('click', function () {
        const container = document.getElementById('alternatives');
        const row = document.createElement('div');
        row.className = 'row mb-3';
        row.innerHTML = `
            <div class="col-lg-4">
                <input class="form-control" placeholder="Alternative Arabic Name" name="alternatives[${alternativeIndex}][arabic_name]" type="text">
            </div>
            <div class="col-lg-4">
                <input class="form-control" placeholder="Alternative English Name" name="alternatives[${alternativeIndex}][english_name]" type="text">
            </div>
            <div class="col-lg-4">
                <input class="form-control" placeholder="Composition" name="alternatives[${alternativeIndex}][composition]" type="text">
            </div>
            <div class="col-lg-4">
                <input class="form-control" placeholder="Indication" name="alternatives[${alternativeIndex}][indication]" type="text">
            </div>
            <div class="col-lg-4">
                <input class="form-control" placeholder="Type" name="alternatives[${alternativeIndex}][type]" type="text">
            </div>
            <div class="col-lg-4">
                <input class="form-control" placeholder="Number" name="alternatives[${alternativeIndex}][number]" type="text">
            </div>
            <div class="col-lg-4">
                <input class="form-control" placeholder="Titer" name="alternatives[${alternativeIndex}][titer]" type="text">
            </div>
            <div class="col-lg-4">
                <input class="form-control" placeholder="Company Name" name="alternatives[${alternativeIndex}][company_name]" type="text">
            </div>
            <div class="col-lg-4">
                <input class="form-control" placeholder="Purchase Price" name="alternatives[${alternativeIndex}][purchase_price]" type="number">
            </div>
            <div class="col-lg-4">
                 <input class="form-control" placeholder="Selling Price" name="alternatives[${alternativeIndex}][selling_price]" type="number">
            </div>
        `;
        container.appendChild(row);
        alternativeIndex++;
    });
</script>
@stop
