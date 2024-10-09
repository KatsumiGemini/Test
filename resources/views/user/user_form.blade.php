<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Users / Profile - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
        body {
            padding: 20px;
        }
        .form-section {
            margin-bottom: 30px;
        }
        .big-radio {
  width: 20px;
  height: 20px;
}

    </style>

</head>

<body>

@include('updown.user_header')

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">


<li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user.user_interface') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

       <li class="nav-item">
        <a class="nav-link" href="{{ route('user.user_form') }}">
          <i class="bi bi-journal-text"></i>
          <span>Satisfaction</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('user.qrgenerate')}}">
          <i class="bi bi-journal-text"></i>
          <span>Form</span>
        </a>
      </li>
</aside>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Form Submitted</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('user.user_interface')}}">Home</a></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item active">Satisfaction</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
    
  <section class="section">
  <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Submitted</h5>

              <table class="table datatable">
              <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Client</th>
                        <th scope="col">Sex</th>
                        <th scope="col">Age</th>
                        <th scope="col">Region</th>
                        <th scope="col">Service</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Date Submitted</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($formData as $form)
                        <tr>
                            <th scope="row">{{ $form->id }}</th>
                            <td>{{ $form->client }}</td>
                            <td>{{ $form->sex }}</td>
                            <td>{{ $form->age }}</td>
                            <td>{{ $form->region }}</td>
                            <td>{{ $form->service }}</td>
                            <td>{{ $form->contact }}</td>
                            <td>{{ $form->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>

              </table>


  </section>
</main><!-- End #main -->
@include('updown.footers')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  

</body>

</html>