<body>
        <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0">
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                        <a href="{{ route('provider.AllService') }}" class="nav-item nav-link">Services</a>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                    </div>
            @guest()
          <div class="ms-auto d-none d-lg-block">
                    <a href="{{ route('register') }}" class="btn btn-primary py-2 px-3">Add Your Service</a>
              </div>
            @endguest
            @auth
       <div class="ms-auto d-none d-lg-flex align-items-center gap-3">
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{  asset('storage/' . (Auth::user()->image ?? 'users/user.jpg'))  }}" alt="Profile" width="40" height="40" class="rounded-circle">
                <span class="ms-2">{{ $authUserName }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
            @endauth
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
