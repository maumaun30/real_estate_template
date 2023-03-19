<nav class="navbar navbar-expand-lg fixed-top custom-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('media/site-logo.png') }}" alt="Site logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <!-- <ul class="navbar-nav me-auto">
            </ul> -->

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto custom-menu-wrapper">
                <li class="nav-item">
                    <a class="nav-link" href="#">Nav Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nav Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nav Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nav Link</a>
                </li>
                <li class="nav-item">
                    <a class="btn-default" href="#">Work with us <img src="{{ asset('media/btn-arrow-right.svg') }}"></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Authentication Links -->
@auth
<div class="user-btn dropdown">
    <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <i class="fa fa-circle-user"></i>
        <span class="text-white">
            {{ Auth::user()->name }}
        </span> 
    </a>

    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a href="{{ route('admin.index') }}" class="dropdown-item">Dashboard</a>
        <a class="dropdown-item" href="{{ route('logout') }}" id="logOut">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
@endauth