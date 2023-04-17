<!doctype html>
<html lang="en">
  <head>
    <style>
      /* Aturan CSS untuk layar desktop */
.container {
  max-width: 1200px;
  margin: 0 auto;
}

/* Aturan CSS untuk layar tablet */
@media screen and (max-width: 992px) {
  .container {
    max-width: 720px;
  }
}

/* Aturan CSS untuk layar ponsel */
@media screen and (max-width: 576px) {
  .container {
    max-width: 100%;
    padding: 0 20px;
  }
}

.navbar-brand {
  font-size: 1.5rem;
}

.navbar-nav {
  font-size: 1.2rem;
}

.footer {
  font-size: 0.9rem;
}
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vilomina | {{ $title }}</title>
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    {{-- Boostrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  
    <link rel="stylesheet" href="/css/style.css">

  </head>
  <body>

    @include('partials.navbar')

    <div class="container mt-5 pb-5 .float">
        @yield('container')
    </div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    @yield('scripts')
  </body>
</html>