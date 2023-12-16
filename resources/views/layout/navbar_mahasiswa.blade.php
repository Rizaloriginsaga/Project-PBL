<nav class="navbar navbar-expand navbar-dark navbar-light bg-purple">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('assets/img/logo.png') }}" class="brand-image-xl">
                <span class="text-white ml-2 my-auto font-weight-bold">PRESMIPOLI</span>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item px-3">
            <a class="nav-link font-weight-bold {{ Request::segment(1) == '' ? 'active' : '' }}" href="#">Home</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link font-weight-bold {{ Request::segment(1) == 'lomba' ? 'active' : '' }}"
                href="#">Lomba</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link font-weight-bold {{ Request::segment(1) == 'prestasi' ? 'active' : '' }}"
                href="#">Prestasi</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link font-weight-bold {{ Request::segment(1) == 'edit-profile' ? 'active' : '' }}"
                href="#">Profil</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <div class="dropdown">
            <button class="btn dropdown-toggle user-panel text-white" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->nama_lengkap == null ? 'User' : Auth::user()->nama_lengkap }}
                <div class="image">
                    <img src="{{ asset('assets/foto-profile/' . Auth::user()->foto) }}"
                        class="img-circle border border-white" alt="User Image">
                </div>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('edit_profile') }}"><i
                        class="far fa-user-circle"></i>&ensp;Profil</a>
                <a class="dropdown-item" href="{{ route('logout') }}"><i
                        class="fas fa-sign-out-alt"></i>&ensp;Logout</a>
            </div>
        </div>
    </ul>
</nav>
