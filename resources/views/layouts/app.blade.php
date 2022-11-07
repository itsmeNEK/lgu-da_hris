<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HRIS | @yield('title')</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('images/DA-logo.png') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/table.css') }}" rel="stylesheet">
    @yield('customCSS')
</head>

<body class="d-flex flex-column h-100 bg-white">
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-light navbar-light fw-bold shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/DA-logo.png') }}" width="40" height="35"
                        class="d-inline-block align-text-middle">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto d-flex">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Publication</a>
                        </li>
                        <hr class=" d-block d-md-none">
                        <li class="nav-item d-block d-md-none">
                            <a href="{{ route('users.pds.index') }}" class="nav-link">Personal Data Sheet</a>
                        </li>
                        <li class="nav-item d-block d-md-none">
                            @can('isUser')
                                <a href="/" class="nav-link">My Applications</a>
                            @else
                                <a href="" class="nav-link">My Records</a>
                            @endcan
                        </li>
                        @if (Auth::user())
                            <li class="nav-item d-block d-md-none">
                                <a href="{{ route('users.account.edit', Auth::user()->id) }}" class="nav-link">Account
                                    Settings</a>
                            </li>
                        @endif
                        <hr class=" d-block d-md-none">
                    </ul>
                    <ul class="navbar-nav me-auto d-flex d-lg-none">
                        @if (Auth::user())
                            {{-- @canany(['isAdmin', 'isMayor', 'isHead'])
                                <li class="nav-item">
                                    <a href="" class="nav-link">Employee IPCR</a>
                                </li>
                            @endcanany --}}
                            @canany(['isAdmin', 'isHR'])
                                <li class="nav-item">
                                    <a href="#" class="nav-link">RSP</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('hr.pms.index') }}" class="nav-link">PMS</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('hr.lnd.create') }}" class="nav-link">L&D</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">R&R</a>
                                </li>
                                <hr class=" d-block d-md-none">
                                <li class="nav-item">
                                    <a href="" class="nav-link">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('hr.leave.index') }}" class="nav-link">Employee Leave
                                        Credit</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Service Record</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('hr.plantilla.index') }}" class="nav-link">Plantilla Management</a>
                                </li>
                                @can('isAdmin')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.user.index') }}" class="nav-link">User Management</a>
                                    </li>
                                @endcan
                                <hr class=" d-block d-md-none">
                            @endcanany
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown d-none d-md-block">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Hello! <span class="text-dark fs-5 fw-bold">{{ Auth::user()->first_name }}</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end border-success"
                                    aria-labelledby="navbarDropdown">
                                    <a href="{{ route('users.pds.index') }}" class="dropdown-item">Personal Data
                                        Sheet</a>
                                    <a href="{{ route('users.account.edit', Auth::user()->id) }}"
                                        class="dropdown-item">Account Settings</a>

                                    @can('isUser')
                                        <a href="" class="dropdown-item">My Applications</a>
                                    @else
                                        <a href="" class="dropdown-item">My Records</a>
                                    @endcan
                                    <p class="dropdown-divider"></p>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item d-block d-md-none">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="d-flex position-absolute" style="z-index:9999;right: 2%; margin-top: 1rem">
            @if (Session::has('alert'))
                <div class="alert alert-{{ explode('|', Session::get('alert'))[0] ?? 'info' }} alert-dismissible show"
                    role="alert">
                    <i class="fa fa-exclamation-triangle text-dark me-1" aria-hidden="true"></i>
                    <strong>{{ explode('|', Session::get('alert'))[1] }} !</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <main class="py-4">
            @guest
                @yield('content')
            @else
                @if (Route::current()->getName() === 'publication')
                    @yield('content')
                @else
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 d-none d-lg-block">
                                <div class="card">
                                    <div class="">
                                        <div class="card-header avatar-bg">
                                            <img src="{{ asset('storage/user_avatar/' . Auth::user()->avatar) }}"
                                                alt="" class="avatar-img mx-auto d-block">
                                        </div>
                                        <div class="list-group border-0 text-start">
                                            @cannot('isAdmin')
                                                <a href="{{ route('users.pds.index') }}"
                                                    class="list-group-item list-group-item-action border-0">
                                                    <i class="fa-solid fa-address-card me-1"></i>Personal DataSheet
                                                </a>
                                                @can('isUser')
                                                    <a href="#" class="list-group-item list-group-item-action border-0">
                                                        <i class="fa-solid fa-briefcase me-1"></i>My Application
                                                    </a>
                                                @else
                                                    <a href="#" class="list-group-item list-group-item-action border-0">
                                                        <i class="fa-solid fa-briefcase me-1"></i>My Records
                                                    </a>
                                                @endcan
                                            @endcannot
                                            <a href="{{ route('users.account.edit', Auth::user()->id) }}"
                                                class="list-group-item list-group-item-action border-0">
                                                <i class="fa-solid fa-user-gear me-1"></i>Account Settings
                                            </a>
                                        </div>
                                        <hr class="text-dark">
                                        @canany(['isAdmin', 'isHR'])
                                            <hr class="text-dark">
                                            <div class="list-group border-0 text-start">
                                                <a href="#" class="list-group-item list-group-item-action border-0"><i
                                                        class="fa-solid fa-users me-2"></i>RSP</a>
                                                <a href="{{ route('hr.pms.index') }}"
                                                    class="list-group-item list-group-item-action border-0"><i
                                                        class="fa-solid fa-ranking-star me-2"></i>PMS</a>
                                                <a href="{{ route('hr.lnd.create') }}"
                                                    class="list-group-item list-group-item-action border-0"><i
                                                        class="fa-solid fa-chalkboard-user me-2"></i>L&D</a>
                                                <a href="#" class="list-group-item list-group-item-action border-0"><i
                                                        class="fa-solid fa-medal me-2"></i>R&R</a>
                                            </div>
                                            <hr class="text-dark">
                                            <div class="list-group border-0 text-start">
                                                <a href="" class="list-group-item list-group-item-action border-0">
                                                    <i class="fa-solid fa-gauge me-1"></i>Dashboard
                                                </a>
                                                <a href="{{ route('hr.leave.index') }}"
                                                    class="list-group-item list-group-item-action border-0">
                                                    <i class="fa-solid fa-money-check-dollar me-1"></i>Employee Leave
                                                    Credit
                                                </a>
                                                <a href="#" class="list-group-item list-group-item-action border-0">
                                                    <i class="fa-regular fa-id-card me-1"></i>Service Record
                                                </a>
                                                <a href="{{ route('hr.plantilla.index') }}"
                                                    class="list-group-item list-group-item-action border-0">
                                                    <i class="fa-solid fa-users me-1"></i>Plantilla Management
                                                </a>
                                                <a href="" class="list-group-item list-group-item-action border-0">
                                                    <i class="fa-solid fa-user-plus me-1"></i>Manage Applicants
                                                </a>
                                                <a href="{{ route('hr.publication.index') }}"
                                                    class="list-group-item list-group-item-action border-0">
                                                    <i class="fa-solid fa-upload me-1"></i>Publication
                                                </a>
                                            </div>
                                        @endcanany
                                        @can('isAdmin')
                                            <hr class="text-dark">
                                            <div class="list-group border-0 text-start">
                                                <a href="{{ route('admin.user.index') }}"
                                                    class="list-group-item list-group-item-action border-0">
                                                    <i class="fa-solid fa-user me-1"></i>User Management
                                                </a>
                                            </div>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card border-success">
                                    <div class="card-header bg-success text-white">@yield('title')</div>
                                    <div class="card-body">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endguest
        </main>
    </div>
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted footer mt-auto">
        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-2">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <img src="{{ asset('images/DA-logo.png') }}" width="20" height="20"
                                class="d-inline-block">
                            LGU Delfin Albano
                        </h6>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo rerum ullam eligendi fuga
                            doloribus, error cum sapiente ab veniam sunt?
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i> Delfin Albano, Isabela, Ph</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2022 Copyright:
            <a class="text-reset fw-bold" href="#">LGU Delfin Albano</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('customJS')
</body>

</html>