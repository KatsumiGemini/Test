<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Office dashboard - QR Code Generator</title>
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

  <!-- QR Code Generator Script -->
  <script src="https://cdn.jsdelivr.net/npm/qrcode@1.4.4/build/qrcode.min.js"></script>

</head>

<body>

<?php echo $__env->make('updown.user_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo e(route('user.user_interface')); ?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

       <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo e(route('user.user_form')); ?>">
          <i class="bi bi-journal-text"></i>
          <span>Satisfaction</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('user.qrgenerate')); ?>">
          <i class="bi bi-qr-code"></i>
          <span>QR Code Generator</span>
        </a>
      </li>

    </ul>

</aside>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>QR Code Generator</h1>
  </div>

  <section class="section dashboard">
    <div class="row">
      <!-- Form to generate QR code -->
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Generate QR Code for Form</h5>
            
            <!-- QR Code Form -->
            <form id="qrForm">
              <div class="mb-3">
                <label for="formUrl" class="form-label">Form URL</label>
                <input type="text" class="form-control" id="formUrl" placeholder="Enter form URL" required>
              </div>
              <button type="button" class="btn btn-primary" onclick="generateQRCode()">Generate QR Code</button>
            </form>
          </div>
        </div>
      </div>

      <!-- Display generated QR code on the right side -->
      <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Generated QR Code</h5>
                    <canvas id="qrcodeCanvas" class="d-flex justify-content-center align-items-center" style="min-height: 200px; border: 1px solid #ddd;">
                        <!-- QR code will appear here -->
                    </canvas>
                </div>
            </div>
        </div>
    </div>
  </section>
</main>

<?php echo $__env->make('updown.footers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<!-- QR Code Generator Script -->
<script>
 function generateQRCode() {
    const url = document.getElementById('formUrl').value.trim();
    const canvas = document.getElementById('qrcodeCanvas');
    
    // Simple URL validation (it should start with http:// or https://)
    const isValidUrl = /^(http|https):\/\/[^ "]+$/.test(url);
    
    // Clear the canvas before generating new QR code
    const context = canvas.getContext('2d');
    context.clearRect(0, 0, canvas.width, canvas.height);

    if (isValidUrl) {
        QRCode.toCanvas(canvas, url, { width: 200, height: 200 }, function (error) {
            if (error) {
                console.error("QR Code generation error: ", error);
                alert("Failed to generate QR Code. Please try again.");
            } else {
                console.log('QR code generated successfully!');
            }
        });
    } else {
        alert('Please enter a valid URL starting with http:// or https://');
    }
}
</script>

</body>

</html>
<?php /**PATH C:\Users\Kathrina Libres\CSM\resources\views/user/qrgenerate.blade.php ENDPATH**/ ?>