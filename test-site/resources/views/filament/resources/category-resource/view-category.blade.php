{{-- resources/views/filament/resources/category-resource/view-category.blade.php --}}
<div>
    <h2>Category Details</h2>
    <p><strong>ID:</strong> {{ $record->id }}</p>
    <p><strong>Category Name:</strong> {{ $record->category_name }}</p>
    <p><strong>Category Code:</strong> {{ $record->category_code }}</p>
    <p><strong>Parent ID:</strong> {{ $record->parent_id }}</p>
</div>
