<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Plan - Admin Page </title>

    <link rel="stylesheet" href="{{asset('assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main/app-dark.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/images/logo/favicon.png')}}" type="image/png">

    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css')}}">

    @yield('style')

    <style>

        @media screen and (min-width: 300px){
            .search {
                display: none;
            }

        }
    </style>
</head>

<body>
<div id="app">
    <div id="main" class="layout-horizontal">
        <header class="mb-5">
            <div class="header-top">
                <div class="container">
                    <div class="logo">
                        <a href="/" class="nav-link d-flex">
                            <i class="bi bi-map-fill text-success"></i>
                            <h5 class="ms-2">Tourin Travel</h5>
                        </a>
                    </div>
                    <div class="search">
                        <input type="text" class="form-control" placeholder="Search"/>
                    </div>
                    <div class="header-top-right">
                        @if(auth()->user() != null)
                        <a href="{{ route('list-travel.index') }}" class="link-primary fw-bold mx-1">
                            <span class="badge bg-danger position-relative p-1 text-sm" style="left: 30px; top: -7px;font-size: 9px">5</span>
                            <i class="bi bi-cart-fill"></i>
                        </a>
                        <div class="dropdown">
                            <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="avatar avatar-md2" >
                                    <img src="{{Auth::user()->avatar ?? 'https://via.placeholder.com/640x480.png/006644?text=dolor'}}" alt="Avatar">
                                </div>
                                <div class="text">
                                    <h6 class="user-dropdown-name">{{ Auth::user()->name }}</h6>
                                    <p class="user-dropdown-status text-sm text-muted">{{ Auth::user()->role }}</p>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </div>
                        @else
                            <a href="{{ route('form-login') }}" class="link-primary fw-semibold">Login</a><span class="mx-2">|</span>
                            <a href="{{ route('form-register') }}" class="link-primary fw-semibold">Register</a>
                        @endif
                    </div>
                </div>
            </div>
        </header>

        <div class="content-wrapper container">
            <div class="page-content" style="min-height: 80vh">
                @include('layouts.components.alert')
                @yield('content')
            </div>

        </div>

        <footer>
            <div class="container">
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="https://saugi.me">Saugi</a></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="{{asset('assets/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
<script src="{{asset('assets/js/pages/horizontal-layout.js')}}"></script>

@yield('script')
</body>

</html>

