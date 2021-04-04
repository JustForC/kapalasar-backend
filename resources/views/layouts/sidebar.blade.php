<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      <img src="/kapalasar.png" alt="logo" width="122.5" height="30">
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="home"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item {{ request()->is('account/*') ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#account" role="button" aria-expanded="{{ request()->is('account/*') ? 'true' : 'false' }}" aria-controls="account">
          <i class="link-icon" data-feather="user"></i>
          <span class="link-title">Account</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="account">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('/account/admin') }}" class="nav-link {{ request()->is('account/admin') ? 'active' : '' }}">Admin</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/account/merchant') }}" class="nav-link {{ request()->is('account/merchant') ? 'active' : '' }}">Merchant</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/account/user') }}" class="nav-link {{ request()->is('account/user') ? 'active' : '' }}">User</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ request()->is('product') ? 'active' : '' }}">
        <a href="{{ url('product') }}" class="nav-link">
          <i class="link-icon" data-feather="archive"></i>
          <span class="link-title">Product</span>
        </a>
      </li>
      <li class="nav-item {{ request()->is('advertise') ? 'active' : '' }}">
        <a href="{{ url('advertise') }}" class="nav-link">
          <i class="link-icon fas fa-ad"></i>
          <span class="link-title">Advertise</span>
        </a>
      </li>
      <li class="nav-item {{ request()->is('promotion/*') ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#promotion" role="button" aria-expanded="{{ request()->is('promotion/*') ? 'true' : 'false' }}" aria-controls="promotion">
          <i class="link-icon fas fa-money-bill-wave-alt"></i>
          <span class="link-title">Promotion</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse " id="promotion">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('/promotion/voucher') }}" class="nav-link {{ request()->is('promotion/voucher') ? 'active' : '' }}">Voucher</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/promotion/flash_sale') }}" class="nav-link {{ request()->is('promotion/flash_sale') ? 'active' : '' }}">Flash Sale</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ request()->is('transaction') ? 'active' : '' }}">
        <a href="{{ url('transaction') }}" class="nav-link">
          <i class="link-icon fas fa-shopping-cart"></i>
          <span class="link-title">Transaction </span>
        </a>
      </li>
      <li class="nav-item {{ request()->is('history') ? 'active' : '' }}">
        <a href="{{ url('history') }}" class="nav-link">
          <i class="link-icon fas fa-history"></i>
          <span class="link-title">History</span>
        </a>
      </li>
    </ul>
  </div>
</nav>