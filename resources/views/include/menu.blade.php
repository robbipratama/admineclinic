<aside class="menu-sidebar3 js-spe-sidebar">
    <nav class="navbar-sidebar2 navbar-sidebar3">
        <ul class="list-unstyled navbar__list">
            <li @if($menu == 'home_active') class="active" @endif>
                <a href="{{ url('/home') }}">
                    <i class="fas fa-home"></i>Home
                </a>
            </li>
            @if((Session::get('level') == 1) || (Session::get('level') == 2))
            <li @if($menu == 'poli_active') class="active" @endif>
                <a href="{{ url('/poli') }}">
                    <i class="fas fa-hospital-o"></i>Poli
                </a>
            </li>
            <li @if($menu == 'antrian_active') class="active" @endif>
                <a href="{{ url('/antrian') }}">
                    <i class="fas fa-list-ol"></i>Antrian
                </a>
            </li>
            <li @if($menu == 'dokter_active') class="active" @endif>
                <a href="{{ url('/dokter') }}">
                    <i class="fas fa-user-md"></i>Dokter
                </a>
            </li>
            <li @if($menu == 'jadwal_active') class="active" @endif>
                <a href="{{ url('/jadwal') }}">
                    <i class="fas fa-calendar"></i>Jadwal Praktik
                </a>
            </li>
            @endif
            @if((Session::get('level') == 1) || (Session::get('level') == 3))
            <li @if($menu == 'penyakit_active') class="active" @endif>
                <a href="{{ url('/penyakit') }}">
                    <i class="fas fa-stethoscope"></i>Data Penyakit
                </a>
            </li>
            <li @if($menu == 'obat_active') class="active" @endif>
                <a href="{{ url('/obat') }}">
                    <i class="fas fa-medkit"></i>Data Obat
                </a>
            </li>
            @endif
            @if(Session::get('level') == 1)
            <li @if($menu == 'user_active') class="active" @endif>
                <a href="{{ url('/data-user') }}">
                    <i class="fas fa-users"></i>Data User
                </a>
            </li>
            <li @if($menu == 'admin_active') class="active" @endif>
                <a href="{{ url('/data-admin') }}">
                    <i class="fas fa-users"></i>Data Admin
                </a>
            </li>
            @endif
            <li>
                <a href="{{ url('/logout') }}">
                    <i class="fas fa-power-off"></i>Logout
                </a>
            </li>
        </ul>
    </nav>
</aside>
