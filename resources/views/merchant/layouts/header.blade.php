<nav class="navbar">
    <a href="#" class="sidebar-toggler">
      <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
      <ul class="navbar-nav">
        <li class="nav-item dropdown nav-profile">
          <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ auth()->user() ? auth()->user()->name : 'Nama User' }}
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="profileDropdown">
            <div class="dropdown-body">
              <ul class="profile-nav" style="margin-left: -25px;">
                {{-- <li class="nav-item">
                  <a href="{{ url('/profile') }}" class="nav-link">
                    <i data-feather="user"></i>
                    <span>Profile</span>
                  </a>
                </li> --}}
                <li class="nav-item">
                  <a href="{{ url('/logout') }}" class="nav-link">
                    <i data-feather="log-out"></i>
                    <span>Log Out</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>