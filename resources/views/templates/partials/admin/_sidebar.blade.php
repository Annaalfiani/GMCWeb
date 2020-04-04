<div class="left side-menu">

    <!-- LOGO -->
    <div class="topbar-left">
        <li>
            <div class="">
                <!--<a href="index.html" class="logo text-center">Fonik</a>-->
                <a href="index.html" class="logo"><img src="{{ asset ('assets/images/gama.png') }}" height="100" alt="logo"></a>
            </div>
        </li>
    </div>
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{route('admindashboard.index')}}" class="waves-effect"><i class="fa fa-home"></i><span> Dashboard </span></a>
                </li>
                <li>
                    <a href="{{route('customer.index')}}" class="waves-effect"><i class="mdi mdi-account"></i><span> Customer</span></a>
                </li>

                </li>
                <li>
                    <a href="{{route('data_film.index')}}" class="waves-effect"><i class="ion-ios7-film"></i><span> Data Film </span></a>
                </li>

                <li>
                    <a href="{{route('jadwal_tayang.index')}}" class="waves-effect"><i class="fa fa-calendar"></i><span> Jadwal Tayang </span></a>
                </li>
                <li>
                    <a href="{{route('studio.index')}}" class="waves-effect"><i class="mdi mdi-theater"></i><span> Data Studio </span></a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>