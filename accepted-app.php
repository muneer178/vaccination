<?php
// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to the MySQL database
$conn = mysqli_connect('localhost', 'root', '', 'user_db');

// Check if the connection was successful
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Fetch data from ap-status table with accepted status
$sql = "SELECT * FROM `ap-status` WHERE status='accepted'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    ?>
    <html>
    <head>
        <title>Accepted Appointments</title>
        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
            <a href="appointments.php" class="navbar-brand p-0">
                <img src="img/logo.jpg" class="img-fluid" alt="" style="width: 230px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <!-- Navbar Links -->
                </div>
                <a href="index.php" class="btn btn-primary py-2 px-4 ms-3">Log out</a>
            </div>
        </nav>
        <center>
            <h1>Accepted Appointments</h1>
        </center>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Last Vaccine Date</th>
                                <th>Appointment Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['fname']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['lname']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['age']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['last_vaccination_date']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['appointment_date']) . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="hospital-dashboard.php" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
        <!-- Bootstrap JavaScript -->
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    <?php
} else {
    echo "<h1>No accepted appointments found</h1>";
    ?>
    <div class="row">
        <div class="col-md-12 text-center">
            <a href="hospital-dashboard.php" class="btn btn-secondary">Back</a>
        </div>
    </div>
    <?php
}

// Close MySQL connection
mysqli_close($conn);
?>