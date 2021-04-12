<nav class="sidebar">
  <div class="sidebar-header">
    <a href="{{route('home')}}" class="sidebar-brand">
      <img src="{{ asset('kapalasar.png') }}" alt="logo" width="122.5" height="30">
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
      @if(auth()->user()->roles->name == 'Super Admin')
      <li class="nav-item {{ request()->is('account/*') ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#account" role="button" aria-expanded="{{ request()->is('account/*') ? 'true' : 'false' }}" aria-controls="account">
          <i class="link-icon" data-feather="user"></i>
          <span class="link-title">Account</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ request()->is('account/*') ? 'show' : '' }}" id="account">
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
      @endif
      @if(auth()->user()->roles->name == 'Super Admin' || auth()->user()->roles->name == 'Admin')
      <li class="nav-item {{ request()->is('product/*') ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#product" role="button" aria-expanded="{{ request()->is('product/*') ? 'true' : 'false' }}" aria-controls="product">
          <i class="link-icon" data-feather="archive"></i>
          <span class="link-title">Product</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ request()->is('product/*') ? 'show' : '' }}" id="product">
          <ul class="nav sub-menu">
            {{-- <li class="nav-item">
              <a href="{{ url('/product/category') }}" class="nav-link {{ request()->is('product/category') ? 'active' : '' }}">Category</a>
            </li> --}}
            <li class="nav-item">
              <a href="{{ url('/product/item') }}" class="nav-link {{ request()->is('product/item') ? 'active' : '' }}">Item</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ request()->is('banner') ? 'active' : '' }}">
        <a href="{{ url('banner') }}" class="nav-link">
          <i class="link-icon far fa-ad"></i>
          <span class="link-title">Advertisement</span>
        </a>
      </li>
      <li class="nav-item {{ request()->is('promotion/*') ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#promotion" role="button" aria-expanded="{{ request()->is('promotion/*') ? 'true' : 'false' }}" aria-controls="promotion">
          <i class="link-icon far fa-money-bill-wave-alt"></i>
          <span class="link-title">Promotion</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ request()->is('promotion/*') ? 'show' : '' }}" id="promotion">
          <ul class="nav sub-menu">
            {{-- <li class="nav-item">
              <a href="{{ url('/promotion/type') }}" class="nav-link {{ request()->is('promotion/type') ? 'active' : '' }}">Tipe Voucher</a>
            </li> --}}
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
          <i class="link-icon" data-feather="shopping-cart"></i>
          <span class="link-title">Transaction </span>
        </a>
      </li>
      <li class="nav-item {{ request()->is('history') ? 'active' : '' }}">
        <a href="{{ url('history') }}" class="nav-link">
          <i class="link-icon fas fa-history"></i>
          <span class="link-title">History</span>
        </a>
      </li>
      <li class="nav-item {{ request()->is('mail/*') ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#mail" role="button" aria-expanded="{{ request()->is('mail/*') ? 'true' : 'false' }}" aria-controls="mail">
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">Mail</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ request()->is('mail/*') ? 'show' : '' }}" id="mail">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('/mail/usermail') }}" class="nav-link {{ request()->is('mail/usermail') ? 'active' : '' }}">Mail User</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/mail/blastmail') }}" class="nav-link {{ request()->is('mail/blastmail') ? 'active' : '' }}">Blast Mail</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/mail/history') }}" class="nav-link {{ request()->is('mail/history') ? 'active' : '' }}">Mail Sent</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ request()->is('push') ? 'active' : '' }}">
        <a href="{{ url('push') }}" class="nav-link">
          <i class="link-icon" data-feather="send"></i>
          <span class="link-title">Push Notification</span>
        </a>
      </li>
      @endif
      <li class="nav-item {{ request()->is('catalog') ? 'active' : '' }}">
        <a href="{{ url('catalog') }}" class="nav-link">
          <i class="link-icon" data-feather="file"></i>
          <span class="link-title">Catalog</span>
        </a>
      </li>
    </ul>
  </div>
</nav>