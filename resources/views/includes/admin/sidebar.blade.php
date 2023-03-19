<!-- Sidebar -->
<aside class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
    <a href="{{ route('home') }}" class="d-flex site-name align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <i class="fa fa-globe"></i> 
        <span class="text-white menu-text">{{ config('app.name', 'Laravel') }}</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
            <a href="{{ route('admin.index') }}" class="nav-link text-white {{ (request()->is('admin')) ? 'active' : '' }}">
                <i class="fa fa-gauge"></i>
                <span class="text-white menu-text">
                    Dashboard
                </span>
            </a>
        </li>
        <li>
            <a href="{{ route('house.index') }}" class="nav-link text-white {{ (request()->is('admin/house*')) ? 'active' : '' }}">
                <i class="fa fa-house"></i>
                <span class="text-white menu-text">
                    House Listings
                </span>
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-circle-user"></i>
            <strong class="ms-1 menu-text">{{ Auth::user()->name }}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </li>
        </ul>
    </div>
</aside>
<!-- End of Sidebar -->