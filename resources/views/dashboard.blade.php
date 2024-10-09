<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
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
</head>

<body>

@include('updown.headers')

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
              <a class="nav-link collapsed " data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Result</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                  <a href="{{route('report.data1')}}">
                    <i class="bi bi-circle"></i><span>Per Office</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('report.data')}}" class="">
                    <i class="bi bi-circle"></i><span> Main Campus</span>
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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Sales<span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>145</h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Form<span> | All</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-hand-thumbs-up"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$form}}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">User</a></li>
                    <li><a class="dropdown-item" href="#">Sub-Admin</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Users<span>| Offices</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $usersCount }}</h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->  
        </div><!-- End Right side columns -->

      </div>
      <div class="col-lg-12">
          <div class="card">
          <div class="card-body">
  <h5 class="card-title">Select Year</h5>
  <select id="yearSelect" class="form-select">
    <option value="2023">2023</option>
    <option value="2024">2024</option>
    <option value="2025">2025</option>
    <!-- Add more years as needed -->
  </select>
</div>

                      <div id="columnChart"></div>
                      <script>
  document.addEventListener("DOMContentLoaded", () => {
    // Initial data for 2023
    const data = {
      '2023': {
        positive: [20, 30, 25, 40, 35, 50, 55, 60, 70, 65, 80, 90],
        neutral: [10, 20, 15, 10, 25, 20, 30, 20, 25, 30, 20, 15],
        negative: [5, 3, 4, 6, 5, 2, 3, 4, 2, 1, 3, 5]
      },
      '2024': {
        positive: [30, 40, 35, 50, 45, 60, 65, 70, 80, 75, 90, 100],
        neutral: [15, 25, 20, 15, 30, 25, 35, 25, 30, 35, 25, 20],
        negative: [4, 2, 3, 5, 4, 1, 2, 3, 1, 0, 2, 4]
      },

      '2025': {
        positive: [50, 40, 35, 50, 90, 60, 65, 70, 80, 75, 90, 100],
        neutral: [15, 25, 20, 15, 40, 45, 35, 90, 30, 35, 25, 20],
        negative: [10, 5, 3, 5, 4, 1, 4, 3, 1, 0, 2, 4]
      },
      // Add more years as needed
    };

    const chart = new ApexCharts(document.querySelector("#columnChart"), {
      series: [{
        name: 'Positive Feedback',
        data: data['2023'].positive
      }, {
        name: 'Neutral Feedback',
        data: data['2023'].neutral
      }, {
        name: 'Negative Feedback',
        data: data['2023'].negative
      }],
      chart: {
        type: 'bar',
        height: 350
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '55%',
          endingShape: 'rounded'
        },
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      },
      yaxis: {
        title: {
          text: 'Feedback Count'
        }
      },
      fill: {
        opacity: 1
      },
      tooltip: {
        y: {
          formatter: function(val) {
            return val + " Feedback"
          }
        }
      }
    });

    chart.render();

    // Event listener for year selection
    document.getElementById('yearSelect').addEventListener('change', function() {
      const selectedYear = this.value;
      chart.updateSeries([{
        name: 'Positive Feedback',
        data: data[selectedYear].positive
      }, {
        name: 'Neutral Feedback',
        data: data[selectedYear].neutral
      }, {
        name: 'Negative Feedback',
        data: data[selectedYear].negative
      }]);
    });
  });
</script>
              <!-- End Column Chart -->
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