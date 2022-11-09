<nav class="navbar navbar-expand-sm navbar-dark bg-secondary">
  <div class="container">
    <a class="navbar-brand" href="/dashboard"><i class="fas fa-dragon"></i>  Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}" href="/dashboard/posts">Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/" onclick="return confirm('Yakin Kidz?')">Back To Home</a>
            </li>
        </ul>
    </div>
  </div>
</nav>