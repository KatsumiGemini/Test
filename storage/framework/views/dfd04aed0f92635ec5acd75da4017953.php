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

</head>

<body>
<?php echo $__env->make('updown.headers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="<?php echo e(route('dashboard')); ?>">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
          <a class="nav-link " data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-bar-chart"></i><span>Result</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="charts-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
            <li>
              <a href="<?php echo e(route('report.data1')); ?>">
                <i class="bi bi-circle"></i><span>Per Office</span>
              </a>
            </li>
            <li>
              <a href="<?php echo e(route('report.data')); ?>" class="">
                <i class="bi bi-circle"></i><span>Main Campus</span>
              </a>
            </li>
            <!-- <li>
              <a href="<?php echo e(route('report.data2')); ?>" class="active">
                <i class="bi bi-circle"></i><span>University</span>
              </a>
            </li> -->
          </ul>
        </li><!-- End Charts Nav -->

        <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo e(route('report2')); ?>">
          <i class="bi bi-journal-text"></i>
          <span>Report</span>
        </a>
       </li>


  <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo e(route('user.user_account')); ?>">
          <i class="bi bi-person"></i>
          <span>User</span>
      </a>
  </li>

</aside>
 

<main id="main" class="main">

<div class="pagetitle">
  <h1>ECharts</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Charts</li>
      <li class="breadcrumb-item active">ECharts</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<p>ECharts Examples. You can check the <a href="https://echarts.apache.org/examples/en/index.html" target="_blank">official website</a> for more examples.</p>

<section class="section">
  <div class="row">

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Line Chart</h5>

          <!-- Line Chart -->
          <div id="lineChart" style="min-height: 400px;" class="echart"></div>

          <script>
            document.addEventListener("DOMContentLoaded", () => {
              echarts.init(document.querySelector("#lineChart")).setOption({
                xAxis: {
                  type: 'category',
                  data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
                },
                yAxis: {
                  type: 'value'
                },
                series: [{
                  data: [150, 230, 224, 218, 135, 147, 260],
                  type: 'line',
                  smooth: true
                }]
              });
            });
          </script>
          <!-- End Line Chart -->

        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Area Chart</h5>

          <!-- Area Chart -->
          <div id="areaChart" style="min-height: 400px;" class="echart"></div>

          <script>
            document.addEventListener("DOMContentLoaded", () => {
              echarts.init(document.querySelector("#areaChart")).setOption({
                xAxis: {
                  type: 'category',
                  boundaryGap: false,
                  data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
                },
                yAxis: {
                  type: 'value'
                },
                series: [{
                  data: [820, 932, 901, 934, 1290, 1330, 1320],
                  type: 'line',
                  smooth: true,
                  areaStyle: {}
                }]
              });
            });
          </script>
          <!-- End Area Chart -->

        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Bar Chart</h5>

          <!-- Bar Chart -->
          <div id="barChart" style="min-height: 400px;" class="echart"></div>

          <script>
            document.addEventListener("DOMContentLoaded", () => {
              echarts.init(document.querySelector("#barChart")).setOption({
                xAxis: {
                  type: 'category',
                  data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
                },
                yAxis: {
                  type: 'value'
                },
                series: [{
                  data: [120, 200, 150, 80, 70, 110, 130],
                  type: 'bar'
                }]
              });
            });
          </script>
          <!-- End Bar Chart -->

        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Vertical Bar Chart</h5>

          <!-- Vertical Bar Chart -->
          <div id="verticalBarChart" style="min-height: 400px;" class="echart"></div>

          <script>
            document.addEventListener("DOMContentLoaded", () => {
              echarts.init(document.querySelector("#verticalBarChart")).setOption({
                title: {
                  text: 'World Population'
                },
                tooltip: {
                  trigger: 'axis',
                  axisPointer: {
                    type: 'shadow'
                  }
                },
                legend: {},
                grid: {
                  left: '3%',
                  right: '4%',
                  bottom: '3%',
                  containLabel: true
                },
                xAxis: {
                  type: 'value',
                  boundaryGap: [0, 0.01]
                },
                yAxis: {
                  type: 'category',
                  data: ['Brazil', 'Indonesia', 'USA', 'India', 'China', 'World']
                },
                series: [{
                    name: '2011',
                    type: 'bar',
                    data: [18203, 23489, 29034, 104970, 131744, 630230]
                  },
                  {
                    name: '2012',
                    type: 'bar',
                    data: [19325, 23438, 31000, 121594, 134141, 681807]
                  }
                ]
              });
            });
          </script>
          <!-- End Vertical Bar Chart -->

        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Pie Chart</h5>

          <!-- Pie Chart -->
          <div id="pieChart" style="min-height: 400px;" class="echart"></div>

          <script>
            document.addEventListener("DOMContentLoaded", () => {
              echarts.init(document.querySelector("#pieChart")).setOption({
                title: {
                  text: 'Referer of a Website',
                  subtext: 'Fake Data',
                  left: 'center'
                },
                tooltip: {
                  trigger: 'item'
                },
                legend: {
                  orient: 'vertical',
                  left: 'left'
                },
                series: [{
                  name: 'Access From',
                  type: 'pie',
                  radius: '50%',
                  data: [{
                      value: 1048,
                      name: 'Search Engine'
                    },
                    {
                      value: 735,
                      name: 'Direct'
                    },
                    {
                      value: 580,
                      name: 'Email'
                    },
                    {
                      value: 484,
                      name: 'Union Ads'
                    },
                    {
                      value: 300,
                      name: 'Video Ads'
                    }
                  ],
                  emphasis: {
                    itemStyle: {
                      shadowBlur: 10,
                      shadowOffsetX: 0,
                      shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                  }
                }]
              });
            });
          </script>
          <!-- End Pie Chart -->

        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Donut Chart</h5>

          <!-- Donut Chart -->
          <div id="donutChart" style="min-height: 400px;" class="echart"></div>

          <script>
            document.addEventListener("DOMContentLoaded", () => {
              echarts.init(document.querySelector("#donutChart")).setOption({
                tooltip: {
                  trigger: 'item'
                },
                legend: {
                  top: '5%',
                  left: 'center'
                },
                series: [{
                  name: 'Access From',
                  type: 'pie',
                  radius: ['40%', '70%'],
                  avoidLabelOverlap: false,
                  label: {
                    show: false,
                    position: 'center'
                  },
                  emphasis: {
                    label: {
                      show: true,
                      fontSize: '18',
                      fontWeight: 'bold'
                    }
                  },
                  labelLine: {
                    show: false
                  },
                  data: [{
                      value: 1048,
                      name: 'Search Engine'
                    },
                    {
                      value: 735,
                      name: 'Direct'
                    },
                    {
                      value: 580,
                      name: 'Email'
                    },
                    {
                      value: 484,
                      name: 'Union Ads'
                    },
                    {
                      value: 300,
                      name: 'Video Ads'
                    }
                  ]
                }]
              });
            });
          </script>
          <!-- End Donut Chart -->

        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Radar Chart</h5>

          <!-- Radar Chart -->
          <div id="radarChart" style="min-height: 400px;" class="echart"></div>

          <script>
            document.addEventListener("DOMContentLoaded", () => {
              echarts.init(document.querySelector("#radarChart")).setOption({
                legend: {
                  data: ['Allocated Budget', 'Actual Spending']
                },
                radar: {
                  // shape: 'circle',
                  indicator: [{
                      name: 'Sales',
                      max: 6500
                    },
                    {
                      name: 'Administration',
                      max: 16000
                    },
                    {
                      name: 'Information Technology',
                      max: 30000
                    },
                    {
                      name: 'Customer Support',
                      max: 38000
                    },
                    {
                      name: 'Development',
                      max: 52000
                    },
                    {
                      name: 'Marketing',
                      max: 25000
                    }
                  ]
                },
                series: [{
                  name: 'Budget vs spending',
                  type: 'radar',
                  data: [{
                      value: [4200, 3000, 20000, 35000, 50000, 18000],
                      name: 'Allocated Budget'
                    },
                    {
                      value: [5000, 14000, 28000, 26000, 42000, 21000],
                      name: 'Actual Spending'
                    }
                  ]
                }]
              });
            });
          </script>
          <!-- End Radar Chart -->

        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Polar Area Chart</h5>

          <!-- Polar Area Chart -->
          <div id="polarAreaChart" style="min-height: 400px;" class="echart"></div>

          <script>
            document.addEventListener("DOMContentLoaded", () => {
              echarts.init(document.querySelector("#polarAreaChart")).setOption({
                angleAxis: {
                  type: 'category',
                  data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
                },
                radiusAxis: {},
                polar: {},
                series: [{
                    type: 'bar',
                    data: [1, 2, 3, 4, 3, 5, 1],
                    coordinateSystem: 'polar',
                    name: 'A',
                    stack: 'a',
                    emphasis: {
                      focus: 'series'
                    }
                  },
                  {
                    type: 'bar',
                    data: [2, 4, 6, 1, 3, 2, 1],
                    coordinateSystem: 'polar',
                    name: 'B',
                    stack: 'a',
                    emphasis: {
                      focus: 'series'
                    }
                  },
                  {
                    type: 'bar',
                    data: [1, 2, 3, 4, 1, 2, 5],
                    coordinateSystem: 'polar',
                    name: 'C',
                    stack: 'a',
                    emphasis: {
                      focus: 'series'
                    }
                  }
                ],
                legend: {
                  show: true,
                  data: ['A', 'B', 'C']
                }
              });
            });
          </script>
          <!-- End Polar Area Chart -->

        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Candle Stick Chart</h5>

          <!-- Candle Stick Chart -->
          <div id="candleStickChart" style="min-height: 400px;" class="echart"></div>

          <script>
            document.addEventListener("DOMContentLoaded", () => {
              echarts.init(document.querySelector("#candleStickChart")).setOption({
                xAxis: {
                  data: ['2017-10-24', '2017-10-25', '2017-10-26', '2017-10-27']
                },
                yAxis: {},
                series: [{
                  type: 'candlestick',
                  data: [
                    [20, 34, 10, 38],
                    [40, 35, 30, 50],
                    [31, 38, 33, 44],
                    [38, 15, 5, 42]
                  ]
                }]
              });
            });
          </script>
          <!-- End Candle Stick Chart -->

        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Bubble Chart</h5>

          <!-- Bubble Chart -->
          <div id="bubbleChart" style="min-height: 400px;" class="echart"></div>

          <script>
            document.addEventListener("DOMContentLoaded", () => {
              const data = [
                [
                  [28604, 77, 17096869, 'Australia', 1990],
                  [31163, 77.4, 27662440, 'Canada', 1990],
                  [1516, 68, 1154605773, 'China', 1990],
                  [13670, 74.7, 10582082, 'Cuba', 1990],
                  [28599, 75, 4986705, 'Finland', 1990],
                  [29476, 77.1, 56943299, 'France', 1990],
                  [31476, 75.4, 78958237, 'Germany', 1990],
                  [28666, 78.1, 254830, 'Iceland', 1990],
                  [1777, 57.7, 870601776, 'India', 1990],
                  [29550, 79.1, 122249285, 'Japan', 1990],
                  [2076, 67.9, 20194354, 'North Korea', 1990],
                  [12087, 72, 42972254, 'South Korea', 1990],
                  [24021, 75.4, 3397534, 'New Zealand', 1990],
                  [43296, 76.8, 4240375, 'Norway', 1990],
                  [10088, 70.8, 38195258, 'Poland', 1990],
                  [19349, 69.6, 147568552, 'Russia', 1990],
                  [10670, 67.3, 53994605, 'Turkey', 1990],
                  [26424, 75.7, 57110117, 'United Kingdom', 1990],
                  [37062, 75.4, 252847810, 'United States', 1990]
                ],
                [
                  [44056, 81.8, 23968973, 'Australia', 2015],
                  [43294, 81.7, 35939927, 'Canada', 2015],
                  [13334, 76.9, 1376048943, 'China', 2015],
                  [21291, 78.5, 11389562, 'Cuba', 2015],
                  [38923, 80.8, 5503457, 'Finland', 2015],
                  [37599, 81.9, 64395345, 'France', 2015],
                  [44053, 81.1, 80688545, 'Germany', 2015],
                  [42182, 82.8, 329425, 'Iceland', 2015],
                  [5903, 66.8, 1311050527, 'India', 2015],
                  [36162, 83.5, 126573481, 'Japan', 2015],
                  [1390, 71.4, 25155317, 'North Korea', 2015],
                  [34644, 80.7, 50293439, 'South Korea', 2015],
                  [34186, 80.6, 4528526, 'New Zealand', 2015],
                  [64304, 81.6, 5210967, 'Norway', 2015],
                  [24787, 77.3, 38611794, 'Poland', 2015],
                  [23038, 73.13, 143456918, 'Russia', 2015],
                  [19360, 76.5, 78665830, 'Turkey', 2015],
                  [38225, 81.4, 64715810, 'United Kingdom', 2015],
                  [53354, 79.1, 321773631, 'United States', 2015]
                ]
              ];
              echarts.init(document.querySelector("#bubbleChart")).setOption({
                legend: {
                  right: '10%',
                  top: '3%',
                  data: ['1990', '2015']
                },
                grid: {
                  left: '8%',
                  top: '10%'
                },
                xAxis: {
                  splitLine: {
                    lineStyle: {
                      type: 'dashed'
                    }
                  }
                },
                yAxis: {
                  splitLine: {
                    lineStyle: {
                      type: 'dashed'
                    }
                  },
                  scale: true
                },
                series: [{
                    name: '1990',
                    data: data[0],
                    type: 'scatter',
                    symbolSize: function(data) {
                      return Math.sqrt(data[2]) / 5e2;
                    },
                    emphasis: {
                      focus: 'series',
                      label: {
                        show: true,
                        formatter: function(param) {
                          return param.data[3];
                        },
                        position: 'top'
                      }
                    },
                    itemStyle: {
                      color: 'rgb(251, 118, 123)'
                    }
                  },
                  {
                    name: '2015',
                    data: data[1],
                    type: 'scatter',
                    symbolSize: function(data) {
                      return Math.sqrt(data[2]) / 5e2;
                    },
                    emphasis: {
                      focus: 'series',
                      label: {
                        show: true,
                        formatter: function(param) {
                          return param.data[3];
                        },
                        position: 'top'
                      }
                    },
                    itemStyle: {
                      color: 'rgb(129, 227, 238)'
                    }
                  }
                ]
              });
            });
          </script>
          <!-- End Bubble Chart -->

        </div>
      </div>
    </div>

  </div>
</section>

</main><!-- End #main -->
<?php echo $__env->make('updown.footers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

</html><?php /**PATH C:\Users\Kathrina Libres\CSM\resources\views/report/data2.blade.php ENDPATH**/ ?>