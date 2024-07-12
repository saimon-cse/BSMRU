@extends('admin.dashboard')

@section('admin')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">All Components</h5>

            {{-- Search Form --}}
            <form method="GET" action="{{ route('admin.component.all') }}">
                <div class="row mb-4">
                    <div class="col-md-7">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search by Component Code, Category, Name, Model" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </form>

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

            {{-- Components Table --}}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Model</th>
                        <th scope="col">Category</th>
                        <th scope="col">Available</th>
                        <th scope="col">Issued</th>
                        <th scope="col">Purchase</th>
                        {{-- <th scope="col">Unit Price</th>
                        <th scope="col">Total Price</th> --}}
                        <th scope="col">Remarks</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($components as $component)
                        <tr>
                            {{-- <td>
                                @if ($component->image)
                                    <img src="{{ asset('upload/component/' . $component->image) }}" alt="{{ $component->name }}" style="width: 50px; height: 50px;">
                                @else
                                    <img src="{{ asset('upload/no_image.png') }}" alt="No Image" style="width: 50px; height: 50px;">
                                @endif
                            </td> --}}
                            <td>{{ $component->component_code }}</td>
                            <td>{{ $component->name }}</td>
                            <td>{{ $component->model }}</td>
                            <td>{{ $component->category }}</td>
                            <td>{{ $component->available_quantity }}</td>
                            <td>{{ $component->issued_quantity }}</td>
                            <td>{{ $component->purchase_quantity }}</td>
                            {{-- <td>{{ $component->unit_price }}</td>
                            <td>{{ $component->total_price }}</td> --}}
                            <td>{{ $component->remarks }}</td>
                            <td>
                                <button class="btn btn-primary" onclick="editComponent({{ $component }})" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <form id="deleteForm{{ $component->id }}" method="POST" action="{{ route('admin.component.delete', $component->id) }}" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger delete-link" onclick="confirmDelete('{{ $component->id }}')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $components->links() }}

        </div>
    </div>
</main>

{{-- Update Component Modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Component</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="{{ route('admin.component.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editComponentId" name="id">

                    <div class="row mb-3">
                        <label for="editProfileImage" class="col-md-4 col-lg-3 col-form-label">Component Image</label>
                        <div class="col-md-8 col-lg-9">
                            <img id="editImagePreview" src="{{asset('upload/component/no-img.jpg')}}" alt="Profile" style="width: 150px; height: 150px;">
                            <div class="pt-2">
                                <div class="col-sm-4">
                                    <input class="form-control" type="file" id="editFormFile" accept=".jpg, .png,.jpeg" name="photo" onchange="previewEditImage();">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="editCode" class="col-sm-2 col-form-label">Code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="editCode" name="component_code" placeholder="Component Code" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="editName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="editName" name="name" placeholder="Component Name" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="editModel" class="col-sm-2 col-form-label">Model</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="editModel" name="model" placeholder="Component Model" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="editCategory" name="category" aria-label="Default select example">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->title }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="editAvailableQuantity" class="col-sm-2 col-form-label">Available Quantity</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="editAvailableQuantity" name="available_quantity" placeholder="Available Quantity" required readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="editIssuedQuantity" class="col-sm-2 col-form-label">Issued Quantity</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="editIssuedQuantity" name="issued_quantity" placeholder="Issued Quantity" required oninput="calculateAvailableQuantity()">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="editPurchaseQuantity" class="col-sm-2 col-form-label">Purchase Quantity</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="editPurchaseQuantity" name="purchase_quantity" placeholder="Quantity" required oninput="calculateAvailableQuantity()">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="editUnitPrice" class="col-sm-2 col-form-label">Unit Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="editUnitPrice" name="unit_price" placeholder="Unit Price" required oninput="calculateTotalPrice()">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="editTotalPrice" class="col-sm-2 col-form-label">Total Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="editTotalPrice" name="total_price" placeholder="Total Price" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="editRemarks" class="col-sm-2 col-form-label">Remarks</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="editRemarks" name="remarks" placeholder="Remarks"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    function editComponent(component) {
        document.getElementById('editComponentId').value = component.id;
        document.getElementById('editCode').value = component.component_code;
        document.getElementById('editName').value = component.name;
        document.getElementById('editModel').value = component.model;
        document.getElementById('editCategory').value = component.category;
        document.getElementById('editAvailableQuantity').value = component.available_quantity;
        document.getElementById('editIssuedQuantity').value = component.issued_quantity;
        document.getElementById('editPurchaseQuantity').value = component.purchase_quantity;
        document.getElementById('editUnitPrice').value = component.unit_price;
        document.getElementById('editTotalPrice').value = component.total_price;
        document.getElementById('editRemarks').value = component.remarks;
        document.getElementById('editImagePreview').src = "{{ asset('upload/component/') }}/" + component.image;

        calculateAvailableQuantity(); // Calculate available quantity on edit modal open
        calculateTotalPrice(); // Calculate total price on edit modal open
    }

    function previewEditImage() {
        var file = document.getElementById("editFormFile").files[0];
        var reader = new FileReader();
        reader.onloadend = function () {
            document.getElementById("editImagePreview").src = reader.result;
        };
        if (file) {
            reader.readAsDataURL(file);
        } else {
            document.getElementById("editImagePreview").src = "{{ asset('upload/component/no-img.jpg') }}";
        }
    }

    function calculateAvailableQuantity() {
        var issuedQuantity = parseInt(document.getElementById('editIssuedQuantity').value) || 0;
        var purchaseQuantity = parseInt(document.getElementById('editPurchaseQuantity').value) || 0;

        var availableQuantity = purchaseQuantity - issuedQuantity;
        if (availableQuantity < 0) {
            availableQuantity = 0; // Available quantity cannot be negative
        }

        document.getElementById('editAvailableQuantity').value = availableQuantity;
    }

    function calculateTotalPrice() {
        var purchaseQuantity = parseFloat(document.getElementById('editPurchaseQuantity').value) || 0;
        var unitPrice = parseFloat(document.getElementById('editUnitPrice').value) || 0;

        var totalPrice = purchaseQuantity * unitPrice;

        document.getElementById('editTotalPrice').value = totalPrice.toFixed(2);
    }

    // Function to confirm delete
    function confirmDelete(componentId) {
        if (confirm('Are you sure you want to delete this component?')) {
            document.getElementById('deleteForm' + componentId).submit();
        }
    }

    // Event listeners to trigger calculations on input change
    document.getElementById('editPurchaseQuantity').addEventListener('input', function () {
        calculateAvailableQuantity();
        calculateTotalPrice();
    });

    document.getElementById('editUnitPrice').addEventListener('input', function () {
        calculateTotalPrice();
    });
</script>
@endsection
