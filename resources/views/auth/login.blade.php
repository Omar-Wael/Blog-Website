@extends('layouts.main')

@section('content')
    <div class="container">
        <!--Right Side of the design-->
        <div class="form">
            <h3>{{ __('Login') }}</h3>
            {{-- <label for="username"></label>
            <input type="text" placeholder="Username" name="username" required class="req"> --}}

            <label for="email"></label>
            <input type="text" placeholder="email" name="email" required class="req">

            <label for="psw"></label>
            <input type="text" placeholder="Password" name="psw" required class="req">

            {{-- <label>
                <input type="checkbox" name="agree"> <span>I read and agree to Terms and Conditions.</span>
            </label> --}}

            <div class="create">
                <button type="submit" class="sign-up-btn">{{ __('Login') }}</button>
            </div>
        </div>
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
