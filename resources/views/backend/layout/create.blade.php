<!DOCTYPE html>
<html lang="en">

<head>
  @include('backend/include/head')
</head>
<body>
  <div class="container-scroller">
    @include('backend/include/navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      @include('backend/include/settings')
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @include('backend/include/_sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            @yield('konten')
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('backend/include/footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  {{-- LOADED SCRIPT --}}
  @include('backend/include/foot')
  <!-- End custom js for this page-->
</body>

</html>

