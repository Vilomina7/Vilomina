<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/">
            <span data-feather="home" class="align-text-bottom"></span>
            Back to Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('profil') ? 'active' : '' }}" aria-current="page" href="{{ route('profil.edit') }}">
            <span data-feather="user" class="align-text-bottom"></span>
            Profil
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/infohalaman') ? 'active' : '' }}" aria-current="page" href="{{ route('hal.edit') }}">
            <span data-feather="book" class="align-text-bottom"></span>
            Manajemen Halaman 
          </a>
        </li>
        <li class="nav-item">
          <a id="x" class="nav-link {{ Request::is('dashboard/infohalaman') ? 'active' : '' }}" href="{{ route('hal.edit') }}">
            <span data-feather="file-text"></span>
            Informasi Halaman
          </a>
        </li> --}}
        <li class="nav-item">
          <a id="y" class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
            <span data-feather="file-text"></span>
            Manajemen Penawaran
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('bookmark') ? 'active' : '' }}" aria-current="page" href="{{ route('products.bookmarked') }}">
            <span data-feather="bookmark" class="align-text-bottom"></span>
            Bookmark
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('followers') ? 'active' : '' }}" aria-current="page" href="{{ route('users.index') }}">
            <span data-feather="user-check" class="align-text-bottom"></span>
            Following
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('notification') ? 'active' : '' }}" aria-current="page" href="/notification">
            <span data-feather="bell" class="align-text-bottom"></span>
            Notification
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('gantipassword') ? 'active' : '' }}" aria-current="page" href="/dashboard/password">
            <span data-feather="key" class="align-text-bottom"></span>
            Ganti Password
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('hapusakun') ? 'active' : '' }}" aria-current="page" href="{{ route('profil.destroy') }}" onclick="return confirm('Are you sure?')">
            <span data-feather="user-x" class="align-text-bottom"></span>
            Hapus Akun
          </a>
        </li>
        
      </ul>
    </div>
  </nav>
