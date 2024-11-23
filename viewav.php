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

   <?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

// Establish database connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from bookings table
// Fetch data from bookings table
$sql = "SELECT * FROM vaclist";
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Display data in a table
    echo '<br>';
    echo '<center>';
    echo "<h1>Availability of Vaccines</h1>";
    echo "<table style='border: 1px solid black';>";
    echo "<tr><th style='border: 1px solid black;'>ID</th><th style='border: 1px solid black;'>Vaccine Name</th><th style='border: 1px solid black;'>Availabilty</th><th style='border: 1px solid black;'>Actions</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td style='border: 1px solid black;'>" . $row['id'] . "</td>";
        echo "<td style='border: 1px solid black;'>" . $row['Vaccine_name'] . "</td>";
        echo "<td style='border: 1px solid black;'>" . $row['Availability'] . "</td>";
        echo "<td style='border: 1px solid black;'>";
        echo "<a href='edit_vaccine.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a>";
        echo " ";
        echo "<a href='delete_vaccine.php?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this vaccine?\")'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo"<br>";
    echo ' <a href="admin_dashboard.php" class="nav-item nav-link" style="text-align: center;">BACK</a>';
    echo '<br>';
    echo '<a href="add_vaccine.php" class="btn btn-primary">Add New Vaccine</a>';
    echo '</center>';
} else {
    echo "No vaccines found.";
    echo '<br>';
    echo '<a href="add_vaccine.php" class="btn btn-primary">Add New Vaccine</a>';
}

?>