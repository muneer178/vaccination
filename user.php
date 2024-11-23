<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>VaccineWay</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="lib/twentytwenty/twentytwenty.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
   


    


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="index.php" class="navbar-brand p-0">
         <img src="img/logo.jpg" class="img-fluid" alt="" style="width: 230px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                
                
             
        
                <a href="user_profile.php" class="nav-item nav-link"><img src="img/my_profile.png" alt="" width="27px" ></a>
            </div>
    
            <a href="index.php" class="btn btn-primary py-2 px-4 ms-3">Log out</a>
        </div>
    </nav>
    <!-- Navbar End -->
    <?php
  // Start a session
  session_start();

  // Check if the user is logged in
  if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
  }

  // Connect to the MySQL database
  $conn = mysqli_connect('localhost', 'root', '', 'user_db');

  // Check if the connection was successful
  if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
  }

  // Query the database to get the user's information
  $sql = "SELECT * FROM users WHERE id='{$_SESSION['user_id']}'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    
    echo '<center>';
    echo '<br>';
    echo '<div>';
    echo '<h1 style="font-size: 24px; font-weight: bold; margin: 0; color:#091E3E">Welcome, ' . $row['name'] . '!</h1>';
    echo '</div>';
    echo '<center>';
    
  }

  // Close the database connection
  mysqli_close($conn);
?>
    <center>
        <br>
        <br>
        
    <div class="col-lg-6">
    <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s" >
      
        <h1 class=" mb-4" style="font-size: 30px; color: rgba(0, 0, 0, 0.496);">Get your Child Vaccinated Now</h1>
        <h1 class="text-white mb-4" style="font-size: 30px; font-style: italic;"> Enter your Child details</h1>
        <form action="booking.php" method="POST">
            <div class="row g-3">
                <div class="col-12 col-sm-6">
                    <input type="text" class="form-control bg-light border-0" placeholder="First Name" style="height: 55px;" name="fname" required>
                </div>
                <div class="col-12 col-sm-6">
                    <input type="text" class="form-control bg-light border-0" placeholder="Last Name" style="height: 55px;" name="lname" required>
                </div>
                <div class="col-12 col-sm-6">
                    <div>
                        <input type="number" class="form-control bg-light border-0" placeholder="Age" style="height: 55px;" name="age" min="1" max="17" required>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <select class="form-select bg-light border-0" style="height: 55px;" name="gender"  required>
                        <option value="" >Gender</option>
                        <option value="M" >Male</option>
                        <option value="F">Female</option>
                   
                    </select>
                </div>
              
                <div class="col-12 col-sm-6">
                    <input type="date" required
                    class="form-control bg-light border-0 datetimepicker-input"
                    placeholder="Appointment Date" data-target="#date1" data-toggle="datetimepicker" style="height: 55px;" name="last_vaccination_date">
                </div>
                <div class="col-12 col-sm-6">
                    <div>
                        <div>
                            <input  required name="parent_name" type="text" class="form-control bg-light border-0" placeholder="Parent or Guardian Name" style="height: 55px;">
                        </div>
                        
                    </div>
                </div>
                
                <h1 class="text-white mb-4" style="font-size: 30px;">Make Appointment</h1>
                <div class="col-12 col-sm-6">
                    <select class="form-select bg-light border-0" style="height: 55px; " name="hospital_selected" required>
                        <option value="">Select a Hospital</option>
                        <option value="H1">Riverwood Medical Center</option>
                        <option value="H2">Meadowbrook General Hospital</option>
                        <option value="H3">Hillcrest Family Health Center</option>
                        <option value="H4">Willow Grove Women's Hospital</option>
                        <option value="H5">Oceanview Regional Medical Center</option>
                        <option value="H6">Cedar Grove Regional Medical Center</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6">
                    <select class="form-select bg-light border-0" style="height: 55px;" name="vaccine_type" required>
                        <option value="">Please select Vaccine Type</option>
                        <option value="V1">polio </option>
                        <option value="V2">hepatitis A</option>
                        <option value="V3">influenza</option>
                        <option value="V4">chickenpox</option>
                        <option value="V5">human papillomavirus (HPV)</option>
                        <option value="V6">Haemophilus influenzae type b (Hib)</option>
                        <option value="V7">measles</option>
                        <option value="V8">pneumococcal disease</option>
                    </select>

 
                </div>
                <div class="col-12 col-sm-6">
                    <input type="tel" class="form-control bg-light border-0" placeholder="Cell No." style="height: 55px;" name="phone" maxlength="11" required>
                </div>
                <div class="col-12 col-sm-6">
                    <input type="email" class="form-control bg-light border-0" placeholder="Your Email" style="height: 55px;" name="email" required>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="date" id="date1" data-target-input="nearest">
                        <input type="date"
                            class="form-control bg-light border-0 datetimepicker-input" required
                            placeholder="Appointment Date" data-target="#date1" data-toggle="datetimepicker" style="height: 55px;" name="appointment_date">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="time" id="time1" data-target-input="nearest">
                        <input type="time" name="appointment_time" required
                            class="form-control bg-light border-0 datetimepicker-input"
                            placeholder="Appointment Time" data-target="#time1" data-toggle="datetimepicker" style="height: 55px;">
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-dark w-100 py-3" type="submit">Make Appointment</button>
                </div>
            </div>
        </form>
    </div>
</div>
</center>
<br>
<br>
<br>
<br>
<br>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light py-5 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: -75px;">
        <div class="container pt-5">
            <div class="row g-5 pt-4">
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Quick Links</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>

                        <a class="text-light" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Popular Links</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                        <a class="text-light" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Get In Touch</h3>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>Aptech FBA</p>
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>kirmanihassan153@gmail.co</p>
                    <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>+012 345 67890</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Follow Us</h3>
                    <div class="d-flex">
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-light py-4" style="background: #051225;">
        <div class="container">
            <div class="row g-0">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-white border-bottom" href="#">VaccineWay</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">E project| Vaccine management system</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->  
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  

    <script src="lib/easing/easing.min.js"></script>
    
    
  
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>
