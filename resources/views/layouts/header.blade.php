 <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user mr-2"></i> Profile
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <form action="{{route('logout')}}">
            <button type="submit" class="dropdown-item">
              <i class="fas fa-user mr-2"></i> Logout
            </button>
            </form>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->