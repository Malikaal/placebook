<header class="app-header navbar">
    
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{ asset('img/brand/logo.svg') }}" width="89" height="25" alt="CoreUI Logo">
        <img class="navbar-brand-minimized" src="{{ asset('img/brand/sygnet.svg') }}" width="30" height="30" alt="CoreUI Logo">
    </a>
    
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <ul class="nav navbar-nav ml-auto">
        
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#">
                <i class="icon-bell"></i>
                <span class="badge badge-pill badge-danger">5</span>
            </a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="navbar-brand-full" src="{{ asset('img/brand/logo.svg') }}" width="89" height="25" alt="CoreUI Logo">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>Account</strong>
                </div>
                <a class="dropdown-item" href="{{ route('profile.show') }}">
                    <i class="fa fa-user"></i> @lang('menu.profile')
                </a>
                <a class="dropdown-item" href="{{ route('password.show') }}">
                    <i class="fa fa-wrench"></i> @lang('menu.password')
                </a>
                <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" data-toggle="modal" data-target="#warningModal">
                    <i class="fa fa-lock"></i> @lang('menu.logout')
                </a>
            </div>
        </li>
        
    </ul>
    
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    
</header>