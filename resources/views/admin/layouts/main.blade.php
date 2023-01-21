<!DOCTYPE html>
<html lang="id">
  <head>
    @include('admin.partials.topscript')
    <title>GCars Admin | {{ $title }}</title>
  </head>
  <body>
    <div id="app">
      <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        {{-- Navbar --}}
        @include('admin.partials.navbar')
        {{-- End Navbar --}}
        
        {{-- Sidebar --}}
        @include('admin.partials.sidebar')
        {{-- End Sidebar --}}

        {{-- Main Content --}}
        <div class="main-content" style="min-height: 572px;">
          <div class="container">
            <section class="section">
              <div class="section-header">
                <h1>GCars Admin | {{ $title }} </h1>
              </div>
            </section>
            @yield('content')
          </div>
        </div>
        {{-- End Main Content --}}
        
        <footer class="main-footer">
          <div class="footer-left">
            Gcars Admin <div class="bullet"></div>
          </div>
          <div class="footer-right">
          </div>
        </footer>
      </div>
    </div>
    @include('admin.partials.bottomscript')
    @yield('personalscript')
  </body>
</html>