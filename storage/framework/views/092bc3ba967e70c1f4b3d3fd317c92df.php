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
  <script>
        tinymce.init({
            selector: '.tinymce-editor',
            height: 400,
            menubar: true,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | bold italic backcolor | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | removeformat | help | saveButton printButton',
            setup: function (editor) {
                // Add Save button
                editor.ui.registry.addButton('saveButton', {
                    text: 'Save',
                    onAction: function () {
                        saveContent();
                    }
                });

                // Add Print button
                editor.ui.registry.addButton('printButton', {
                    text: 'Print',
                    onAction: function () {
                        printContent();
                    }
                });
            }
        });

        // Function to save the content
        function saveContent() {
            const content = tinymce.activeEditor.getContent();
            const blob = new Blob([content], { type: 'text/html' });
            const link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = 'content.html'; // Save as an HTML file
            link.click();
        }

        // Function to print the content
        function printContent() {
            const content = tinymce.activeEditor.getContent();
            const printWindow = window.open('', '_blank', 'width=800,height=600');
            printWindow.document.write(`
                <html>
                    <head>
                        <title>Print Content</title>
                    </head>
                    <body>${content}</body>
                </html>
            `);
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }
    </script>
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
              <a class="nav-link collapsed " data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Result</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
                  <a href="<?php echo e(route('report.data2')); ?>">
                    <i class="bi bi-circle"></i><span>University</span>
                  </a>
                </li> -->
              </ul>
            </li><!-- End Charts Nav -->

     <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('report2')); ?>">
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
  <h1>Form Editors</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Forms</li>
      <li class="breadcrumb-item active">Editors</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">TinyMCE Editor</h5>

                        <!-- TinyMCE Editor -->
                        <textarea class="tinymce-editor" id="tiny">
                            <p>Hello World!</p>
                            <p>This is TinyMCE <strong>full</strong> editor</p>
                        </textarea>
                        <!-- End TinyMCE Editor -->

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

</html><?php /**PATH C:\Users\Kathrina Libres\CSM\resources\views/report2.blade.php ENDPATH**/ ?>