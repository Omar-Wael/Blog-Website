@extends('layouts.main')
@section('content')
    <div class="d-flex align-items-center pb-3 border-bottom">
        <a href="{{ route('show', $post->id) }}"
            class="d-flex align-items-center fw-bold text-decoration-none text-dark gap-3">@include('layouts.includes.back')<span>
                {{ __('Back') }}</span>
        </a>
    </div>
    <div class="card mx-5 mt-3">
        <div class="card-header">
            Edit <span style="font-style: italic;">"{{ $post->title }}"</span> Post
        </div>
        <div class="card-body">
            <form id="edit-form" action="">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Post Title</label>
                    <input name="title" type="text" class="form-control" id="title" value="{{ $post->title }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Post Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3" required>{{ $post->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="creator" class="form-label">Post Creator</label>
                    <input readonly name="creator" type="text" class="form-control" id="creator"
                        value="{{ $post->created_by }}" required>
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
            $('#edit-form').on('submit', function(e) {
                event.preventDefault();
                // User clicked Submit, send the AJAX request
                var formData = {
                    title: $("#title").val(),
                    description: $("#description").val(),
                    // Ensure CSRF token is included if Laravel is expecting it
                    _token: $('input[name="_token"]').attr('value')
                };
                let post_id = "{{ $post->id }}";
                $.ajax({
                    type: "PUT",
                    url: "{{ route('update', $post->id) }}",
                    data: formData,
                    success: function(data) {
                        // Reset the form (correct syntax)
                        $('#edit-form')[0].reset();
                        // Show success message
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Post updated successfully!',
                            showConfirmButton: true,
                        }).then(function() {
                            // This callback function is executed when the Swal timer runs out, or user clicks on the confirm button if present
                            window.location.href = "{{ route('show', $post->id) }}";
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
