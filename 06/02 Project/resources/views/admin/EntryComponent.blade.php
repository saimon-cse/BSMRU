@extends('admin.dashboard')
@section('admin')
    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Component</h5>
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

                <form method="POST" action="{{ route('admin.component.entry.save') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Component Image</label>
                        <div class="col-md-8 col-lg-9">
                            <img id="imagePreview" src="{{asset('upload/component/no-img.jpg')}}" alt="Profile" style="width: 150px; height: 150px;">
                            <div class="pt-2">
                                <div class="col-sm-4">
                                    <input class="form-control" type="file" id="formFile" value="no-img.jpg" accept=".jpg, .png,.jpeg" name="photo" onchange="previewImage();">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="component_code" placeholder="Component Code" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label"> Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="name" placeholder="Component Name" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Model</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="model" placeholder="Component Model" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select required class="form-select" name="category" aria-label="Default select example">
                                <option value="None" selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->title }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required oninput="calculateTotalPrice()">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Unit Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="unit_price" name="unit_price" placeholder="Unit Price" required oninput="calculateTotalPrice()">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Total Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="total_price" name="total_price" placeholder="Total Price" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Remarks</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="remarks" placeholder="Remarks" required>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- End Horizontal Form -->
            </div>
        </div>
    </main>

@endsection

@section('script')
    {{-- ==== Preview image to upload --}}
    <script>
        function previewImage() {
            var file = document.getElementById("formFile").files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                document.getElementById("imagePreview").src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                document.getElementById("imagePreview").src = "{{ url('upload/no_image.png') }}";
            }
        }

        function calculateTotalPrice() {
            var quantity = document.getElementById("quantity").value;
            var unit_price = document.getElementById("unit_price").value;
            var total_price = quantity * unit_price;
            document.getElementById("total_price").value = total_price;
        }
    </script>
@endsection
