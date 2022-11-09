<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="/"><i class="fas fa-dragon"></i>  Apl Berita</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ (Request::is('/') ? 'active' : '') }}" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (Request::is('posts') ? 'active' : '') }}" href="/posts">Posts</a>
            </li>
        </ul>

        {{-- midlleware --}}
        <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item">
            <div class="dropdown">
              <a href="#" class="nav-link dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown">Welcome Admin</a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                <li><a class="dropdown-item" href="/logout" onclick="return confirm('Yakin Kidz?')">Logout</a></li>
              </ul>
            </div>
          </li>
          @else
          {{-- Login --}}
            <li class="nav-item">
              <a href="/login" class="nav-link {{ (Request::is('login') ? 'active' : '') }}"><i class="bi bi-box-arrow-in-right"></i>  Login</a>
            </li>
          @endauth
        </ul>

      </div>
    </div>
  </nav>