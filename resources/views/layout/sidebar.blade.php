<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/img/logo.png') }}" class="brand-image-2xl">
        <span class="text-white ml-2 my-auto font-weight-bold">PRESMIPOLI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ Request::segment(1) == '' ? 'active' : '' }}">
                        <img src="{{ asset('/assets/img/icon/dashboard.svg') }}" class="nav-icon" />
                        <p class="my-auto ml-2">
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="{{ asset('/assets/img/icon/data_master.svg') }}"
                            class="nav-icon fas fa-tachometer-alt" />
                        <p class="my-auto ml-2">
                            Data Master
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview bg-white rounded">
                        <li class="nav-item">
                            <a href="{{ route('prestasi') }}" class="nav-link">
                                <img src="{{ asset('/assets/img/icon/data_prestasi.svg') }}" class="nav-icon" />
                                <p class="my-auto ml-2">Data Prestasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('lomba')}}" class="nav-link">
                                <img src="{{ asset('/assets/img/icon/data_lomba.svg') }}" class="nav-icon" />
                                <p class="my-auto ml-2">Data Lomba</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::segment(1) == 'edit-profile' ? 'active' : '' }}">
                        <img src="{{ asset('/assets/img/icon/pengaturan.svg') }}"
                            class="nav-icon fas fa-tachometer-alt" />
                        <p class="my-auto ml-2">
                            Pengaturan
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview bg-white rounded">
                        <li class="nav-item">
                            <a href="{{ route('edit_profile') }}" class="nav-link active">
                                <img src="{{ asset('/assets/img/icon/profil.svg') }}" class="nav-icon" />
                                <p class="my-auto ml-2">Profil</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
