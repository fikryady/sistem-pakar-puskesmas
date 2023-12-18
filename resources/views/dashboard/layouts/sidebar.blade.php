<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse position-fixed vh-100" style="background-color: rgba(199,255,216,1)">
  <div class="position-sticky pt-3">
      @can('admin')
      <div class="text-center mb-4">
          <img src="/img/dashboard/profile.png" alt="profile" width="100" height="100">
          <h6 class="sidebar-heading d-flex justify-content-center align-items-center px-3 mt-3 mb-0" style="color: #000000;">
            {{ auth()->user()->name }}
          </h6>
      </div>
      <ul class="nav flex-column">
          <hr>
          <h5 class="sidebar-heading d-flex justify-content-center align-items-center px-3 mt-2 mb-2 text-muted">
              <span style="color: #000000;">Main Menu</span>
          </h5>
          <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/diseases*') ? 'active' : '' }}" href="/dashboard" style="text-decoration: none; color: #000000;">
                <img width="24" height="24" src="https://img.icons8.com/material/24/control-panel--v1.png" alt="control-panel--v1"/>
                  Dashboard
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/diseases*') ? 'active' : '' }}" href="/dashboard/diseases" style="text-decoration: none; color: #000000;">
                  <i class="fa-solid fa-viruses"></i>
                  Data Penyakit
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/symptoms*') ? 'active' : '' }}" href="/dashboard/symptoms" style="text-decoration: none; color: #000000;">
                  <i class="fa-solid fa-disease"></i>
                  Data Gejala
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users" style="text-decoration: none; color: #000000;">
                  <i class="fa-solid fa-users"></i>
                  Data User
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/rules*') ? 'active' : '' }}" href="/dashboard/rules" style="text-decoration: none; color: #000000;">
                  <img src="/img/dashboard/open-book.png" alt="" width="15px">
                  Data Rule
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/histories*') ? 'active' : '' }}" href="/dashboard/histories" style="text-decoration: none; color: #000000;">
                <i class="fa-solid fa-file-lines"></i>
                  Data Riwayat
              </a>
          </li>
      </ul>
      @endcan
  </div>
</nav>
  