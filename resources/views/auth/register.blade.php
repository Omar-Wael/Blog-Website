@extends('layouts.main')

@section('content')
    <div class="container">
        <!--Right Side of the design-->
        @if ($type == 'login')
            <div class="form">
                <h3>{{ __('Login') }}</h3>
                {{-- <label for="username"></label>
            <input type="text" placeholder="Username" name="username" required class="req"> --}}
                <form class="register-form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <label for="email"></label>
                    <input type="text" placeholder="email" name="email" required class="req">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label for="password"></label>
                    <input type="password" placeholder="Password" name="password" required class="req">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="create">
                        <button type="submit" class="sign-up-btn">{{ __('Login') }}</button>
                    </div>
                </form>
            </div>
        @elseif ($type == 'sign-up')
            <div class="form">
                <h3>Create new account</h3>
                <form class="register-form" action="{{ route('signup') }}" method="POST">
                    @csrf
                    <label for="name"></label>
                    <input type="text" placeholder="Username" name="name" required class="req">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label for="email"></label>
                    <input type="text" placeholder="email" name="email" required class="req">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label for="password"></label>
                    <input type="password" placeholder="Password" name="password" required class="req">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label for="password_confirmation"></label>
                    <input type="password" placeholder="Retype Password" name="password_confirmation" required
                        class="req">
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="create">
                        <button type="submit" class="sign-up-btn">{{ __('Sign Up') }}</button>
                    </div>
                </form>
            </div>
        @endif
        <!--Left side of the Design-->
        <div class="welcome">
            <h1>{{ __('Posts Blog!') }}</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                anim id est laborum.
            </p>
            <div class="learn">
                <button type="button" id="Learn">{{ __('Learn More') }}</button>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
