<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hotel</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .breadcrumb .activ {
      color: #495d83;
    }
  </style>

</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="home" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">Hotel Hebat</span>
      </a>
      <!-- <i class="bi bi-list toggle-sidebar-btn"></i> -->
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
        <nav style="--bs-breadcrumb-divider: '|'; margin-right: 30px; margin-top: 30px;">
          <ol class="breadcrumb" style="padding:3px">
            <li class="breadcrumb-item "><a class="{{ request()->is('dashboard') ? 'activ' : ''}}" href="dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a class="{{ request()->is('rooms') ? 'activ' : ''}}" href="rooms">Kamar</a></li>
            <li class="breadcrumb-item"><a class="{{ request()->is('facilities-room') ? 'activ' : ''}}" href="facilities-room">Fasilitas Kamar</a></li>
            <li class="breadcrumb-item"><a class="{{ request()->is('facilities-hotel') ? 'activ' : ''}}" href="facilities-hotel">Fasilitas Hotel</a></li>
          </ol>
        </nav>

        <nav style="--bs-breadcrumb-divider: '|'; margin-right: 30px; margin-top: 30px;">
          <ol class="breadcrumb" style="padding:3px">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit(); " role="button">
                  {{ __('Log Out') }}
                </a>
              </form>
            </li>
          </ol>
        </nav>


      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  @yield('konten')

  <!-- Vendor JS Files -->
  <script src="assets/js/jquery-3.5.1.js"></script>
  <script src="assets/js/jquery.dataTables.min.js"></script>
  <script src="assets/js/dataTables.dateTime.min.js"></script>
  <script src="assets/js/moment.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>