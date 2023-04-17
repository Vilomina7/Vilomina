<!-- START PAGE-CONTAINER -->
<div class="header p-r-0 bg-primary">
    <div class="header-inner header-md-height">
      <a href="#" class="btn-link toggle-sidebar d-lg-none text-white sm-p-l-0 btn-icon-link" data-toggle="horizontal-menu">
        <i class="pg-icon">menu</i>
      </a>
      <div class="">
        <div class="brand inline no-border d-sm-inline-block">
            <a class="navbar-brand" href="/"><img src="/img/VilominaLogoBase2.png" alt="Vilomina" width="100" height="25"></a>
        </div>
      </div>
      <div class="d-flex align-items-center">
        <!-- START User Info-->
        <div class="pull-left p-r-10 fs-14 d-lg-inline-block d-none text-white">
          <span class="semi-bold">Welcome Back, {{ auth()->user()->name }}</span>
        </div>
        <div class="dropdown pull-right d-lg-block">
          <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="profile dropdown">
            <span class="thumbnail-wrapper d32 circular inline">
                <img src="/img/avatar_user.png" alt="Avatar User" width="32" height="32">
            </span>
          </button>
          <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
            <a href="#" class="dropdown-item"><span>Signed in as <br /><b>{{ auth()->user()->name }}</b></span></a>
            <div class="dropdown-divider"></div>
            {{-- <a href="#" class="dropdown-item">Your Profile</a>
            <a href="#" class="dropdown-item">Your Activity</a>
            <a href="#" class="dropdown-item">Your Archive</a>
            <div class="dropdown-divider"></div> --}}
            <a href="{{ route('profil.edit') }}" class="dropdown-item">Profil</a>
            <a href="/dashboard/password" class="dropdown-item">Ganti Password</a>
            <a href="{{ route('profil.destroy') }}" class="dropdown-item">Hapus Akun</a>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item px-3 border-0">Logout <span data-feather="log-out"></span></button>
            </form>
          </div>
        </div>
        <!-- END User Info-->
      </div>
    </div>
    <div class="bg-white">
      <div class="container">
        <div class="menu-bar header-sm-height" data-pages-init='horizontal-menu' data-hide-extra-li="4">
          <a href="#" class="btn-link header-icon toggle-sidebar d-lg-none" data-toggle="horizontal-menu">
            <i class="pg-icon">close</i>
          </a>
          <ul>
            <li>
              <a href="/dashboard/posts">Manajemen Penawaran</a>
            </li>
            <li>
                <a href="{{ route('products.bookmarked') }}">Bookmark</a>
            </li>
            <li>
                <a href="{{ route('users.index') }}">Following</a>
            </li>
            <li>
                <a href="/dashboard/notification">Notification</a>
            </li>
          </ul>
          <a href="#" class="search-link d-flex justify-content-between align-items-center d-lg-none" data-toggle="search">Tap here to search <i class="pg-search float-right"></i></a>
        </div>
      </div>
    </div>
  </div>


{{-- <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Vilomina</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form action="/logout" method="post">
            @csrf
            <button type="submit" class="nav-link px-3 bg-dark border-0">Logout <span data-feather="log-out"></span></button>
          </form>
        </div>
    </div>
</header> --}}
