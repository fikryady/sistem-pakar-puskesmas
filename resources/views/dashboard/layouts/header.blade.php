<header class="navbar navbar-light sticky-top flex-md-nowrap p-0" style="background-color: rgba(157,157,157,1)">
  <a class="navbar-brand" style="font-size: 17px" href="/">
    <img src="/img/nav/logo.png" alt="" width="50" height="60" class="d-inline-block align-middle">  
    Puskesmas Belimbing
  </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="col-md">
      <form action="">
          <div class="input-group">
              <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
              <button class="btn btn-dark" type="submit">Search</button>
            </div>
      </form>
  </div>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="nav-link px-3 bg-light border-0">Logout <span data-feather="log-out"></span></button>
        </form>
      </div>
    </div>
  </header>