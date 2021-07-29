@include('admin.layouts.style')
  <!-- Sidenav -->
  @include('admin.layouts.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('admin.layouts.topbar')
    <!-- Header -->
    <!-- Header -->
    @include('admin.layouts.header')
    @yield('content')
    
      <!-- Footer -->
      @include('admin.layouts.footer')
  <!-- Argon Scripts -->
  <!-- Core -->
 @include('admin.layouts.script')
