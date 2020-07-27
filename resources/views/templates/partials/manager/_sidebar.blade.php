<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="{{ asset ('assets-manager/img/gama.png') }}" class="header-logo" /> <span
                        class="logo-name">GMC Manager</span>
            </a>
        </div>
        <ul class="sidebar-menu"><p>
            <li class="menu-header">Main</li></p>
            <li class="dropdown">
                <a href="{{route('managerdashboard.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="briefcase"></i><span>Lihat Laporan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="widget-chart.html">Laporan Data Film</a></li>
                    <li><a class="nav-link" href="{{route('penjualan_tiket.index')}}">Laporan Penjualan Tiket</a></li>
                </ul>
            </li>

        </ul>
    </aside>
</div>