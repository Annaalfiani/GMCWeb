<div class="nav-top flex-grow-1">
    <div class="container d-flex flex-row h-100 align-items-center">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center">
            <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset ('assets/images/gama.png') }}" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between flex-grow-1">

            <ul class="navbar-nav navbar-nav-right mr-0 ml-auto">

                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <span class="nav-profile-name">{{Auth::guard('admin')->user()->name}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <div class="dropdown-divider"></div>
                        <a href="{{route('admin.logout')}}" class="dropdown-item">
                            <i class="icon-logout text-primary mr-2"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
    </div>
</div>