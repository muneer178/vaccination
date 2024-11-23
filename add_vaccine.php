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
            </div>
            <a href="index.php" class="btn btn-primary py-2 px-4 ms-3">Log out</a>
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="container mt-5">
        <h2>Add New Vaccine</h2>
        <form action="add_vaccine.php" method="post">
            <div class="form-group">
                <label for="vaccine_name">Vaccine Name:</label>
                <input type="text" class="form-control" id="vaccine_name" name="vaccine_name" required>
            </div>
            <div class="form-group">
                <label for="availability">Availability:</label>
                <input type="text" class="form-control" id="availability" name="availability" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Add New Vaccine</button>
        </form>

        <?php
        // Create a new connection to the database
        $conn = mysqli_connect("localhost", "root", "", "user_db");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Process the form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $vaccine_name = $_POST["vaccine_name"];
            $availability = $_POST["availability"];

            $sql = "INSERT INTO vaclist (Vaccine_name, Availability) VALUES ('$vaccine_name', '$availability')";
            if (mysqli_query($conn, $sql)) {
                echo "<div class='alert alert-success mt-3'>New vaccine added successfully</div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</div>";
            }
        }

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
