@extends('layouts.main')
@section('content')
    <div class="card mx-5">
        <div class="card-header">
            Create New Post
        </div>
        <div class="card-body">
            {{-- <form action="{{ route('store') }}" method="POST"> --}}
            <form id="create-form" action="">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Post Title</label>
                    <input name="title" type="text" class="form-control" id="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Post Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="creator" class="form-label">Post Creator</label>
                    <input name="creator" type="text" class="form-control" id="creator" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#create-form').submit(function(event) {
                event.preventDefault();
                // User clicked Submit, send the AJAX request
                var formData = {
                    title: $("#title").val(),
                    description: $("#description").val(),
                    creator: $("#creator").val(),
                    // Ensure CSRF token is included if Laravel is expecting it
                    _token: $('input[name="_token"]').attr('value')
                };
                $.ajax({
                    type: "POST",
                    url: "{{ route('store') }}",
                    data: formData,
                    success: function(data) {
                        // Reset the form (correct syntax)
                        $('#create-form')[0].reset();
                        // Show success message
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Post created successfully!',
                            showConfirmButton: true,
                        }).then(function() {
                            // This callback function is executed when the Swal timer runs out, or user clicks on the confirm button if present
                            window.location.href = "{{ route('index') }}";
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("AJAX error: " + textStatus + " - " + errorThrown);
                    }
                });
            });
        })
    </script>
@endpush
