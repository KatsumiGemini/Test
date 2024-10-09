<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / General - NiceAdmin Bootstrap Template</title>
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
        <a class="nav-link" href="<?php echo e(route('user.user_account')); ?>">
          <i class="bi bi-person"></i>
          <span>User</span>
        </a>
      </li><!-- End Profile Page Nav --> 
    </ul>
  </aside>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Users Table</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Users</h5>
              
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Position</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($user->id); ?></th>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td><?php echo e($user->position ?? 'N/A'); ?></td>
                            <td><?php echo e($user->role_name); ?></td>
                            <td><?php echo e($user->status ?? 'Active'); ?></td>
                            <td>
                            <button type="button" class="btn btn-primary edit-user" 
                                data-bs-toggle="modal" 
                                data-bs-target="#basicModal" 
                                data-id="<?php echo e($user->id); ?>" 
                                data-name="<?php echo e($user->name); ?>" 
                                data-email="<?php echo e($user->email); ?>" 
                                data-password="<?php echo e($user->password); ?>">
                                <i class="bi bi-pencil"></i>
                            </button>
                                <button class="btn btn-sm btn-primary"><i class="bi bi-trash"></i></button>
                                <!-- <button class="btn btn-sm btn-primary"><i class="bi bi-unlock"></i></button> -->
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <!-- End small tables -->
            </div>
        </div>
    </div>
            
    <div class="col-lg-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Registration Form</h5>
          <form action="<?php echo e(route('registerUser')); ?>" method="post" id="user_form">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
              <div class="invalid-feedback" id="name_error"></div>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
              <div class="invalid-feedback" id="email_error"></div>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
              <div class="invalid-feedback" id="password_error"></div>
            </div>
            <div class="mb-3">
              <label for="userole">Client type:</label>
              <select class="form-control" id="userole" name="userole">
                <option value="3">Sub-Admin</option>
                <option value="2">User</option>
              </select>
              <div class="invalid-feedback" id="userole_error"></div>
            </div>
            <button type="submit" id="register_btn" class="btn btn-primary">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update_form">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="user_id" name="user_id">
                    <div class="mb-3">
                        <label for="update_name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="update_name" name="update_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="update_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="update_email" name="update_email" required>
                    </div>
                    <div class="mb-3">
                        <label for="update_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="update_password" name="update_password">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="userupdate">Save changes</button>
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
<script>
$(function() {
    $("#register_form").submit(function(e) {
        e.preventDefault();
        $("#register_btn").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Registering');
        $("#register_btn").prop('disabled', true);

        $(".invalid-feedback").text('').hide();
        $(".form-control").removeClass('is-invalid');

        $.ajax({
            url: '<?php echo e(route('registerUser')); ?>',
            method: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(res) {
                $("#register_btn").html('Register');
                $("#register_btn").prop('disabled', false);
                if (res.status == 200) {
                    alert('Account created successfully!');
                    window.location.href = res.redirect;
                } else {
                    $.each(res.messages, function(key, value) {
                        $("#" + key).addClass('is-invalid');
                        $("#" + key + "_error").text(value[0]).show();
                    });
                }
            },
            error: function(xhr) {
                console.log(xhr);
                $("#register_btn").html('Register');
                $("#register_btn").prop('disabled', false);
                alert('An error occurred. Please try again.');
            }
        });
    });
});
  </script>

      <script>
       // Populate modal fields when the edit button is clicked
    $(document).on('click', '.edit-user', function() {
        var userId = $(this).data('id');
        var userName = $(this).data('name');
        var userEmail = $(this).data('email');
        var userPassword = $(this).data('password');

        // Populate the form fields with the user's data
        $('#user_id').val(userId);
        $('#update_name').val(userName);
        $('#update_email').val(userEmail);
        $('#update_password').val(''); // Password will be empty if it's not being updated
    });

    // Handle form submission via AJAX
    $(document).on('click', '#userupdate', function() {
        var updateData = {
            _token: $('input[name="_token"]').val(),
            user_id: $('#user_id').val(),
            name: $('#update_name').val(),
            email: $('#update_email').val(),
            password: $('#update_password').val() // Password can be empty if not being updated
        };

        $.ajax({
            url: '<?php echo e(route("user_account")); ?>', // Ensure this route is defined
            method: 'post',
            data: updateData,
            success: function(response) {
                if (response.status == 200) {
                    alert('User updated successfully!');
                    location.reload(); // Reload the page to reflect changes
                } else {
                    alert('Error updating user. Please try again.');
                }
            },
            error: function(xhr) {
                console.log(xhr);
                alert('An error occurred. Please try again.');
            }
        });
    });
      </script>

</body>

</html>
<?php /**PATH C:\Users\Kathrina Libres\CSM\resources\views/user/user_account.blade.php ENDPATH**/ ?>