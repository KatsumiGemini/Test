<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Users / Profile - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
        .form-section {
            margin-bottom: 30px;
        }
        section{
            margin:300px;
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
    <form action="/submit-feedback" method="POST">
        <!-- Personal Information -->
        <div class="form-section">
            <h3>Personal Information</h3>
            <div class="form-group">
                <label for="client-type">Client type:</label>
                <select class="form-control" id="client-type" name="client_type">
                    <option>Citizen</option>
                    <option>Business</option>
                    <option>Government</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date">
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
                <input type="text" class="form-control" id="region" name="region">
            </div>
            <div class="form-group">
                <label for="service">Service Availed:</label>
                <input type="text" class="form-control" id="service" name="service">
            </div>
        </div>

        <!-- Citizen's Charter (CC) Questions -->
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

        <!-- Service Quality Questions (SQD) -->
        <div class="form-section">
            <h3>Service Quality Questions</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Question</th>
                        <th scope="col">Strongly Disagree</th>
                        <th scope="col">Disagree</th>
                        <th scope="col">Neither Agree nor Disagree</th>
                        <th scope="col">Agree</th>
                        <th scope="col">Strongly Agree</th>
                        <th scope="col">N/A</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">SQD0</th>
                        <td>I am satisfied with the service that I availed.</td>
                        <td><input type="radio" name="sqd0" value="1"></td>
                        <td><input type="radio" name="sqd0" value="2"></td>
                        <td><input type="radio" name="sqd0" value="3"></td>
                        <td><input type="radio" name="sqd0" value="4"></td>
                        <td><input type="radio" name="sqd0" value="5"></td>
                        <td><input type="radio" name="sqd0" value="6"></td>
                    </tr>
                    <!-- Repeat for other SQD questions -->
                    <tr>
                        <th scope="row">SQD1</th>
                        <td>I spent a reasonable amount of time for my transaction.</td>
                        <td><input type="radio" name="sqd1" value="1"></td>
                        <td><input type="radio" name="sqd1" value="2"></td>
                        <td><input type="radio" name="sqd1" value="3"></td>
                        <td><input type="radio" name="sqd1" value="4"></td>
                        <td><input type="radio" name="sqd1" value="5"></td>
                        <td><input type="radio" name="sqd1" value="6"></td>
                    </tr>

                    <tr>
                        <th scope="row">SQD2</th>
                        <td>The office followed the transaction's requriements and steps based o nthe information provided.</td>
                        <td><input type="radio" name="sqd2" value="1"></td>
                        <td><input type="radio" name="sqd2" value="2"></td>
                        <td><input type="radio" name="sqd2" value="3"></td>
                        <td><input type="radio" name="sqd2" value="4"></td>
                        <td><input type="radio" name="sqd2" value="5"></td>
                        <td><input type="radio" name="sqd2" value="6"></td>

                    </tr>
                        
                    <tr>
                        <th scope="row">SQD3</th>
                        <td>The steps (including payment) I needed to do for my transaction were easy and simple.</td>
                        <td><input type="radio" name="sqd3" value="1"></td>
                        <td><input type="radio" name="sqd3" value="2"></td>
                        <td><input type="radio" name="sqd3" value="3"></td>
                        <td><input type="radio" name="sqd3" value="4"></td>
                        <td><input type="radio" name="sqd3" value="5"></td>
                        <td><input type="radio" name="sqd3" value="6"></td>
                    </tr>

                    <tr>
                        <th scope="row">SQD4</th>
                        <td>i easily found information about my transaction from the office or its website.</td>
                        <td><input type="radio" name="sqd4" value="1"></td>
                        <td><input type="radio" name="sqd4" value="2"></td>
                        <td><input type="radio" name="sqd4" value="3"></td>
                        <td><input type="radio" name="sqd4" value="4"></td>
                        <td><input type="radio" name="sqd4" value="5"></td>
                        <td><input type="radio" name="sqd4" value="6"></td>
                    </tr>

                    <tr>
                        <th scope="row">SQD5</th>
                        <td>I paid a resonable amount of fees for my transaction.</td>
                        <td><input type="radio" name="sqd5" value="1"></td>
                        <td><input type="radio" name="sqd5" value="2"></td>
                        <td><input type="radio" name="sqd5" value="3"></td>
                        <td><input type="radio" name="sqd5" value="4"></td>
                        <td><input type="radio" name="sqd5" value="5"></td>
                        <td><input type="radio" name="sqd5" value="6"></td>
                    </tr>

                    <tr>
                        <th scope="row">SQD6</th>
                        <td>I feel the office was fair  to everyone, or "walang palakasan", during my transaction.</td>
                        <td><input type="radio" name="sqd6" value="1"></td>
                        <td><input type="radio" name="sqd6" value="2"></td>
                        <td><input type="radio" name="sqd6" value="3"></td>
                        <td><input type="radio" name="sqd6" value="4"></td>
                        <td><input type="radio" name="sqd6" value="5"></td>
                        <td><input type="radio" name="sqd6" value="6"></td>
                    </tr>

                    <tr>
                        <th scope="row">SQD7</th>
                        <td>I was treated courteously by the staff, and (if asked for help) the staff was helpful.</td>
                        <td><input type="radio" name="sqd7" value="1"></td>
                        <td><input type="radio" name="sqd7" value="2"></td>
                        <td><input type="radio" name="sqd7" value="3"></td>
                        <td><input type="radio" name="sqd7" value="4"></td>
                        <td><input type="radio" name="sqd7" value="5"></td>
                        <td><input type="radio" name="sqd7" value="6"></td>
                    </tr>

                    <tr>
                        <th scope="row">SQD8</th>
                        <td>I got what I needed from the government office, or (if denied) denial of request was sufficiently explained to me.</td>
                        <td><input type="radio" name="sqd8" value="1"></td>
                        <td><input type="radio" name="sqd8" value="2"></td>
                        <td><input type="radio" name="sqd8" value="3"></td>
                        <td><input type="radio" name="sqd8" value="4"></td>
                        <td><input type="radio" name="sqd8" value="5"></td>
                        <td><input type="radio" name="sqd8" value="6"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Suggestions -->
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
                <label for="email">Email address (optional):</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
        </div>

        <p>Thank you!!</p>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
      </div>
      </div>
  </section>


@include('updown.footers')

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<script>
  tinymce.init({
    selector: '.tinymce-editor',
    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    toolbar_mode: 'floating',
    height: 500,
    setup: function(editor) {
      editor.on('keyup', function() {
        updatePreview(editor.getContent());
      });
    }
  });

  function updatePreview(content) {
    document.getElementById('preview').innerHTML = content;
  }
</script>

</body>

</html>
