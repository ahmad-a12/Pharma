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
                        <h4 class="mb-sm-0">Edit Medicine</h4>

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

            <!-- Edit Medicine Form -->
            <div class="row">
                <form action="{{ route('medicine.update', $medicine->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Main Medicine Fields -->
                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="arabic_name">Medicine Arabic Name</label>
                            <input id="arabic_name" class="form-control" placeholder="Medicine Arabic Name" name="arabic_name" type="text" value="{{ old('arabic_name', $medicine->arabic_name) }}">
                        </div>
                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="english_name">Medicine English Name</label>
                            <input id="english_name" class="form-control" placeholder="Medicine English Name" name="english_name" type="text" value="{{ old('english_name', $medicine->english_name) }}">
                        </div>
                        @error('english_name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="composition">Composition</label>
                            <input id="composition" class="form-control" placeholder="Composition" name="composition" type="text" value="{{ old('composition', $medicine->composition) }}">
                        </div>

                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="indication">Indication</label>
                            <input id="indication" class="form-control" placeholder="Indication" name="indication" type="text" value="{{ old('indication', $medicine->indication) }}">
                        </div>

                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="type">Type</label>
                            <input id="type" class="form-control" placeholder="Type" name="type" type="text" value="{{ old('type', $medicine->type) }}">
                        </div>

                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="number">Number</label>
                            <input id="number" class="form-control" placeholder="Number" name="number" type="text" value="{{ old('number', $medicine->number) }}">
                        </div>

                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="titer">Titer</label>
                            <input id="titer" class="form-control" placeholder="Titer" name="titer" type="text" value="{{ old('titer', $medicine->titer) }}">
                        </div>

                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="company_name">Company Name</label>
                            <input id="company_name" class="form-control" placeholder="Company Name" name="company_name" type="text" value="{{ old('company_name', $medicine->company_name) }}">
                        </div>

                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="purchase_price">Purchase Price</label>
                            <input id="purchase_price" class="form-control" placeholder="Purchase Price" name="purchase_price" type="number" value="{{ old('purchase_price', $medicine->purchase_price) }}">
                        </div>

                        <div class="mb-4 col-lg-6">
                            <label class="form-label" for="selling_price">Selling Price</label>
                            <input id="selling_price" class="form-control" placeholder="Selling Price" name="selling_price" type="number" value="{{ old('selling_price', $medicine->selling_price) }}">
                        </div>

                        <!-- Alternatives Section -->
                        <div class="mb-4 col-12">
                            <label class="form-label">Alternatives</label>
                            <div id="alternatives">
                                @foreach($medicine->alternatives as $index => $alternative)
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <input class="form-control" placeholder="Alternative Arabic Name" name="alternatives[{{ $index }}][arabic_name]" type="text" value="{{ old('alternatives.'.$index.'.arabic_name', $alternative->arabic_name) }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <input class="form-control" placeholder="Alternative English Name" name="alternatives[{{ $index }}][english_name]" type="text" value="{{ old('alternatives.'.$index.'.english_name', $alternative->english_name) }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <input class="form-control" placeholder="Composition" name="alternatives[{{ $index }}][composition]" type="text" value="{{ old('alternatives.'.$index.'.composition', $alternative->composition) }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <input class="form-control" placeholder="Indication" name="alternatives[{{ $index }}][indication]" type="text" value="{{ old('alternatives.'.$index.'.indication', $alternative->indication) }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <input class="form-control" placeholder="Type" name="alternatives[{{ $index }}][type]" type="text" value="{{ old('alternatives.'.$index.'.type', $alternative->type) }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <input class="form-control" placeholder="Number" name="alternatives[{{ $index }}][number]" type="text" value="{{ old('alternatives.'.$index.'.number', $alternative->number) }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <input class="form-control" placeholder="Titer" name="alternatives[{{ $index }}][titer]" type="text" value="{{ old('alternatives.'.$index.'.titer', $alternative->titer) }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <input class="form-control" placeholder="Company Name" name="alternatives[{{ $index }}][company_name]" type="text" value="{{ old('alternatives.'.$index.'.company_name', $alternative->company_name) }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <input class="form-control" placeholder="Purchase Price" name="alternatives[{{ $index }}][purchase_price]" type="number" value="{{ old('alternatives.'.$index.'.purchase_price', $alternative->purchase_price) }}">
                                    </div>
                                    <div class="col-lg-4">
                                         <input class="form-control" placeholder="Selling Price" name="alternatives[{{ $index }}][selling_price]" type="number" value="{{ old('alternatives.'.$index.'.selling_price', $alternative->selling_price) }}">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button type="button" id="add-alternative" class="btn btn-primary btn-sm"><i class="mdi mdi-plus me-2"></i> Add Alternative</button>
                        </div>

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

<script>
    // JavaScript to dynamically add alternatives
    let alternativeIndex = {{ count($medicine->alternatives) }};
    document.getElementById('add-alternative').addEventListener('click', function () {
        const container = document.getElementById('alternatives');
        const row = document.createElement('div');
        row.className = 'row mb-3';
        row.innerHTML = `
            <div class="col-lg-4">
                <input class="form-control" placeholder="Alternative Arabic Name" name="alternatives[${alternativeIndex}][arabic_name]" type="text" value="{{ old('alternatives.'+alternativeIndex+'.arabic_name') }}">
            </div>
            <div class="col-lg-4">
                <input class="form-control" placeholder="Alternative English Name" name="alternatives[${alternativeIndex}][english_name]" type="text" value="{{ old('alternatives.'+alternativeIndex+'.english_name') }}">
            </div>
            <div class="col-lg-4">
                <input class="form-control" placeholder="Composition" name="alternatives[${alternativeIndex}][composition]" type="text" value="{{ old('alternatives.'+alternativeIndex+'.composition') }}">
            </div>
            <div class="col-lg-4">
                <input class="form-control" placeholder="Indication" name="alternatives[${alternativeIndex}][indication]" type="text" value="{{ old('alternatives.'+alternativeIndex+'.indication') }}">
            </div>
            <div class="col-lg-4">
                <input class="form-control" placeholder="Type" name="alternatives[${alternativeIndex}][type]" type="text" value="{{ old('alternatives.'+alternativeIndex+'.type') }}">
            </div>
                        <div class="col-lg-4">
                <input class="form-control" placeholder="Number" name="alternatives[${alternativeIndex}][number]" type="text" value="{{ old('alternatives.'+alternativeIndex+'.number') }}">
            </div>
            <div class="col-lg-4">
                <input class="form-control" placeholder="Titer" name="alternatives[${alternativeIndex}][titer]" type="text" value="{{ old('alternatives.'+alternativeIndex+'.titer') }}">
            </div>
            <div class="col-lg-4">
                <input class="form-control" placeholder="Company Name" name="alternatives[${alternativeIndex}][company_name]" type="text" value="{{ old('alternatives.'+alternativeIndex+'.company_name') }}">
            </div>
            <div class="col-lg-4">
                <input class="form-control" placeholder="Purchase Price" name="alternatives[${alternativeIndex}][purchase_price]" type="number" value="{{ old('alternatives.'+alternativeIndex+'.purchase_price') }}">
            </div>
            <div class="col-lg-4">
                <input class="form-control" placeholder="Selling Price" name="alternatives[${alternativeIndex}][selling_price]" type="number" value="{{ old('alternatives.'+alternativeIndex+'.selling_price') }}">
            </div>
        `;
        container.appendChild(row);
        alternativeIndex++;
    });
</script>
@stop

