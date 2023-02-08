<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="/admin">GCars Admin</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="/admin">GC</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="{{ request()->is('admin') ? 'active' : '' }}">
        <a href="/admin" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="menu-header">Kelola Data</li>
      <li class="{{ request()->is('admin/merek') || request()->is('admin/merek/*') ? 'active' : '' }}">
        <a href="{{ route('merek.index') }}" class="nav-link">
          <i class="fas fa-tag"></i><span>Data Merek</span>
        </a>
      </li>
      <li class="{{ request()->is('admin/mobil') || request()->is('admin/mobil/*') ? 'active' : '' }}">
        <a href="/admin/mobil" class="nav-link">
          <i class="fas fa-car"></i><span>Data Mobil</span>
        </a>
      </li>
      <li class="{{ request()->is('admin/pemesanan') || request()->is('admin/pemesanan/*') ? 'active' : '' }}">
        <a href="/admin/pemesanan" class="nav-link">
          <i class="fas fa-money-check-alt"></i><span>Data Pemesanan</span>
        </a>
      </li>
      <li class="{{ request()->is('admin/laporan') || request()->is('admin/laporan/*') ? 'active' : '' }}">
        <a href="/admin/laporan" class="nav-link">
          <i class="fas fa-money-check-alt"></i><span>Laporan</span>
        </a>
      </li>
      <li class="menu-header">Logout</li>
      <li>
        <a href="#" class="nav-link" id="logout-btn">
          <i class="fas fa-sign-out-alt"></i><span>Logout</span>
        </a>
      </li>
    </ul>
  </aside>
</div>

<form action="{{ route('logout') }}" method="POST" id="logout-form" hidden>
  @csrf
</form>

<script>
  document.getElementById('logout-btn').addEventListener('click', () => {
    document.getElementById('logout-form').submit();
  });
</script>