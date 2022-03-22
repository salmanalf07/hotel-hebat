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
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .carousel-inner {
      width: 100%;
      height: 65vh;
    }

    .carousel {
      width: 100%;
      height: 65vh;
    }

    .w-100 {
      width: 100% !important;
      height: 70vh;
      object-fit: cover;
    }

    /* .carousel-item {
      width: 100%;
      height: 100%;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: contain;
      background-position: center;
      object-fit: contain;
    } */

    .carousel-control-prev-icon {
      margin-top: 50px;
    }

    .carousel-control-next-icon {
      margin-top: 50px;
    }

    .carousel-control-next-icon {
      width: 50px;
      height: 50px;
      padding: 8px;
      border-radius: 50%;
      background-color: black;
      opacity: 0.6;
    }

    .carousel-control-prev-icon {
      width: 50px;
      height: 50px;
      padding: 8px;
      border-radius: 50%;
      background-color: black;
      opacity: 0.6;
    }


    @media only screen and (min-device-width : 600px) {
      .pesan {
        margin-top: 10px;

      }


    }
  </style>
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
        <span class=" d-lg-block">Hotel Hebat</span>
      </a>
      <!-- <i class="bi bi-list toggle-sidebar-btn"></i> -->
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <nav style="--bs-breadcrumb-divider: '|'; margin-right: 30px; margin-top: 30px;">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="{{ request()->is('home') ? 'activ' : ''}}" href="home">Home</a></li>
            <li class="breadcrumb-item"><a class="{{ request()->is('room') ? 'activ' : ''}}" href="room">Kamar</a></li>
            <li class="breadcrumb-item"><a class="{{ request()->is('fasility') ? 'activ' : ''}}" href="fasility">Fasilitas</a></li>
          </ol>
        </nav>

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  @yield('konten')

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>