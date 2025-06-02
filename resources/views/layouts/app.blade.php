<!doctype html>
<html lang="en">
  <!--begin::Head-->
  @include('layouts.partials.header')
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      @include('layouts.partials.navbar')
      <!--end::Header-->


      <!--begin::Sidebar-->
       @include('layouts.partials.sidebar')
      <!--end::Sidebar-->


      <!--begin::App Main-->
      <main class="app-main">
        @yield('content')
      </main>
      <!--end::App Main-->


      <!--begin::Footer-->
      @include('layouts.partials.footer')
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->

    <!--begin::Script-->
   @include('layouts.partials.scripts')
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
