<div class="topbar">

    <nav class="navbar-custom">
        <!-- Search input -->
        {{--<div class="search-wrap" id="search-wrap">--}}
            {{--<div class="search-bar">--}}
                {{--<input class="search-input" type="search" placeholder="Search" />--}}
                {{--<a href="#" class="close-search toggle-search" data-target="#search-wrap">--}}
                    {{--<i class="mdi mdi-close-circle"></i>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}

        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset ('assets/images/gama.png') }}" alt="user" class="rounded-circle">
                </a>

                <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                    <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a>
                    <a class="dropdown-item" href="{{route('admin.logout')}}"><i class="dripicons-exit text-muted"></i> Logout</a>
                </div>
            </li>
        </ul>

        <!-- Page title -->
        <ul class="list-inline menu-left mb-0">
            <li class="list-inline-item">
                <button type="button" class="button-menu-mobile open-left waves-effect">
                    <i class="ion-navicon"></i>
                </button>
            </li>
            <li class="hide-phone list-inline-item app-search">
                <h3 class="page-title">Dashboard</h3>
            </li>
        </ul>

        <div class="clearfix"></div>
    </nav>

</div>