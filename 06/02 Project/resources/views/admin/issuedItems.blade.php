<!-- resources/views/issued-items/index.blade.php -->

@extends('admin.dashboard')

@section('admin')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Issued Items</h5>

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

            <!-- Search Form -->
            <form method="GET" action="{{ route('issued.items.all') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search by Name, Roll, Return date, or Department" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>ID</th>
                            <th>Department</th>
                            <th>Component</th>
                            <th>Available</th>
                            <th>Issued</th>
                            <th>Issue Date</th>
                            <th>Return Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sl = 1; @endphp
                        @forelse ($issuedItems as $item)
                        <tr>
                            <td>{{ $sl++}}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->student_id }}</td>
                            <td>{{ $item->dept }}</td>
                            <td>{{ $item->component_name }}</td>
                            <td>{{ $item->available }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->issue_date }}</td>
                            <td>{{ $item->return_date }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#returnModal{{ $item->id }}"><i class="bi bi-arrow-return-left"></i></button>
                                <form action="{{ route('delete.issued.item', ['id' => $item->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>

                        <!-- Return Modal -->
                        <div class="modal fade" id="returnModal{{ $item->id }}" tabindex="-1" aria-labelledby="returnModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="returnModalLabel{{ $item->id }}">Return Component</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('return.component.update', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="component_name">Component Name</label>
                                                <input type="text" class="form-control" id="component_name" value="{{ $item->component_name }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="component_model">Component Model</label>
                                                <input type="text" class="form-control" id="component_model" value="{{ $item->model }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="component_code">Component Code</label>
                                                <input type="text" class="form-control" id="component_code" value="{{ $item->component_code }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="available_quantity">Available Quantity</label>
                                                <input type="text" class="form-control" id="available_quantity" value="{{ $item->available }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="return_quantity">Return Quantity</label>
                                                <input type="number" class="form-control" id="return_quantity" name="return_quantity" value="{{ $item->quantity }}" required>
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
                        <!-- End Return Modal -->

                        @empty
                        <tr>
                            <td colspan="9" class="text-center">No issued items found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $issuedItems->links() }}


            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Modal show event handler
        $('body').on('show.bs.modal', '.modal', function() {
            var modalId = $(this).attr('id');
            var itemId = modalId.replace('returnModal', '');
            var issuedItem = $('#returnModal' + itemId);

            // Retrieve component details and populate modal fields
            var component_name = issuedItem.find('#component_name').val();
            var component_model = issuedItem.find('#component_model').val();
            var component_code = issuedItem.find('#component_code').val();
            var available_quantity = issuedItem.find('#available_quantity').val();
            var return_quantity = issuedItem.find('#return_quantity').val();

            // Set values in the modal
            issuedItem.find('.modal-body #component_name').val(component_name);
            issuedItem.find('.modal-body #component_model').val(component_model);
            issuedItem.find('.modal-body #component_code').val(component_code);
            issuedItem.find('.modal-body #available_quantity').val(available_quantity);
            issuedItem.find('.modal-body #return_quantity').val(return_quantity);
        });

        // Modal hide event handler
        $('body').on('hide.bs.modal', '.modal', function() {
            var modalId = $(this).attr('id');
            var itemId = modalId.replace('returnModal', '');
            var issuedItem = $('#returnModal' + itemId);

            // Clear modal fields after modal is closed
            issuedItem.find('.modal-body #component_name').val('');
            issuedItem.find('.modal-body #component_model').val('');
            issuedItem.find('.modal-body #component_code').val('');
            issuedItem.find('.modal-body #available_quantity').val('');
            issuedItem.find('.modal-body #return_quantity').val('');
        });
    });
</script>
@endsection
