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
         .rate {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rate:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rate:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rate:not(:checked) > label:before {
         content: '★ ';
         }
         .rate > input:checked ~ label {
         color: #ffc700;
         }
         .rate:not(:checked) > label:hover,
         .rate:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rate > input:checked + label:hover,
         .rate > input:checked + label:hover ~ label,
         .rate > input:checked ~ label:hover,
         .rate > input:checked ~ label:hover ~ label,
         .rate > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
         .star-rating-complete{
            color: #c59b08;
         }
         .rating-container .form-control:hover, .rating-container .form-control:focus{
         background: #fff;
         border: 1px solid #ced4da;
         }
         .rating-container textarea:focus, .rating-container input:focus {
         color: #000;
         }
         .rated {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rated:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ffc700;
         }
         .rated:not(:checked) > label:before {
         content: '★ ';
         }
         .rated > input:checked ~ label {
         color: #ffc700;
         }
         .rated:not(:checked) > label:hover,
         .rated:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rated > input:checked + label:hover,
         .rated > input:checked + label:hover ~ label,
         .rated > input:checked ~ label:hover,
         .rated > input:checked ~ label:hover ~ label,
         .rated > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
    </style>

</head>

<body>

  <section class="section">
  <div class="card">
  <div class="card-body">
  <div class="container">
    <h1 class="text-center">Help Us Serve You Better!</h1>
    <p>This Client Satisfaction Measurement (CSM) tracks the customer experience of government offices. Your feedback on your regantly concluded transaction will help this office provide a better service. 
      Penonal information shared will be kept confidential and you always have the option to not answer this form.</p>
      <form action="<?php echo e(route('form_cao.submit')); ?>" method="POST" name="feedback" id="feedback">

        <?php echo csrf_field(); ?>
      <div class="form-section">
            <h3>Personal Information</h3>
            <div class="form-group">
                <label for="client-type">Client type:</label>
                <select class="form-control" id="client_type" name="client_type">
                    <option>Citizen</option>
                    <option>Business</option>
                    <option>Government</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sex">Sex:</label>
                <select class="form-control" id="sex" name="sex">
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" id="age" name="age">
            </div>
            <div class="form-group">
                        <label for="region">Region of residence:</label>
                        <select class="form-control" id="region" name="region">
                            <option value="" disabled selected>Select your region</option>
                            <option value="NCR">National Capital Region (NCR)</option>
                            <option value="CAR">Cordillera Administrative Region (CAR)</option>
                            <option value="Region I">Region I - Ilocos Region</option>
                            <option value="Region II">Region II - Cagayan Valley</option>
                            <option value="Region III">Region III - Central Luzon</option>
                            <option value="Region IV-A">Region IV-A - CALABARZON</option>
                            <option value="Region IV-B">Region IV-B - MIMAROPA</option>
                            <option value="Region V">Region V - Bicol Region</option>
                            <option value="Region VI">Region VI - Western Visayas</option>
                            <option value="Region VII">Region VII - Central Visayas</option>
                            <option value="Region VIII">Region VIII - Eastern Visayas</option>
                            <option value="Region IX">Region IX - Zamboanga Peninsula</option>
                            <option value="Region X">Region X - Northern Mindanao</option>
                            <option value="Region XI">Region XI - Davao Region</option>
                            <option value="Region XII">Region XII - SOCCSKSARGEN</option>
                            <option value="Region XIII">Region XIII - Caraga</option>
                            <option value="BARMM">Bangsamoro Autonomous Region in Muslim Mindanao (BARMM)</option>
                        </select>
                    </div>

            <div class="form-group">
                <label for="service">Service Availed:</label>
                <input type="text" class="form-control" id="service" name="service">
            </div>
            <input type="hidden" name="office_id" value="<?php echo e($office_id); ?>">
        </div>

        <div class="form-section">
            <h3>Citizen's Charter (CC) Questions</h3>
            <div class="form-group">
                <label>CC1: Which of the following best describes your awareness of a CC?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cc1" id="cc1_1" value="1">
                    <label class="form-check-label" for="cc1_1">1. I know what a CC is and I saw this office’s CC.</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cc1" id="cc1_2" value="2">
                    <label class="form-check-label" for="cc1_2">2. I know what a CC is but I did NOT see this office’s CC.</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cc1" id="cc1_3" value="3">
                    <label class="form-check-label" for="cc1_3">3. I learned of the CC only when I saw this office’s CC.</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cc1" id="cc1_4" value="4">
                    <label class="form-check-label" for="cc1_4">4. I do not know what a CC is and I did not see one in this office.</label>
                </div>
            </div>
            <div class="form-group">
                <label>CC2: If aware of CC, would you say that the CC of this office was...?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cc2" id="cc2_1" value="1">
                    <label class="form-check-label" for="cc2_1">1. Easy to see</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cc2" id="cc2_2" value="2">
                    <label class="form-check-label" for="cc2_2">2. Somewhat easy to see</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cc2" id="cc2_3" value="3">
                    <label class="form-check-label" for="cc2_3">3. Difficult to see</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cc2" id="cc2_4" value="4">
                    <label class="form-check-label" for="cc2_4">4. Not visible at all</label>
                </div>
            </div>
            <div class="form-group">
                <label>CC3: If aware of CC, how much did the CC help you in your transaction?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cc3" id="cc3_1" value="1">
                    <label class="form-check-label" for="cc3_1">1. Helped very much</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cc3" id="cc3_2" value="2">
                    <label class="form-check-label" for="cc3_2">2. Somewhat helped</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cc3" id="cc3_3" value="3">
                    <label class="form-check-label" for="cc3_3">3. Did not help</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cc3" id="cc3_4" value="4">
                    <label class="form-check-label" for="cc3_4">4. N/A</label>
                </div>
            </div>
        </div>

         <div class="form-section">
                 <h3>Service Quality Questions</h3>
                         <div class="form-group row">
                                       <p class="font-weight-bold">SQD0: I am satisfied with the service that I availed.</p>
                                                <div class="col">
                                                      <div class="rate">
                                                         <input type="radio" id="star5_sqd0" class="rate" name="rating_sqd0" value="5"/>
                                                         <label for="star5_sqd0" title="5 stars">5 stars</label>
                                                         <input type="radio" id="star4_sqd0" class="rate" name="rating_sqd0" value="4"/>
                                                         <label for="star4_sqd0" title="4 stars">4 stars</label>
                                                         <input type="radio" id="star3_sqd0" class="rate" name="rating_sqd0" value="3"/>
                                                         <label for="star3_sqd0" title="3 stars">3 stars</label>
                                                         <input type="radio" id="star2_sqd0" class="rate" name="rating_sqd0" value="2"/>
                                                         <label for="star2_sqd0" title="2 stars">2 stars</label>
                                                         <input type="radio" id="star1_sqd0" class="rate" name="rating_sqd0" value="1"/>
                                                         <label for="star1_sqd0" title="1 star">1 star</label>
                                                      </div>
                                                </div>
                                             </div>

                                             <div class="form-group row">
                                                <p class="font-weight-bold">SQD1. I spent a reasonable amount of time for my transaction.</p>
                                                <div class="col">
                                                      <div class="rate">
                                                         <input type="radio" id="star5_sqd1" class="rate" name="rating_sqd1" value="5"/>
                                                         <label for="star5_sqd1" title="5 stars">5 stars</label>
                                                         <input type="radio" id="star4_sqd1" class="rate" name="rating_sqd1" value="4"/>
                                                         <label for="star4_sqd1" title="4 stars">4 stars</label>
                                                         <input type="radio" id="star3_sqd1" class="rate" name="rating_sqd1" value="3"/>
                                                         <label for="star3_sqd1" title="3 stars">3 stars</label>
                                                         <input type="radio" id="star2_sqd1" class="rate" name="rating_sqd1" value="2"/>
                                                         <label for="star2_sqd1" title="2 stars">2 stars</label>
                                                         <input type="radio" id="star1_sqd1" class="rate" name="rating_sqd1" value="1"/>
                                                         <label for="star1_sqd1" title="1 star">1 star</label>
                                                      </div>
                                                </div>
                                             </div>

                                             <div class="form-group row">
                                                <p class="font-weight-bold">SQD2. The office followed the transaction's requirements and steps based on the information provided.</p>
                                                <input type="hidden" name="sqd2" value="">
                                                <div class="col">
                                                     <div class="rate">
                                                         <input type="radio" id="star5_sqd2" class="rate" name="rating_sqd2" value="5" />
                                                         <label for="star5_sqd2" title="5 stars">5 stars</label>

                                                         <input type="radio" id="star4_sqd2" class="rate" name="rating_sqd2" value="4" />
                                                         <label for="star4_sqd2" title="4 stars">4 stars</label>

                                                         <input type="radio" id="star3_sqd2" class="rate" name="rating_sqd2" value="3" />
                                                         <label for="star3_sqd2" title="3 stars">3 stars</label>

                                                         <input type="radio" id="star2_sqd2" class="rate" name="rating_sqd2" value="2" />
                                                         <label for="star2_sqd2" title="2 stars">2 stars</label>

                                                         <input type="radio" id="star1_sqd2" class="rate" name="rating_sqd2" value="1" />
                                                         <label for="star1_sqd2" title="1 star">1 star</label>
                                                   </div>
                                                </div>
                                             </div>

                                             <div class="form-group row">
                                                <p class="font-weight-bold">SQD3. The steps (including payment) I needed to complete my transaction were easy and simple.</p>
                                                <input type="hidden" name="sqd3" value="">
                                                <div class="col">
                                                   <div class="rate">
                                                         <input type="radio" id="star5_sqd3" class="rate" name="rating_sqd3" value="5" />
                                                         <label for="star5_sqd3" title="5 stars">5 stars</label>

                                                         <input type="radio" id="star4_sqd3" class="rate" name="rating_sqd3" value="4" />
                                                         <label for="star4_sqd3" title="4 stars">4 stars</label>

                                                         <input type="radio" id="star3_sqd3" class="rate" name="rating_sqd3" value="3" />
                                                         <label for="star3_sqd3" title="3 stars">3 stars</label>

                                                         <input type="radio" id="star2_sqd3" class="rate" name="rating_sqd3" value="2" />
                                                         <label for="star2_sqd3" title="2 stars">2 stars</label>

                                                         <input type="radio" id="star1_sqd3" class="rate" name="rating_sqd3" value="1" />
                                                         <label for="star1_sqd3" title="1 star">1 star</label>
                                                   </div>
                                                </div>
                                             </div>

                                             <div class="form-group row">
                                                <p class="font-weight-bold">SQD4. I easily found information about my transaction from the office or its website.</p>
                                                <input type="hidden" name="sqd4" value="">
                                                <div class="col">
                                                   <div class="rate">
                                                         <input type="radio" id="star5_sqd4" class="rate" name="rating_sqd4" value="5" />
                                                         <label for="star5_sqd4" title="5 stars">5 stars</label>

                                                         <input type="radio" id="star4_sqd4" class="rate" name="rating_sqd4" value="4" />
                                                         <label for="star4_sqd4" title="4 stars">4 stars</label>

                                                         <input type="radio" id="star3_sqd4" class="rate" name="rating_sqd4" value="3" />
                                                         <label for="star3_sqd4" title="3 stars">3 stars</label>

                                                         <input type="radio" id="star2_sqd4" class="rate" name="rating_sqd4" value="2" />
                                                         <label for="star2_sqd4" title="2 stars">2 stars</label>

                                                         <input type="radio" id="star1_sqd4" class="rate" name="rating_sqd4" value="1" />
                                                         <label for="star1_sqd4" title="1 star">1 star</label>
                                                   </div>
                                                </div>
                                             </div>

                                             <div class="form-group row">
                                                <p class="font-weight-bold">SQD5. I paid a reasonable amount of fees for my transaction.</p>
                                                <input type="hidden" name="sqd5" value="">
                                                <div class="col">
                                                   <div class="rate">
                                                         <input type="radio" id="star5_sqd5" class="rate" name="rating_sqd5" value="5" />
                                                         <label for="star5_sqd5" title="5 stars">5 stars</label>

                                                         <input type="radio" id="star4_sqd5" class="rate" name="rating_sqd5" value="4" />
                                                         <label for="star4_sqd5" title="4 stars">4 stars</label>

                                                         <input type="radio" id="star3_sqd5" class="rate" name="rating_sqd5" value="3" />
                                                         <label for="star3_sqd5" title="3 stars">3 stars</label>

                                                         <input type="radio" id="star2_sqd5" class="rate" name="rating_sqd5" value="2" />
                                                         <label for="star2_sqd5" title="2 stars">2 stars</label>

                                                         <input type="radio" id="star1_sqd5" class="rate" name="rating_sqd5" value="1" />
                                                         <label for="star1_sqd5" title="1 star">1 star</label>
                                                   </div>
                                                </div>
                                             </div>

                                             <div class="form-group row">
                                                <p class="font-weight-bold">SQD6. I feel the office was fair to everyone, or "walang palakasan," during my transaction.</p>
                                                <input type="hidden" name="sqd6" value="">
                                                <div class="col">
                                                   <div class="rate">
                                                         <input type="radio" id="star5_sqd6" class="rate" name="rating_sqd6" value="5" />
                                                         <label for="star5_sqd6" title="5 stars">5 stars</label>

                                                         <input type="radio" id="star4_sqd6" class="rate" name="rating_sqd6" value="4" />
                                                         <label for="star4_sqd6" title="4 stars">4 stars</label>

                                                         <input type="radio" id="star3_sqd6" class="rate" name="rating_sqd6" value="3" />
                                                         <label for="star3_sqd6" title="3 stars">3 stars</label>

                                                         <input type="radio" id="star2_sqd6" class="rate" name="rating_sqd6" value="2" />
                                                         <label for="star2_sqd6" title="2 stars">2 stars</label>

                                                         <input type="radio" id="star1_sqd6" class="rate" name="rating_sqd6" value="1" />
                                                         <label for="star1_sqd6" title="1 star">1 star</label>
                                                   </div>
                                                </div>
                                             </div>

                                             <div class="form-group row">
                                                <p class="font-weight-bold">SQD7. I was treated courteously by the staff, and (if I asked for help) the staff was helpful.</p>
                                                <input type="hidden" name="sqd7" value="">
                                                <div class="col">
                                                <div class="rate">
                                                        <input type="radio" id="star5_sqd7" class="rate" name="rating_sqd7" value="5" />
                                                        <label for="star5_sqd7" title="5 stars">5 stars</label>
                                                        <input type="radio" id="star4_sqd7" class="rate" name="rating_sqd7" value="4" />
                                                        <label for="star4_sqd7" title="4 stars">4 stars</label>
                                                        <input type="radio" id="star3_sqd7" class="rate" name="rating_sqd7" value="3" />
                                                        <label for="star3_sqd7" title="3 stars">3 stars</label>
                                                        <input type="radio" id="star2_sqd7" class="rate" name="rating_sqd7" value="2" />
                                                        <label for="star2_sqd7" title="2 stars">2 stars</label>
                                                        <input type="radio" id="star1_sqd7" class="rate" name="rating_sqd7" value="1" />
                                                        <label for="star1_sqd7" title="1 star">1 star</label>
                                                    </div>

                                                </div>
                                             </div>


                                             <div class="form-group row">
                                                <p class="font-weight-bold">SQD8. I got what I needed from the government office, or (if denied) the denial of my request was sufficiently explained to me.</p>
                                                <input type="hidden" name="sqd8" value="">
                                                <div class="col">
                                                   <div class="rate">
                                                         <input type="radio" id="star5_sqd8" class="rate" name="rating_sqd8" value="5" />
                                                         <label for="star5_sqd8" title="5 stars">5 stars</label>

                                                         <input type="radio" id="star4_sqd8" class="rate" name="rating_sqd8" value="4" />
                                                         <label for="star4_sqd8" title="4 stars">4 stars</label>

                                                         <input type="radio" id="star3_sqd8" class="rate" name="rating_sqd8" value="3" />
                                                         <label for="star3_sqd8" title="3 stars">3 stars</label>

                                                         <input type="radio" id="star2_sqd8" class="rate" name="rating_sqd8" value="2" />
                                                         <label for="star2_sqd8" title="2 stars">2 stars</label>

                                                         <input type="radio" id="star1_sqd8" class="rate" name="rating_sqd8" value="1" />
                                                         <label for="star1_sqd8" title="1 star">1 star</label>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-section">
                                                      <h3>Suggestions</h3>
                                                      <div class="form-group">
                                                         <label for="suggestions">Suggestions on how we can further improve our services:</label>
                                                         <textarea class="form-control" id="suggestions" name="suggestions" rows="4"></textarea>
                                                      </div>
                                                </div>

                                                <!-- Email (Optional) -->
                                                <div class="form-section">
                                                      <h3>Contact Information</h3>
                                                      <div class="form-group">
                                                         <label for="email">Contact Number/Email address (optional):</label>
                                                         <input type="email" class="form-control" id="email" name="email">
                                                      </div>
                                                </div>

                                                <p>Thank you!!</p>
                                                <!-- Submit Button -->
                                                <button type="submit" name="feedbackbtn" id="feedbackbtn" class="btn btn-primary">Submit</button>
                                          </form>
                                       </div>
                                    </div>
                                 </div>



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
    $("#feedback").submit(function(e) {
        e.preventDefault();
        $("#feedbackbtn").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting');
        $("#feedbackbtn").prop('disabled', true);   
           
        $.ajax({
            url: '<?php echo e(route ('form_cao.submit')); ?>',
            method: 'post',
            data: $(this).serialize(),
            datatype: 'json',
            success: function(res){
                $("#feedbackbtn").html('Submit');
                $("#feedbackbtn").prop('disabled', false);
                if (res.status == 200) {
                    alert('Form successfully submitted');
                    window.location.href = res.redirect;
                } else {
                    alert('Failed to submit form. Try again later.');
                    console.log(res.messages);
                }
            },
            error: function(xhr) {
                console.log(xhr);
                $("#feedbackbtn").html('Submit');
                $("#feedbackbtn").prop('disabled', false);
                alert('An error occurred. Please try again.');
            }
        });
    });
});
  </script>
</body>

</html><?php /**PATH C:\Users\Kathrina Libres\CSM\resources\views/form.blade.php ENDPATH**/ ?>