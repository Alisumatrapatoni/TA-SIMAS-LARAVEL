<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.header')
</head>

<body>
    @include('sweetalert::alert')
    <div id="main-wrapper">
        <div class="nav-header text-center">
            <div class="brand-title">
                <br>
                <h5><b>Management Asset App</b></h5>
            </div>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <div class="header border-bottom">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                @yield('menunya')
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item d-flex align-items-center">
                                @php
                                    $date = date('l, d F Y ');
                                    // $date = date('l, Y-m-d ');
                                @endphp
                                <strong>{{ $date }} &nbsp;
                                    <span id="jamServer">
                                        @php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $datenow = date('H:i:s');
                                        @endphp
                                        <h6> <strong> {{ $datenow }}</strong></h6>
                                    </span>
                                </strong>
                            </li>

                            @if (session('userdata')['status'] == 'ADMIN')
                                <li class="nav-item dropdown header-profile">
                                    <a class="nav-link" href="javascript:void(0);" role="button"
                                        data-bs-toggle="dropdown">
                                        <img src="{{ asset('/') }}simas/images/Admin-Profile-PNG.png"
                                            alt="" />
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ route('user.show', ['id' => session('userdata')]) }}"
                                            class="dropdown-item ai-icon">
                                            <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                                width="18" height="18" viewbox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            <span class="ms-2">Profil </span>
                                        </a>
                                        <a href="{{ route('logout') }}" class="dropdown-item ai-icon">
                                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                                width="18" height="18" viewbox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12">
                                                </line>
                                            </svg>
                                            <span class="ms-2">Logout </span>
                                        </a>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="dlabnav">
            <div class="dlabnav-scroll">
                {{-- sidebar --}}
                @include('includes.sidebar')
                <div class="copyright">
                    <p><strong>SIMAS SMKN 1 Kalianget </strong> ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> All Rights Reserved
                    </p>
                    <p class="fs-12">Made with by Ali Suma Trapatoni</p>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                @section('content')@show
            </div>
        </div>

        <div class="footer">
            <div class="copyright">
                <p>Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                </p>
            </div>
        </div>
    </div>

    @include('includes.js')

</body>

</html>
