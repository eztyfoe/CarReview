<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('/img/sidebar-1.jpg') }}">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    @if($admin == true)
    <div class="logo"><a href="{{ url('/admin/home') }}" class="simple-text logo-normal">
            <img src="{{ asset('/img/logo.png') }}">
        </a></div>
    @else
    <div class="logo"><a href="{{ url('/') }}" class="simple-text logo-normal">
            <img src="{{ asset('/img/logo.png') }}">
        </a></div>
    @endif

    @if($admin == true)
        @if (!empty($pages) && $pages == 'home')
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item active ">
                    <a class="nav-link" href="{{ url('/admin/home') }}">
                        <i class="material-icons">home</i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/admin/car') }}">
                        <i class="material-icons">directions_car</i>
                        <p>Car</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/admin/brand') }}">
                        <i class="material-icons">stars</i>
                        <p>Brand</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/admin/user') }}">
                        <i class="material-icons">supervisor_account</i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/admin/review') }}">
                        <i class="material-icons">rate_review</i>
                        <p>Review</p>
                    </a>
                </li>
            </ul>
        </div>
        @elseif (!empty($pages) && $pages == 'car')
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item  ">
                    <a class="nav-link" href="{{ url('/admin/home') }}">
                        <i class="material-icons">home</i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link" href="{{ url('/admin/car') }}">
                        <i class="material-icons">directions_car</i>
                        <p>Car</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/admin/brand') }}">
                        <i class="material-icons">stars</i>
                        <p>Brand</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/admin/user') }}">
                        <i class="material-icons">supervisor_account</i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/admin/review') }}">
                        <i class="material-icons">rate_review</i>
                        <p>Review</p>
                    </a>
                </li>
            </ul>
        </div>
        @elseif (!empty($pages) && $pages == 'brand')
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item  ">
                    <a class="nav-link" href="{{ url('/admin/home') }}">
                        <i class="material-icons">home</i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/admin/car') }}">
                        <i class="material-icons">directions_car</i>
                        <p>Car</p>
                    </a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link" href="{{ url('/admin/brand') }}">
                        <i class="material-icons">stars</i>
                        <p>Brand</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/admin/user') }}">
                        <i class="material-icons">supervisor_account</i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/admin/review') }}">
                        <i class="material-icons">rate_review</i>
                        <p>Review</p>
                    </a>
                </li>
            </ul>
        </div>
        @elseif (!empty($pages) && $pages == 'user')
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item  ">
                    <a class="nav-link" href="{{ url('/admin/home') }}">
                        <i class="material-icons">home</i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/admin/car') }}">
                        <i class="material-icons">directions_car</i>
                        <p>Car</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/admin/brand') }}">
                        <i class="material-icons">stars</i>
                        <p>Brand</p>
                    </a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link" href="{{ url('/admin/user') }}">
                        <i class="material-icons">supervisor_account</i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/admin/review') }}">
                        <i class="material-icons">rate_review</i>
                        <p>Review</p>
                    </a>
                </li>
            </ul>
        </div>
        @elseif (!empty($pages) && $pages == 'review')
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item  ">
                    <a class="nav-link" href="{{ url('/admin/home') }}">
                        <i class="material-icons">home</i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/admin/car') }}">
                        <i class="material-icons">directions_car</i>
                        <p>Car</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/admin/brand') }}">
                        <i class="material-icons">stars</i>
                        <p>Brand</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/admin/user') }}">
                        <i class="material-icons">supervisor_account</i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/admin/review') }}">
                        <i class="material-icons">rate_review</i>
                        <p>Review</p>
                    </a>
                </li>
            </ul>
        </div>
        @endif
    @else
        @if (!empty($pages) && $pages == 'home')
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item active ">
                    <a class="nav-link" href="{{ url('/home') }}">
                        <i class="material-icons">home</i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/car') }}">
                        <i class="material-icons">directions_car</i>
                        <p>Car</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/brand') }}">
                        <i class="material-icons">stars</i>
                        <p>Brand</p>
                    </a>
                </li>
            </ul>
        </div>
        @elseif (!empty($pages) && $pages == 'car')
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item  ">
                    <a class="nav-link" href="{{ url('/home') }}">
                        <i class="material-icons">home</i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link" href="{{ url('/car') }}">
                        <i class="material-icons">directions_car</i>
                        <p>Car</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/brand') }}">
                        <i class="material-icons">stars</i>
                        <p>Brand</p>
                    </a>
                </li>
            </ul>
        </div>
        @elseif (!empty($pages) && $pages == 'brand')
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item  ">
                    <a class="nav-link" href="{{ url('/home') }}">
                        <i class="material-icons">home</i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/car') }}">
                        <i class="material-icons">directions_car</i>
                        <p>Car</p>
                    </a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link" href="{{ url('/brand') }}">
                        <i class="material-icons">stars</i>
                        <p>Brand</p>
                    </a>
                </li>
            </ul>
        </div>
        @endif
    @endif
</div>
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
            @if(session()->has('id'))
                <p class="navbar-brand" href="javascript:;">Hi, {{ session()->get('name') }} </p>
                @endif
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                @if(session()->has('id'))
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">person</i>
                            <p class="d-lg-none d-md-block">
                                Account
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('/logout') }}">Log out</a>
                        </div>
                    </li>
                </ul>
                @else
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">person</i>
                            <p class="d-lg-none d-md-block">
                                Account
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('/login') }}">Log In</a>
                        </div>
                    </li>
                </ul>
                @endif
            </div>
        </div>
    </nav>
