@extends('admin.dashboard')

@section('admin')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Return Component</h5>

            @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"aria-label="Close"></button>
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"aria-label="Close"></button>
                    </div>
                @elseif (session('info'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <i class="bi bi-info-circle me-1"></i>
                        {{ session('info') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

            <form method="POST" action="{{ route('return.component.store') }}" id="returnComponentForm">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="student_id" class="col-sm-2 col-form-label">Student ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Enter Student ID" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="component_id" class="col-sm-2 col-form-label">Component ID</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="component_id" name="component_id" aria-label="Select Component" required>
                            <option selected disabled>Select Component</option>
                            @foreach ($components as $component)
                                <option value="{{ $component->component_code }}" data-issued-quantity="{{ $component->issued_quantity }}">{{ $component->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="component_code" class="col-sm-2 col-form-label">Component Code</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="component_code" name="component_code" placeholder="Enter Component Code" required readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="issued_quantity" class="col-sm-2 col-form-label">Issued Quantity</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="issued_quantity" name="issued_quantity" placeholder="Issued Quantity" required readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity" required>
                        <div id="quantity-warning" class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="return_date" class="col-sm-2 col-form-label">Return Date</label>
                    <div class="col-sm-2">
                        <input type="date" class="form-control" id="return_date" name="return_date" required>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Return Component</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#component_id').change(function() {
            var selectedComponentCode = $(this).val();
            var issuedQuantity = $(this).find('option:selected').data('issued-quantity');

            // Set the value of component_code input field
            $('#component_code').val(selectedComponentCode);

            // Set the value of issued_quantity input field
            $('#issued_quantity').val(issuedQuantity);
        });

        $('#quantity').on('input', function() {
            var quantity = $(this).val();
            var issuedQuantity = $('#issued_quantity').val();

            if (parseInt(quantity) <= 0) {
                $(this).addClass('is-invalid');
                $('#quantity-warning').html('Quantity must be greater than 0');
            } else if (parseInt(quantity) > parseInt(issuedQuantity)) {
                $(this).addClass('is-invalid');
                $('#quantity-warning').html('Entered quantity exceeds issued quantity');
            } else {
                $(this).removeClass('is-invalid');
                $('#quantity-warning').html('');
            }
        });

        $('#returnComponentForm').submit(function(event) {
            var quantity = $('#quantity').val();
            var issuedQuantity = $('#issued_quantity').val();

            if (parseInt(quantity) <= 0 || parseInt(quantity) > parseInt(issuedQuantity)) {
                event.preventDefault();
                alert('Please correct the errors in the form.');
            }
        });
    });
</script>
@endsection
