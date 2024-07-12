<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
    @include('admin.partials.header')

</head>

<body>

  <!-- ======= Header ======= -->
  @include('admin.body.navbar')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('admin.body.sidebar')
  <!-- End Sidebar-->

  @yield('admin')
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.body.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('admin.partials.footerFile')
</body>

</html>
