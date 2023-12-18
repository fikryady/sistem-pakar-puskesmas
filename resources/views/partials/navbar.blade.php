<nav class="navbar navbar-expand-sm navbar-light" style="background-color :rgba(239,255,251,1)">
    <div class="container fluid">
    <a class="navbar-brand" href="/">
      <img src="/img/nav/logo.png" alt="" width="50" height="60" class="d-inline-block align-middle">  
      Puskesmas Belimbing
    </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('informasi*') ? 'active' : '' }}" href="/informasi">Informasi</a>
          </li>
          @can('pasien')
          <li class="nav-item">
            <a class="nav-link {{ Request::is('konsultasi*') ? 'active' : '' }}" href="/konsultasi">Konsultasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('riwayat*') ? 'active' : '' }}" href="/riwayat">Riwayat</a>
          </li>
          @endcan
          <li class="nav-item">
            <a class="nav-link {{ Request::is('bantuan*') ? 'active' : '' }}" href="/bantuan">Bantuan</a>
          </li>
        </ul>



        <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome back, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @can('pasien')
              <li><a class="dropdown-item" href="/profile"><i class="bi bi-file-person"></i></i> Edit Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              @endcan
              <li>
              @can('admin')
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              @endcan
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
              <a href="/login" class="nav-link {{ Request::is('login') ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>            
          </li>
          @endauth
        </ul>
        
      </div>
    </div>
  </nav>