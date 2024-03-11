<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body>
    <header class="sticky-top bg-dark-blue">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand text-white">Posts Blog</a>
                <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="d-flex gap-3 navbar-nav me-auto mb-2 mb-lg-0">
                        <li
                            class="nav-item text-white position-relative @if (Route::currentRouteName() == 'index') active @endif">
                            <a class="nav-link text-white p-0" aria-current="page" href="{{ route('index') }}">Posts</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link text-white p-0" href="#">Link</a>
                        </li> --}}
                    </ul>
                    @guest
                        <ul class="d-felx gap-3 navbar-nav ms-auto mb-2 mb-lg-0">
                            <li
                                class="nav-item text-white position-relative @if (Route::currentRouteName() == 'register' && request('type') == 'login') active @endif">
                                <a class="nav-link text-white p-0"
                                    href="{{ route('register', 'login') }}">{{ __('Login') }}</a>
                            </li>
                            <li
                                class="nav-item text-white position-relative @if (Route::currentRouteName() == 'register' && request('type') == 'sign-up') active @endif">
                                <a class="nav-link text-white p-0" aria-current="page"
                                    href="{{ route('register', 'sign-up') }}">{{ __('Sign Up') }}</a>
                            </li>
                        </ul>
                    @endguest
                    @auth
                        {{-- <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-1 fs-6 w-275px"
                            data-kt-menu="true">
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <div class="symbol symbol-50px me-5">
                                        <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="user">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="fw-bold d-flex align-items-center fs-5 text-dark">
                                            {{ Auth::user()->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="separator my-2"></div>
                            <div class="menu-item px-5">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                <input type="submit" class="btn btn-primary" value="{{ __('Sign Out') }}">
                                </form>
                            </div>
                        </div> --}}

                        <div class="header-menu-div dropdown me-4">
                            <button class="header-menu-btn btn dropdown-toggle d-flex align-items-center gap-3"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="symbol">
                                    <img src="{{ asset('assets/pic/blank.png') }}" alt="user">
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center text-white ">
                                        {{ Auth::user()->name }}
                                    </div>
                                </div>
                                <svg class="ms-8" width="18" height="16.5" viewBox="0 0 19 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.4845 15.5762C11.3214 17.5762 8.41374 17.5762 7.25067 15.5762L1.14452 5.07617C-0.018554 3.07617 1.43529 0.576173 3.76144 0.576173L15.9737 0.576172C18.2999 0.576172 19.7537 3.07617 18.5907 5.07617L12.4845 15.5762Z"
                                        fill="white"></path>
                                </svg>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" class="cursor-pointer"
                                        href="{{ route('logout') }}">{{ __('Logout') }}</a></li>
                                {{-- <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                            </ul>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>
    </header>
    <div class="main container-fluid d-flex flex-column flex-column-fluid my-3 position-relative">
        @yield('content')
    </div>
    <footer class="fixed-bottom text-center text-secondary border-top bg-white">
        <p class="my-2">Made with ❤️ by <span class="text-dark fw-bold">Omar Wael</span></p>
    </footer>
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
