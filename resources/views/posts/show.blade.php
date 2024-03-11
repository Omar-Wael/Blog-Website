@extends('layouts.main')
@section('content')
    <div class="d-flex align-items-center justify-content-between gap-3 pb-3 border-bottom">
        <a href="{{ route('index') }}"
            class="d-flex align-items-center fw-bold text-decoration-none text-dark gap-3">@include('layouts.includes.back')<span>
                {{ __('Back') }}</span>
        </a>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('edit', $post->id) }}" type="button" class="btn btn-primary px-5">Edit</a>
            <form id="delete-form" class="d-inline" action="">
                @csrf
                @method('DELETE')
                <button data-id="{{ $post->id }}" type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    <div class="conatiner-fluid d-flex flex-column justify-content-between gap-3 mx-auto my-3">
        <div class="card">
            <div class="card-header">
                {{ __('Post Info') }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Title: {{ $post->title }}</h5>
                <p class="card-text"><span class="fw-bold">Description:</span> {{ $post->description }}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                {{ __('Post Creator Info') }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Name: {{ $post->created_by }}</h5>
                <p class="card-text"><span class="fw-bold">Created At:</span>
                    {{ $post->created_at->format('l jS \of F Y h:i:s A') }}
                </p>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#delete-form').on('submit', function(e) {
                event.preventDefault();
                // User clicked Submit, send the AJAX request
                var formData = {
                    // Ensure CSRF token is included if Laravel is expecting it
                    _token: $('input[name="_token"]').attr('value')
                };
                const id = $('button[data-id]').attr('data-id');
                let url = "{{ route('destroy', ':id') }}";
                url = url.replace(':id', id);
                console.log(url);
                console.log(formData);
                Swal.fire({
                    title: `{{ __(' Are you sure ? ') }}`,
                    text: `{{ __('You are about to delete this Post.') }}`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#05439',
                    cancelButtonColor: '#d33',
                    confirmButtonText: `{{ __('Yes, delete it!') }}`
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('destroy', $post->id) }}",
                            data: formData,
                            success: function(data) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Post deleted successfully',
                                    showConfirmButton: true,
                                }).then(() => {
                                    // Redirect after successful delete
                                    window.location.href =
                                        "{{ route('index') }}";
                                });
                            },
                            error: function(jqXHR, textStatus,
                                errorThrown) {
                                console.log("AJAX error: " +
                                    textStatus + " - " +
                                    errorThrown);
                            }
                        });
                    } else {
                        // User clicked Cancel, do nothing
                    }
                });
            });
        })
    </script>
@endpush
