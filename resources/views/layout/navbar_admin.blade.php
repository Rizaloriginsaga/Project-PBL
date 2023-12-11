<nav class="main-header navbar navbar-expand navbar-purple navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i
                    class="fas fa-bars"></i></a>
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
