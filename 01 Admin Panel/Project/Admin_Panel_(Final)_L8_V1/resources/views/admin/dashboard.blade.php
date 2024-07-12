<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>BSMRU </title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    @include('admin.partials.header')

</head>

<body>

    @if (Route::has('login'))
        <!-- ======= Header ======= -->
        @auth

            @include('admin.body.navbar')
        @endauth
        <!-- End Header -->
    @endif

    <!-- ======= Sidebar ======= -->
    @include('admin.body.sidebar')
    <!-- End Sidebar-->

    @yield('admin')
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('admin.body.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('admin.partials.footerFile')


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all forms on the page
            var forms = document.querySelectorAll('form');

            forms.forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    var valid = true;
                    var requiredFields = form.querySelectorAll('[required]');
                    var fileInputs = form.querySelectorAll('input[type="file"]');

                    // Check required fields
                    requiredFields.forEach(function(field) {
                        if (!field.value) {
                            valid = false;
                            alert('Please fill out all required fields.');
                        }
                    });

                    // Check file inputs for valid extensions
                    fileInputs.forEach(function(fileInput) {
                        var accept = fileInput.getAttribute('accept');
                        if (accept && fileInput.value) {
                            var allowedExtensions = accept.split(',').map(function(ext) {
                                return ext.trim().toLowerCase().replace('.', '');
                            });
                            var filePath = fileInput.value;
                            var fileExtension = filePath.split('.').pop().toLowerCase();

                            if (!allowedExtensions.includes(fileExtension)) {
                                valid = false;
                                alert('Only the following file types are allowed: ' +
                                    allowedExtensions.join(', '));
                            } else if (fileExtension === 'jpeg') {
                                // Handle renaming for .jpeg files to .jpg
                                var file = fileInput.files[0];
                                var newFileName = file.name.replace(/\.jpeg$/i, '.jpg');
                                var renamedFile = new File([file], newFileName, {
                                    type: file.type
                                });
                                var dataTransfer = new DataTransfer();
                                dataTransfer.items.add(renamedFile);
                                fileInput.files = dataTransfer.files;
                            } else {
                                // Rename the file extension to lowercase for other files
                                var file = fileInput.files[0];
                                var renamedFile = new File([file], file.name.replace(
                                    /\.[^/.]+$/,
                                    function(ext) {
                                        return ext.toLowerCase();
                                    }), {
                                    type: file.type
                                });
                                var dataTransfer = new DataTransfer();
                                dataTransfer.items.add(renamedFile);
                                fileInput.files = dataTransfer.files;
                            }
                        }
                    });

                    if (!valid) {
                        event.preventDefault();
                    }
                });
            });
        });
    </script>


    <script>
        // first editor
        ClassicEditor
            .create(document.querySelector('.editor'), {
                ckfinder: {
                    uploadUrl: "ckfileupload.php",
                }
            })
            .then(editor => {

                console.log(editor);

            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <!-- ckeditor5 JS -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all delete links
            var deleteLinks = document.querySelectorAll('.delete-link');

            deleteLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the default action
                    var confirmation = confirm('Are you sure you want to delete this item?');

                    if (confirmation) {
                        // If the user confirms, proceed with the deletion
                        window.location.href = link.href;
                    }
                });
            });
        });
    </script>




</body>

</html>


{{-- ====================     validation        ================================= --}}
{{-- @section('script')
    <script>
        document.getElementById('eventForm').addEventListener('submit', function(event) {
            var date = document.getElementById('date').value;
            var title = document.getElementById('title').value;
            var description = document.getElementById('description').value;
            var fileInput = document.getElementById('file');
            var filePath = fileInput.value;

            if (!date || !title || !description) {
                event.preventDefault();
                alert('Please fill out all required fields.');
                return;
            }

            if (filePath) {
                var fileExtension = filePath.split('.').pop().toLowerCase();
                var allowedExtensions = ['png', 'jpg', 'jpeg'];
                if (!allowedExtensions.includes(fileExtension)) {
                    event.preventDefault();
                    alert('Only PNG and JPG files are allowed.');
                    return;
                }

                // Convert the file extension to lowercase (This does not change the actual file, just the displayed name)
                fileInput.value = filePath.replace(/\.[^/.]+$/, function(ext) {
                    return ext.toLowerCase();
                });
            }
        });
    </script>
@endsection --}}



{{-- =================                Editor          ========= --}}
{{--
@section('script')
    <script>
        // first editor
        ClassicEditor
            .create(document.querySelector('.editor'), {
                ckfinder: {
                    uploadUrl: "ckfileupload.php",
                }
            })
            .then(editor => {

                console.log(editor);

            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <!-- ckeditor5 JS -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
@endsection --}}
