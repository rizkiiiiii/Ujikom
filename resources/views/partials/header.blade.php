<header style="position: fixed; right: 0; left: 0; top: 0; z-index: 999;">
  <div class="main_nav_container">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-right">
          <div class="logo_container">
            <a href="/">GC<span>ars</span></a>
          </div>
          <nav class="navbar">
            <ul class="navbar_menu">
              <li>
                <a href="/">home</a>
              </li>
              <li>
                <a href="/mobil">mobil</a>
              </li>
              <li>
                <a href="/merek">merek</a>
              </li>
              @auth
                <li>
                  <a href="/pesanan">Pesanan</a>
                </li>
                <li>
                  <a href="/user/{{ auth()->user()->username }}" title="Profil">
                    <i class="fa fa-user" aria-hidden="true"></i> Profil
                  </a>
                </li>
              @else
                <li>
                  <a href="/login">login/daftar</a>
                </li>
              @endauth
            </ul>
            <div class="hamburger_container">
              <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="fs_menu_overlay"></div>
<div class="hamburger_menu">
  <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
  <div class="hamburger_menu_content text-right">
    <ul class="menu_top_nav">
      <li class="menu_item"><a href="/">home</a></li>
      <li class="menu_item"><a href="/mobil">mobil</a></li>
      <li class="menu_item"><a href="/merek">merek</a></li>
      @auth
        <li>
          <a href="/user/{{ auth()->user()->username }}" title="Profil">
            <i class="fa fa-user" aria-hidden="true"></i> Profil
          </a>
        </li>
      @else
        <li>
          <a href="/login">login/daftar</a>
        </li>
      @endauth
    </ul>
  </div>
</div>