<!DOCTYPE html>
<html lang="en">

<head>
  @include('backend/include/head')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
  @if (Session::has('message'))
  <script>
    swal("Message", "{{Session::get('message') }}",'success',{
      button::true,
      button:"OK",
      dangerMode:true,
    });
  </script>
  @endif
  @include('sweetalert::alert')
</body>

</html>

