<!-- editComponentModal.blade.php -->
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Component</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- Form fields for editing component data -->
            <form method="POST" action="{{ route('admin.component.update', $component->id) }}">
                @csrf
                @method('PUT')
                <!-- Example form fields -->
                <input type="text" name="name" value="{{ $component->name }}" class="form-control">
                <!-- Add other fields as needed -->
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
