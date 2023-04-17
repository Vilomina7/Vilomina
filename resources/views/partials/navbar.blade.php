<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/"><img src="/img/VilominaLogoBase2.png" alt="Vilomina" width="100" height="25"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Offer") ? 'active' : '' }}" href="/offer">Penawaran</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto">
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome Back, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('profil.edit') }}"><i class="bi bi-layout-text-sidebar-reverse"></i> Account</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                  </form>
                </li>
              </ul>
            </li>
          @else
            <li class="nav-item">
              <a href="/login" class="nav-link {{ ($title === "Login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
          @endauth
        </ul>
      </div>
    </div>
</nav>