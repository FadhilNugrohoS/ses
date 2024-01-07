<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <div class="user-panel ml-2 pb-3 mb-3 ">
            <li class="nav-item ">
                <a href="{{route('karyawan.dashboard')}}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt pr-2"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('barang.index') }}" class="nav-link {{ request()->is('barang') ? 'active' : '' }}">
                    <i class="fa fa-archive nav-icon pr-2"></i>
                    <p>Data Barang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('pemesanan.index') }}"
                    class="nav-link {{ request()->is('pemesanan') ? 'active' : '' }}">
                    <i class="fa fa-usd nav-icon pr-2"></i>
                    <p>Data Pemesanan</p>
                </a>
            </li>
        </div>
        <div class="user-panel ml-2 mt-3 pb-3 mb-3 d-flex">
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link"
                    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out pr-2"></i>
                    <p>Logout</p>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </li>
        </div>
        </li>
    </ul>
</nav>
