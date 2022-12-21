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
    <link href="{{ asset('storage/css/card.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/loading.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/table.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/pdsTable.css') }}" rel="stylesheet">
    @if (!Request::is('/'))
        <link href="{{ asset('storage/css/navbar.css') }}" rel="stylesheet">
    @endif
    @yield('customCSS')
</head>

<body class="bg-white">
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-light navbar-light fw-bold shadow-lg background-image">
            <div class="container">
                <a class="navbar-brand d-inline-block text-truncate" href="{{ url('/') }}">
                    <img src="{{ asset('images/DA-logo.png') }}" width="50" height="45"
                        class="d-inline-block align-text-middle">
                    <span class="navbar-brand-text">
                        {{ config('app.name') }}
                    </span>
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
                        <li class="nav-item">
                            <a href="#" class="nav-link">How to?</a>
                        </li>
                        @if (Auth::user())
                            <hr class=" d-block d-md-none">
                            <li class="nav-item d-block d-md-none">
                                <a href="{{ route('users.pds.index') }}" class="nav-link">Personal Data Sheet</a>
                            </li>
                            <li class="nav-item d-block d-md-none">
                                @can('isUser')
                                    <a href="{{ route('users.application.index') }}" class="nav-link">My Applications</a>
                                @else
                                    <a href="#" class="nav-link">Survey</a>
                                    <a href="{{ route('users.files.index') }}" class="nav-link">My Record</a>
                                    <a href="{{ route('users.files.create') }}" class="nav-link">My Files</a>
                                    <a href="{{ route('users.covid.index') }}" class="nav-link">Covid 19 Response</a>
                                @endcan
                            </li>
                            <li class="nav-item d-block d-md-none">
                                <a href="{{ route('users.account.edit', Auth::user()->id) }}" class="nav-link">Account
                                    Settings</a>
                            </li>
                        @endif
                        <hr class=" d-block d-md-none">
                    </ul>
                    <ul class="navbar-nav me-auto d-flex d-lg-none">
                        @if (Auth::user())
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
                                    <a href="{{ route('hr.dashboard.index') }}" class="nav-link">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('hr.leave.index') }}" class="nav-link">Employee Leave
                                        Credit</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('hr.service.index') }}" class="nav-link">Service Record</a>
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
                            <li class="nav-item">
                                <bell-component></bell-component>
                            </li>
                            <li class="nav-item dropdown d-none d-md-block">
                                <a id="navbarDropdown" class="nav-link fs-5" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Hello! <strong>{{ Auth::user()->first_name }}</strong>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end border-success"
                                    aria-labelledby="navbarDropdown">
                                    <a href="{{ route('users.pds.index') }}" class="dropdown-item">Personal Data
                                        Sheet</a>
                                    <a href="{{ route('users.account.edit', Auth::user()->id) }}"
                                        class="dropdown-item">Account Settings</a>

                                    @can('isUser')
                                        <a href="{{ route('users.application.index') }}" class="dropdown-item">My
                                            Applications</a>
                                    @else
                                    <a href="#" class="dropdown-item">Survey</a>
                                        <a href="{{ route('users.files.index') }}" class="dropdown-item">My Records</a>
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
                    <div>
                        <div class="row justify-content-center">
                            <div class="col-lg-2 d-none d-lg-block">
                                <div class="card shadow">
                                    <div class="">
                                        <div class="card-header avatar-bg">
                                            <img src="{{ asset('storage/user_avatar/' . Auth::user()->avatar) }}"
                                                alt="" class="avatar-img mx-auto d-block">
                                        </div>
                                        <div class="list-group border-0 text-start">
                                            <a href="{{ route('users.pds.index') }}"
                                                class="list-group-item list-group-item-action border-0">
                                                <i class="fa-solid fa-address-card me-1"></i>Personal DataSheet
                                            </a>
                                            <a href="{{ route('users.covid.index') }}"
                                                class="list-group-item list-group-item-action border-0">
                                                <i class="fa-solid fa-virus-covid me-1"></i>Covid 19 Response
                                            </a>
                                            @can('isUser')
                                                <a href="{{ route('users.application.index') }}"
                                                    class="list-group-item list-group-item-action border-0">
                                                    <i class="fa-solid fa-briefcase me-1"></i>My Application
                                                </a>
                                            @else
                                            <a href="#"
                                                class="list-group-item list-group-item-action border-0">
                                                <i class="fa-solid fa-circle-question me-1"></i>Survey
                                            </a>
                                                <a href="{{ route('users.files.index') }}"
                                                    class="list-group-item list-group-item-action border-0">
                                                    <i class="fa-solid fa-briefcase me-1"></i>My Records
                                                </a>
                                                <a href="{{ route('users.files.create') }}"
                                                    class="list-group-item list-group-item-action border-0">
                                                    <i class="fa-solid fa-box-archive me-2"></i></i>My Files
                                                </a>
                                            @endcan
                                            <a href="{{ route('users.account.edit', Auth::user()->id) }}"
                                                class="list-group-item list-group-item-action border-0">
                                                <i class="fa-solid fa-user-gear me-1"></i>Account Settings
                                            </a>
                                        </div>
                                        @canany(['isAdmin', 'isHR'])
                                            <hr class="text-dark">
                                            <div class="list-group border-0 text-start">
                                                {{-- RSP --}}
                                                <a href="#rsp" class="list-group-item list-group-item-action border-0 "
                                                    data-bs-toggle="collapse">
                                                    <span class="text-start"><i class="fa-solid fa-users me-2"></i>RSP</span>
                                                    <span class="float-end"><i class="fa-solid fa-caret-down"></i></span>
                                                </a>
                                                <div class="collapse ms-2" id="rsp">
                                                    <a class="list-group-item list-group-item-action border-0"
                                                        href="{{ route('hr.manage_applicants.index') }}"><i
                                                            class="fa-solid fa-user-plus me-1"></i>Applicants</a>
                                                    <a class="list-group-item list-group-item-action border-0"
                                                        href="{{ route('hr.ranking.index') }}"><i
                                                            class="fa-solid fa-chart-simple me-2"></i>Ranking</a>
                                                    <a class="list-group-item list-group-item-action border-0"
                                                        href="{{ route('hr.manage_applicants.create') }}"><i
                                                            class="fa-solid fa-check me-2"></i>Accepted</a>
                                                </div>
                                                {{-- PMS --}}
                                                <a href="#pms" class="list-group-item list-group-item-action border-0"
                                                    data-bs-toggle="collapse">
                                                    <span class="text-start"><i
                                                            class="fa-solid fa-ranking-star me-2"></i>PMS</span>
                                                    <span class="float-end"><i class="fa-solid fa-caret-down"></i></span>
                                                </a>
                                                <div class="collapse ms-2" id="pms">
                                                    <a class="list-group-item list-group-item-action border-0"
                                                        href="{{ route('hr.pms.index') }}"><i
                                                            class="fa-solid fa-plus me-2"></i>Add PMS</a>
                                                    <a class="list-group-item list-group-item-action border-0"
                                                        href="{{ route('hr.pmsEmployee.index') }}"><i
                                                            class="fa-solid fa-signal me-2"></i>Employee</a>
                                                    <a class="list-group-item list-group-item-action border-0"
                                                        href="{{ route('hr.pmsEmployee.create') }}"><i
                                                            class="fa-solid fa-chart-simple me-2"></i>Department</a>
                                                </div>
                                                {{-- lnd --}}
                                                <a href="#lnd" class="list-group-item list-group-item-action border-0"
                                                    data-bs-toggle="collapse">
                                                    <span class="text-start"><i
                                                            class="fa-solid fa-chalkboard-user me-2"></i>L&D</span>
                                                    <span class="float-end"><i class="fa-solid fa-caret-down"></i></span>
                                                </a>
                                                <div class="collapse ms-2" id="lnd">
                                                    <a class="list-group-item list-group-item-action border-0"
                                                        href="{{ route('hr.lnd.create') }}"><i
                                                            class="fa-solid fa-globe me-2"></i>All</a>
                                                    <a class="list-group-item list-group-item-action border-0"
                                                        href="{{ route('hr.surveyQuestion.index') }}">
                                                        <i class="fa-solid fa-person-circle-question me-2"></i>Survey Question</a>
                                                    <a class="list-group-item list-group-item-action border-0"
                                                        href="{{ route('hr.surveyForm.index') }}"><i class="fa-solid fa-file-circle-question me-2"></i>Survey Form</a>
                                                        <a class="list-group-item list-group-item-action border-0"
                                                        href=""><i
                                                        class="fa-solid fa-clipboard-question me-2"></i>Survey Result</a>
                                                    <a class="list-group-item list-group-item-action border-0"
                                                        href="{{ route('hr.trainingneeds.index') }}"><i
                                                            class="fa-solid fa-person-dots-from-line me-2"></i>Training Need
                                                        Analysis</a>
                                                    <a class="list-group-item list-group-item-action border-0"
                                                        href="{{ route('hr.assessment.index') }}"><i
                                                            class="fa-solid fa-check-double me-2"></i>Assessment</a>
                                                </div>
                                                {{-- R n R --}}
                                                <a href="#rr" class="list-group-item list-group-item-action border-0"
                                                    data-bs-toggle="collapse">
                                                    <span class="text-start"><i class="fa-solid fa-medal me-2"></i>R&R</span>
                                                    <span class="float-end"><i class="fa-solid fa-caret-down"></i></span>
                                                </a>
                                                <div class="collapse ms-2" id="rr">
                                                    <a class="list-group-item list-group-item-action border-0"
                                                        href=""><i
                                                            class="fa-solid fa-square-poll-vertical me-2"></i>Survey</a>
                                                    <a class="list-group-item list-group-item-action border-0"
                                                        href="{{ route('hr.certificates.index') }}"><i
                                                            class="fa-solid fa-certificate me-2"></i>Certificate</a>
                                                    <a class="list-group-item list-group-item-action border-0"
                                                        href="{{ route('hr.loyalty.index') }}"><i
                                                            class="fa-solid fa-user-tag me-2"></i>loyalty
                                                        award</a>
                                                    <a class="list-group-item list-group-item-action border-0"
                                                        href="{{ route('hr.top5.index') }}"><i
                                                            class="fa-solid fa-envelopes-bulk me-2"></i>Top 5 Offices</a>
                                                </div>
                                            </div>
                                            <hr class="text-dark">
                                            <div class="list-group border-0 text-start">
                                                <a href="{{ route('hr.dashboard.index') }}"
                                                    class="list-group-item list-group-item-action border-0">
                                                    <i class="fa-solid fa-gauge me-1"></i>Dashboard
                                                </a>
                                                <a href="{{ route('hr.leave.index') }}"
                                                    class="list-group-item list-group-item-action border-0">
                                                    <i class="fa-solid fa-money-check-dollar me-1"></i>Employee Leave
                                                    Credit
                                                </a>
                                                <a href="{{ route('hr.service.index') }}"
                                                    class="list-group-item list-group-item-action border-0">
                                                    <i class="fa-regular fa-id-card me-1"></i>Service Record
                                                </a>
                                                <a href="{{ route('hr.plantilla.index') }}"
                                                    class="list-group-item list-group-item-action border-0">
                                                    <i class="fa-solid fa-users me-1"></i>Plantilla Management
                                                </a>
                                                <a href="{{ route('hr.publication.index') }}"
                                                    class="list-group-item list-group-item-action border-0">
                                                    <i class="fa-solid fa-upload me-1"></i>Publication
                                                </a>
                                                <a href="{{ route('hr.printing.index') }}"
                                                    class="list-group-item list-group-item-action border-0">
                                                    <i class="fa-solid fa-print me-1"></i>Printing
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
                                <div class="card shadow">
                                    <div class="card-header bg-white border-0">@yield('title')</div>
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
    <footer class="text-center text-lg-start bg-light text-muted footer mt-auto" style="margin-top: 200px;">
        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-2">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold my-4">
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
                        <h6 class="text-uppercase fw-bold my-4">Contact</h6>
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
        <div class="text-center p-2 bottom-0" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2023 Copyright:
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
    <script src="{{ asset('storage/js/modal.js') }}"></script>
    <script src="{{ asset('storage/js/selectSort.js') }}"></script>
</body>

</html>
