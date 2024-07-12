@extends('admin.dashboard')

@section('admin')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Issue Component</h5>

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

            <form method="POST" action="{{ route('issue.component.store') }}" id="issueComponentForm">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="student_id" class="col-sm-2 col-form-label">ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Enter Student ID" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="department" class="col-sm-2 col-form-label">Department</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="department" name="dept" placeholder="Enter Department" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="component_id" class="col-sm-2 col-form-label">Component</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="component_id" name="component_id" aria-label="Select Component" required>
                            <option selected disabled>Select Component</option>
                            @foreach ($components as $component)
                                <option value="{{ $component->id }}"
                                        data-available-quantity="{{ $component->available_quantity }}"
                                        data-model="{{ $component->model }}"
                                        data-comcode="{{ $component->component_code }}">
                                    {{ $component->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="component_code" class="col-sm-2 col-form-label">Component Code</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="component_code" name="component_code" placeholder="Component Code" required readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="available_quantity" class="col-sm-2 col-form-label">Available Quantity</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="available_quantity" name="available_quantity" placeholder="Available Quantity" required readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="model" class="col-sm-2 col-form-label">Model</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="model" name="model" placeholder="Component Model" required readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity" required min="1">
                        <div id="quantity-warning" class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="issue_date" class="col-sm-2 col-form-label">Issue Date</label>
                    <div class="col-sm-2">
                        <input type="date" class="form-control" id="issue_date" name="issue_date" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="return_date" class="col-sm-2 col-form-label">Return Date</label>
                    <div class="col-sm-2">
                        <input type="date" class="form-control" id="return_date" name="return_date" required>
                        <div id="return-date-warning" class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Issue Component</button>
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
        var initialAvailableQuantity = 0;

        $('#component_id').change(function() {
            var selectedOption = $(this).find('option:selected');
            var availableQuantity = selectedOption.data('available-quantity');
            var model = selectedOption.data('model');
            var comCode = selectedOption.data('comcode');

            initialAvailableQuantity = availableQuantity;
            $('#available_quantity').val(availableQuantity);
            $('#model').val(model);
            $('#component_code').val(comCode);
        });

        $('#quantity').on('input', function() {
            var quantity = $(this).val();

            if (parseInt(quantity) <= 0) {
                $('#quantity').addClass('is-invalid');
                $('#quantity-warning').html('Quantity must be greater than 0');
                $('#issueComponentForm').attr('data-valid', 'false');
            } else if (parseInt(quantity) > initialAvailableQuantity) {
                $('#quantity').addClass('is-invalid');
                $('#quantity-warning').html('Entered quantity exceeds available quantity');
                $('#issueComponentForm').attr('data-valid', 'false');
            } else {
                $('#quantity').removeClass('is-invalid');
                $('#quantity-warning').html('');
                $('#issueComponentForm').attr('data-valid', 'true');
            }
        });

        $('#return_date').on('change', function() {
            var issueDate = new Date($('#issue_date').val());
            var returnDate = new Date($(this).val());

            if (returnDate <= issueDate) {
                $('#return_date').addClass('is-invalid');
                $('#return-date-warning').html('Return date must be after the issue date');
                $('#issueComponentForm').attr('data-valid', 'false');
            } else {
                $('#return_date').removeClass('is-invalid');
                $('#return-date-warning').html('');
                $('#issueComponentForm').attr('data-valid', 'true');
            }
        });

        $('#issueComponentForm').submit(function(event) {
            var isValid = $(this).attr('data-valid');

            if (isValid === 'false') {
                event.preventDefault();
                alert('Please correct the errors in the form.');
            }
        });
    });
</script>
@endsection
