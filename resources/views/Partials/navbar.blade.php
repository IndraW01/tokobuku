<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="/">BukuKu</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('book.index') ? 'active' : '' }}" href="{{ route('book.index') }}">Books</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/categories">Category</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            @auth
            <li class="nav-item">
                <a href="{{ route('chart.index') }}" class="nav-link"><i class="bi bi-bag-fill text-white fs-5"></i></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-fill fs-5"></i> {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                        <form action="{{ route('login.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item border-0">Logout</button>
                        </form>
                  </li>
                </ul>
            </li>
            @else
            <li class="nav-item">
                <a href="{{ route('login.index') }}" class="nav-link btn btn-warning text-white">Login</a>
            </li>
            @endauth
        </ul>
      </div>
    </div>
</nav>
