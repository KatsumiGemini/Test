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
        /* table, th, td {
            border: 1px solid black;
            padding: 8px;
        } */
        th {
            background-color: #f2f2f2;
        }
        .text-center {
            text-align: center;
        }
        
    </style>
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
              <a href="<?php echo e(route('report.data1')); ?>" class="active">
                <i class="bi bi-circle"></i><span>Per Office</span>
              </a>
            </li>
            <li>
              <a href="<?php echo e(route('report.data')); ?>" class="">
                <i class="bi bi-circle"></i><span>Main Campus </span>
              </a>
            </li>
            <!-- <li>
              <a href="<?php echo e(route('report.data2')); ?>">
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
  <h1>Per Office Summary</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Result</li>
      <li class="breadcrumb-item active">Per Office</li>
    </ol>
  </nav>
</div><!-- End Page Title -->


<p>Per Offices and Summary</p>

       <div class="mb-2">
              <select class="form-control" id="name" name="name">
              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option><?php echo e($user->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <option>SQD 0 All Offices</option>
                <option>SQD 1-8 Summary</option>
              </select>
            
        </div>

<div id="success-message" class="alert alert-success alert-dismissible fade show" style="display: none;">
                          Table copied to clipboard
                    </div>
                    
<section class="section">
  <div class="row">
    
  <div class="col-lg-14">
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">
        SQD 0 All Offices 
        <div class="buttons">
        <button class="copy-btn" id="copyBtn" onclick="copyTable('sqdTable')">
    <i class="bi bi-clipboard"></i> COPY
</button>
<button class="download-btn" id="downloadBtn" onclick="downloadCSV('sqdTable')">
    <i class="bi bi-file-earmark-arrow-down"></i> DOWNLOAD CSV
</button>
        </div>
    </h5>    
            <table class="table table-sm" id="sqdTable">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Strongly Agree</th>
                        <th scope="col">Agree</th>
                        <th scope="col">Neither Agree nor Disagree</th>
                        <th scope="col">Disagree</th>
                        <th scope="col">Strongly Disagree</th>
                        <th scope="col">N/A</th>
                        <th scope="col">Total Response</th>
                        <th scope="col">Overall</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $offices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($office->office_name); ?></td>
                            <td class="text-center"><?php echo e($office->strongly_agree); ?></td>
                            <td class="text-center"><?php echo e($office->agree); ?></td>
                            <td class="text-center"><?php echo e($office->neutral); ?></td>
                            <td class="text-center"><?php echo e($office->disagree); ?></td>
                            <td class="text-center"><?php echo e($office->strongly_disagree); ?></td>
                            <td class="text-center"><?php echo e($office->na); ?></td>
                            <td class="text-center"><?php echo e($office->total_responses); ?></td>
                            <td class="text-center"><?php echo e(number_format($office->overall_rating_percentage, 2)); ?>%</td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td><strong>Overall</strong></td>
                          <td class="text-center"><?php echo e($overall->total_strongly_agree); ?></td>
                          <td class="text-center"><?php echo e($overall->total_agree); ?></td>
                          <td class="text-center"><?php echo e($overall->total_neutral); ?></td>
                          <td class="text-center"><?php echo e($overall->total_disagree); ?></td>
                          <td class="text-center"><?php echo e($overall->total_strongly_disagree); ?></td>
                          <td class="text-center"><?php echo e($overall->total_na); ?></td>
                          <td class="text-center"><?php echo e($overall->total_responses); ?></td>
                          <td class="text-center"><?php echo e(number_format($overall->overall_rating_percentage, 2)); ?>%</td>
                       
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <?php
        // Initialize accumulators for overall totals across all offices
        $all_offices_totals = [
            'strongly_agree' => 0,
            'agree' => 0,
            'neutral' => 0,
            'disagree' => 0,
            'strongly_disagree' => 0,
            'na' => 0,
            'total_responses' => 0,
            'overall_percentage' => 0
        ];
    ?>

    <?php $__currentLoopData = $offices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-lg-14">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">SQD 1-8 <?php echo e($office->office_name); ?> 
                <div class="buttons">
              <button class="copy-btn" id="copyBtn" onclick="copyTable('sqdTable-<?php echo e($office->office_id); ?>')">
                <i class="bi bi-clipboard"></i> COPY
              </button>
              <button class="download-btn" id="downloadBtn" onclick="downloadCSV('sqdTable-<?php echo e($office->office_id); ?>')">
                <i class="bi bi-file-earmark-arrow-down"></i> DOWNLOAD CSV
              </button>
            </div>
                </h5>
                <!-- Small tables -->
                <table class="table table-sm" id="sqdTable-<?php echo e($office->office_id); ?>">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Strongly Agree</th>
                            <th scope="col">Agree</th>
                            <th scope="col">Neither Agree nor Disagree</th>
                            <th scope="col">Disagree</th>
                            <th scope="col">Strongly Disagree</th>
                            <th scope="col">N/A</th>
                            <th scope="col">Total Response</th>
                            <th scope="col">Overall</th>
                        </tr>
                    </thead>
                    <tbody>
                          <?php
                              $categories = [
                                  ['label' => 'Responsiveness', 'prefix' => 'sqdone'],
                                  ['label' => 'Reliability', 'prefix' => 'sqdtwo'],
                                  ['label' => 'Access and Facilities', 'prefix' => 'sqdthree'],
                                  ['label' => 'Communication', 'prefix' => 'sqdfour'],
                                  ['label' => 'Costs', 'prefix' => 'sqdfive'],
                                  ['label' => 'Integrity', 'prefix' => 'sqdsix'],
                                  ['label' => 'Assurance', 'prefix' => 'sqdseven'],
                                  ['label' => 'Outcome', 'prefix' => 'sqdeight'],
                              ];

                              // Initialize accumulators for overall totals for this office
                              $overall_totals = [
                                  'strongly_agree' => 0,
                                  'agree' => 0,
                                  'neutral' => 0,
                                  'disagree' => 0,
                                  'strongly_disagree' => 0,
                                  'na' => 0,
                                  'total_responses' => 0,
                                  'overall_percentage' => 0
                              ];
                          ?>

                          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                  <td><?php echo e($category['label']); ?></td>
                                  <td class="text-center"><?php echo e($office->{$category['prefix'] . '_strongly_agree'}); ?></td>
                                  <td class="text-center"><?php echo e($office->{$category['prefix'] . '_agree'}); ?></td>
                                  <td class="text-center"><?php echo e($office->{$category['prefix'] . '_neutral'}); ?></td>
                                  <td class="text-center"><?php echo e($office->{$category['prefix'] . '_disagree'}); ?></td>
                                  <td class="text-center"><?php echo e($office->{$category['prefix'] . '_strongly_disagree'}); ?></td>
                                  <td class="text-center"><?php echo e($office->{$category['prefix'] . '_na'}); ?></td>
                                  <td class="text-center"><?php echo e($office->{$category['prefix'] . '_total_responses'}); ?></td>
                                  <td class="text-center"><?php echo e(number_format($office->{$category['prefix'] . '_overall_rating_percentage'}, 2)); ?>%</td>
                              </tr>

                              <?php
                                  // Accumulate totals for overall row for this office
                                  $overall_totals['strongly_agree'] += $office->{$category['prefix'] . '_strongly_agree'};
                                  $overall_totals['agree'] += $office->{$category['prefix'] . '_agree'};
                                  $overall_totals['neutral'] += $office->{$category['prefix'] . '_neutral'};
                                  $overall_totals['disagree'] += $office->{$category['prefix'] . '_disagree'};
                                  $overall_totals['strongly_disagree'] += $office->{$category['prefix'] . '_strongly_disagree'};
                                  $overall_totals['na'] += $office->{$category['prefix'] . '_na'};
                                  $overall_totals['total_responses'] += $office->{$category['prefix'] . '_total_responses'};
                                  $overall_totals['overall_percentage'] += $office->{$category['prefix'] . '_overall_rating_percentage'};

                                  // Accumulate totals for all offices
                                  $all_offices_totals['strongly_agree'] += $office->{$category['prefix'] . '_strongly_agree'};
                                  $all_offices_totals['agree'] += $office->{$category['prefix'] . '_agree'};
                                  $all_offices_totals['neutral'] += $office->{$category['prefix'] . '_neutral'};
                                  $all_offices_totals['disagree'] += $office->{$category['prefix'] . '_disagree'};
                                  $all_offices_totals['strongly_disagree'] += $office->{$category['prefix'] . '_strongly_disagree'};
                                  $all_offices_totals['na'] += $office->{$category['prefix'] . '_na'};
                                  $all_offices_totals['total_responses'] += $office->{$category['prefix'] . '_total_responses'};
                                  $all_offices_totals['overall_percentage'] += $office->{$category['prefix'] . '_overall_rating_percentage'};
                              ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          <tr>
                              <td><strong>Overall</strong></td>
                              <td class="text-center"><?php echo e($overall_totals['strongly_agree']); ?></td>
                              <td class="text-center"><?php echo e($overall_totals['agree']); ?></td>
                              <td class="text-center"><?php echo e($overall_totals['neutral']); ?></td>
                              <td class="text-center"><?php echo e($overall_totals['disagree']); ?></td>
                              <td class="text-center"><?php echo e($overall_totals['strongly_disagree']); ?></td>
                              <td class="text-center"><?php echo e($overall_totals['na']); ?></td>
                              <td class="text-center"><?php echo e($overall_totals['total_responses']); ?></td>
                              <td class="text-center"><strong><?php echo e(number_format($overall_totals['overall_percentage'] / count($categories), 2)); ?>%</strong></td>
                          </tr>
                      </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

 <!-- Summary for all offices -->
<div class="col-lg-14">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">SQD 1-8 Summary for All Offices
                <div class="buttons">
                <button class="copy-btn" id="copyBtn2" onclick="copyTable('sqdTable2')">
                    <i class="bi bi-clipboard"></i> COPY
                </button>
                <button class="download-btn" id="downloadBtn2" onclick="downloadCSV('sqdTable2')">
                    <i class="bi bi-file-earmark-arrow-down"></i> DOWNLOAD CSV
                </button>

                </div>
            </h5>
            
            <table class="table table-sm" id="sqdTable2">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Strongly Agree</th>
                        <th scope="col">Agree</th>
                        <th scope="col">Neither Agree nor Disagree</th>
                        <th scope="col">Disagree</th>
                        <th scope="col">Strongly Disagree</th>
                        <th scope="col">N/A</th>
                        <th scope="col">Total Response</th>
                        <th scope="col">Overall</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Initialize summary totals
                        $summary_totals = [
                            'strongly_agree' => 0,
                            'agree' => 0,
                            'neutral' => 0,
                            'disagree' => 0,
                            'strongly_disagree' => 0,
                            'na' => 0,
                            'total_responses' => 0,
                        ];

                        // Overall totals initialization
                        $overall_totals = [
                            'strongly_agree' => 0,
                            'agree' => 0,
                            'neutral' => 0,
                            'disagree' => 0,
                            'strongly_disagree' => 0,
                            'na' => 0,
                            'total_responses' => 0,
                        ];

                        // Categories mapping
                        $categories = [
                            'Responsiveness' => 'sqdone',
                            'Reliability' => 'sqdtwo',
                            'Access and Facilities' => 'sqdthree',
                            'Communication' => 'sqdfour',
                            'Costs' => 'sqdfive',
                            'Integrity' => 'sqdsix',
                            'Assurance' => 'sqdseven',
                            'Outcome' => 'sqdeight',
                        ];
                    ?>

                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $display_name => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $offices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                // Sum the values for the current category
                                $summary_totals['strongly_agree'] += $office->{$category . '_strongly_agree'};
                                $summary_totals['agree'] += $office->{$category . '_agree'};
                                $summary_totals['neutral'] += $office->{$category . '_neutral'};
                                $summary_totals['disagree'] += $office->{$category . '_disagree'};
                                $summary_totals['strongly_disagree'] += $office->{$category . '_strongly_disagree'};
                                $summary_totals['na'] += $office->{$category . '_na'};
                                $summary_totals['total_responses'] += $office->{$category . '_total_responses'};

                                // Accumulate to overall totals
                                $overall_totals['strongly_agree'] += $office->{$category . '_strongly_agree'};
                                $overall_totals['agree'] += $office->{$category . '_agree'};
                                $overall_totals['neutral'] += $office->{$category . '_neutral'};
                                $overall_totals['disagree'] += $office->{$category . '_disagree'};
                                $overall_totals['strongly_disagree'] += $office->{$category . '_strongly_disagree'};
                                $overall_totals['na'] += $office->{$category . '_na'};
                                $overall_totals['total_responses'] += $office->{$category . '_total_responses'};
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td><?php echo e($display_name); ?></td>
                            <td class="text-center"><?php echo e($summary_totals['strongly_agree']); ?></td>
                            <td class="text-center"><?php echo e($summary_totals['agree']); ?></td>
                            <td class="text-center"><?php echo e($summary_totals['neutral']); ?></td>
                            <td class="text-center"><?php echo e($summary_totals['disagree']); ?></td>
                            <td class="text-center"><?php echo e($summary_totals['strongly_disagree']); ?></td>
                            <td class="text-center"><?php echo e($summary_totals['na']); ?></td>
                            <td class="text-center"><?php echo e($summary_totals['total_responses']); ?></td>
                            <td class="text-center">
                          
                                  <?php echo e($summary_totals['total_responses'] > 0 ? number_format(($summary_totals['strongly_agree'] + $summary_totals['agree']) / $summary_totals['total_responses'] * 100, 2) : 0); ?>%
                         
                            </td>
                        </tr>

                        <?php
                            // Reset summary totals for the next category
                            $summary_totals = array_map(function() { return 0; }, $summary_totals);
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <!-- Overall Row -->
                    <tr>
                        <td><strong>Overall</strong></td>
                        <td class="text-center"><?php echo e($overall_totals['strongly_agree']); ?></td>
                        <td class="text-center"><?php echo e($overall_totals['agree']); ?></td>
                        <td class="text-center"><?php echo e($overall_totals['neutral']); ?></td>
                        <td class="text-center"><?php echo e($overall_totals['disagree']); ?></td>
                        <td class="text-center"><?php echo e($overall_totals['strongly_disagree']); ?></td>
                        <td class="text-center"><?php echo e($overall_totals['na']); ?></td>
                        <td class="text-center"><?php echo e($overall_totals['total_responses']); ?></td>
                        <td class="text-center">
                            <strong>
                                <?php echo e($overall_totals['total_responses'] > 0 ? number_format(($overall_totals['strongly_agree'] + $overall_totals['agree']) / $overall_totals['total_responses'] * 100, 2) : 0); ?>%
                            </strong>
                        </td>
                    </tr>
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
  // Function to copy table to clipboard
  function copyTable(tableId) {
    const table = document.getElementById(tableId);
    if (!table) {
      alert("Table not found!");
      return;
    }

    const range = document.createRange();
    range.selectNodeContents(table);
    window.getSelection().removeAllRanges(); // Clear any existing selections
    window.getSelection().addRange(range);

    try {
      document.execCommand('copy');
      document.getElementById('success-message').style.display = 'block';
    } catch (err) {
      console.error('Failed to copy:', err);
      alert("Failed to copy table.");
    }

    window.getSelection().removeAllRanges(); // Clear selection after copying
  }

  // Function to download table as CSV
  function downloadCSV(tableId) {
    const table = document.getElementById(tableId);
    if (!table) {
      alert("Table not found!");
      return;
    }

    let csv = [];
    const rows = table.querySelectorAll('tr');

    rows.forEach(row => {
      let cols = row.querySelectorAll('td, th');
      let rowData = [];
      cols.forEach(col => {
        // Escape double quotes
        let text = col.innerText.replace(/"/g, '""');
        // Wrap text in double quotes if it contains commas
        rowData.push(`"${text}"`);
      });
      csv.push(rowData.join(","));
    });

    // Create download link
    const csvFile = new Blob([csv.join("\n")], { type: "text/csv;charset=utf-8;" });
    const downloadLink = document.createElement("a");
    downloadLink.download = `${tableId}.csv`;
    downloadLink.href = window.URL.createObjectURL(csvFile);
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
    downloadLink.click();
    document.body.removeChild(downloadLink);
  }
</script>

</body>

</html><?php /**PATH C:\Users\Kathrina Libres\CSM\resources\views/report/data1.blade.php ENDPATH**/ ?>