<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <a href="#" class="brand-link">
      <img src="{{asset('template/dist/img/AdminLTELogo.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-normal">PRESMPOLI</span>
    </a>
    <div class="nav-item btn">
        <a href="#">Home</a>
        <a href="">Lomba</a>
        <a href="">Prestasi</a>
        <a href="">Profil</a>
    </div>
    <ul class="navbar-nav ml-auto">
        <div class="dropdown">
            <button class="btn dropdown-toggle user-panel" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Admin
                <div class="image">
                    <img src="{{asset('template/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                </div>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#"><i class="far fa-user-circle"></i>&ensp;Profil</a>
                <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i>&ensp;Logout</a>
            </div>
        </div>
    </ul>
  </nav>