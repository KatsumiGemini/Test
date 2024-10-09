<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Users / Profile - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo e(asset('assets/img/favicon.png')); ?>" rel="icon">
    <link href="<?php echo e(asset('assets/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Nunito:wght@300;400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo e(asset('assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/boxicons/css/boxicons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/quill/quill.snow.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/quill/quill.bubble.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/remixicon/remixicon.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/simple-datatables/style.css')); ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">

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
                <a class="nav-link collapsed" href="<?php echo e(route('user.qrgenerate')); ?>">
                <i class="bi bi-journal-text"></i>
                <span>Form</span>
                </a>
            </li>
        </ul>
    </aside>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div>

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="<?php echo e(asset($info && $info->image ? 'storage/'.$info->image : 'assets/img/profile-img.jpg')); ?>" alt="Profile" class="rounded-circle" id="currentImage" value="$user_image">
                            <h2><?php echo e($user_name); ?></h2>
                            <h3><?php echo e($user_role); ?></h3>
                        </div>
                     </div>
                </div>  
                
            <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button></li>
                                <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button></li>
                                <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button></li>
                                <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-qrcode">Qr-Code</button></li>
                            </ul>
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">About</h5>
                                    <p class="small fst-italic"><?php echo e($user_about); ?></p>
                                    <h5 class="card-title">Profile Details</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Full Name</div>
                                        <div class="col-lg-9 col-md-8"><?php echo e($user_name); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Campus</div>
                                        <div class="col-lg-9 col-md-8"><?php echo e($user_campus); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Address</div>
                                        <div class="col-lg-9 col-md-8"><?php echo e($user_address); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Position</div>
                                        <div class="col-lg-9 col-md-8"><?php echo e($user_position); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Role</div>
                                        <div class="col-lg-9 col-md-8"><?php echo e($user_role); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Phone</div>
                                        <div class="col-lg-9 col-md-8"><?php echo e($user_phone); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8"><?php echo e($user_email); ?></div>
                                    </div>
                                </div>
                                <!-- Profile Edit Tab -->
                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    <form id="update_form" action="<?php echo e(route('profile.edit')); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img src="<?php echo e(asset($info && $info->image ? 'storage/'.$info->image : 'assets/img/profile-img.jpg')); ?>" alt="Profile" id="newImage" class="rounded-circle">
                                                <div class="pt-2">
                                                    <input type="file" name="Image" id="Image" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="fullName" type="text" class="form-control" id="fullName" value="<?php echo e($user_name); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="About" class="col-md-4 col-lg-3 col-form-label">About</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="About" class="form-control" id="About" style="height: 100px"><?php echo e($user_about); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="Phone" type="text" class="form-control" id="Phone" value="<?php echo e($user_phone); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="Email" type="email" class="form-control" id="Email" value="<?php echo e($user_email); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Campus" class="col-md-4 col-lg-3 col-form-label">Campus</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="Campus" type="text" class="form-control" id="Campus"  value="<?php echo e($user_campus); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="Address" type="text" class="form-control" id="Address" value="<?php echo e($user_address); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Position" class="col-md-4 col-lg-3 col-form-label">Position</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="Position" type="text" class="form-control" id="Position" value="<?php echo e($user_position); ?>">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Change Password Tab -->
                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <form>
                                        <div class="row mb-3">
                                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control" id="currentPassword">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newpassword" type="password" class="form-control" id="newPassword">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form>
                                </div>

                                <!--qr-code-->
                                <div class="tab-pane fade profile-qrcode pt-3" id="profile-qrcode">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">QR-CODE</h5>
                                            <p>Generate a code for the evaluation form</p>  
                                            
                                            <div class="qr-code">
                                                <form action="" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="btn btn-primary">Generate</button>
                                                </form>                                                                                          
                                            </div>
                                            
                                            
                                        </div>
                                    </div>

                                    <!--end of qr-code-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo e(asset('assets/vendor/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/chart.js/chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/echarts/echarts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/quill/quill.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/simple-datatables/simple-datatables.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/tinymce/tinymce.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/php-email-form/validate.js')); ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('Image').addEventListener('change', function(event) {
            var output = document.getElementById('newImage');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src);
            }
        });

        $('#update_form').on('submit', function(event) {
    event.preventDefault();

    let formData = new FormData(this);

    $.ajax({
        url: $(this).attr('action'),
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Assuming response is a JSON object
            alert(response.message); // Display success message
            // Optionally, update parts of the page or redirect
        },
        error: function(xhr) {
            alert('An error occurred while updating the profile.'); // Display error message
        }
    });
});

    </script>
</body>

</html><?php /**PATH C:\Users\Kathrina Libres\CSM\resources\views/user/user_profile.blade.php ENDPATH**/ ?>