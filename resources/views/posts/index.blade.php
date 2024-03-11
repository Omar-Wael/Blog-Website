@extends('layouts.main')
@section('content')
    {{-- @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif --}}
    <div class="m-2 text-center">
        <a href="{{ route('create') }}" class="btn btn-success">Create Post</a>
    </div>

    @if ($posts->isNotEmpty())
        <div class="table table-responisve my-5 mx-auto">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('Title') }}</th>
                        <th scope="col">{{ __('Posted by') }}</th>
                        <th scope="col">{{ __('Created / Updated at') }}</th>
                        <th scope="col">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $index => $post)
                        <tr>
                            <th scope="row" class="align-middle">{{ $index + 1 }}</th>
                            <td class="align-middle">{{ $post->title }}</td>
                            <td class="align-middle">{{ $post->created_by }}</td>
                            <td class="align-middle">
                                <span>
                                    {{ $post->created_at ? $post->created_at->diffForHumans() : $post->updated_at->diffForHumans() }}</span>,
                                <br>
                                <span
                                    class="text-secondary font-size-small">{{ $post->created_at ? $post->created_at : $post->updated_at }}</span>
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('show', $post->id) }}" type="button"
                                    class="btn btn-info text-white">View</a>
                                <a href="{{ route('edit', $post->id) }}" type="button" class="btn btn-primary">Edit</a>
                                <form class="delete-form d-inline" action="">
                                    @csrf
                                    @method('DELETE')
                                    <button data-id="{{ $post->id }}" type="submit"
                                        class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="d-flex flex-fill align-items-center justify-content-center">
            <h5>No Posts!</h5>
        </div>
    @endif
    @include('layouts.includes.scroll-to-top')
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.delete-form').on('submit', function(e) {
                event.preventDefault();
                // User clicked Submit, send the AJAX request
                var formData = {
                    // Ensure CSRF token is included if Laravel is expecting it
                    _token: $('input[name="_token"]').attr('value')
                };
                const id = this.dataset.id;
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
                                    window.location.reload();
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
