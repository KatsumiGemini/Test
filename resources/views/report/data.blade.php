<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Charts / ApexCharts - NiceAdmin Bootstrap Template</title>
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

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
        body {
            font-family: Arial, sans-serif;
        }
        .copy-btn, .download-btn {
            background-color: #4CAF50; /* Green background */
            color: white; /* White text */
            padding: 5px 10px; /* Padding */
            border: none; /* Remove borders */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer/hand icon */
            font-size: 14px; /* Adjust font size */
            display: flex;
            align-items: center;
            margin-right: 10px;
        }
        .copy-btn i, .download-btn i {
            margin-right: 5px; /* Space between icon and text */
        }
        .copy-btn:hover, .download-btn:hover {
            background-color: #45a049; /* Darker green on hover */
        }
        .card-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .buttons {
            display: flex;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>

@include('updown.headers')

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('dashboard') }}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
          <a class="nav-link  " data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-bar-chart"></i><span>Result</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="charts-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{route('report.data1')}}" class="">
                <i class="bi bi-circle"></i><span>Per Office</span>
              </a>
            </li>
            <li>
              <a href="{{route('report.data')}}" class="active">
                <i class="bi bi-circle"></i><span>Main Campus</span>
              </a>
            </li>
            <!-- <li>
              <a href="{{route('report.data2')}}">
                <i class="bi bi-circle"></i><span>University</span>
              </a>
            </li> -->
          </ul>
        </li><!-- End Charts Nav -->

        <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('report2')}}">
          <i class="bi bi-journal-text"></i>
          <span>Report</span>
        </a>
      </li>


  <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('user.user_account') }}">
          <i class="bi bi-person"></i>
          <span>User</span>
      </a>
  </li>

</aside>
 

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Personal Information and CC(Citizen Charter)</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Table</li>
          <li class="breadcrumb-item active">PI & CC</li>
        </ol>
      </nav>
    </div>
    <section class="section">
  <div class="row">
    
  <div class="col-lg-14">
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">
        Demographic Data  (PER OFFICE AND PER SERVICE)
    </h5>    
        <table>
        <thead>
            <tr>
          
                <th>Office User</th>
                <th>Client</th>
                <th>Sex</th>
                <th>Age</th>
                <th>Region</th>
                <th>Service</th>
                <th>CC One</th>
                <th>CC Two</th>
                <th>CC Three</th>
                <th>Suggestion</th>
                <th>Contact</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach($formData as $form)
                <tr>
            
                    <td>{{ $form->office_user_name }}</td> <!-- Display office user name -->
                    <td>{{ $form->client }}</td>
                    <td>{{ $form->sex }}</td>
                    <td>{{ $form->age }}</td>
                    <td>{{ $form->region }}</td>
                    <td>{{ $form->service }}</td>
                    <td>{{ $form->ccone }}</td>
                    <td>{{ $form->cctwo }}</td>
                    <td>{{ $form->ccthree }}</td>
                    <td>{{ $form->suggest }}</td>
                    <td>{{ $form->contact }}</td>
               
                </tr>
            @endforeach
        </tbody>
    </table>

        </div>
    </div>
</div>

    </div>
</div>
   
  </div>
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