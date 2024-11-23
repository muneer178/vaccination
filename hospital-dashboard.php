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

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
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
        <h1>Appointments</h1>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    // Connect to the MySQL database
    $conn = mysqli_connect('localhost', 'root', '', 'user_db');

    // Check if the connection was successful
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Sanitize inputs (optional)
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $last_vaccination_date = mysqli_real_escape_string($conn, $_POST['last_vaccination_date']);
    $appointment_date = mysqli_real_escape_string($conn, $_POST['appointment_date']);
    $status = ($_POST['action'] == 'accept') ? 'accepted' : 'rejected';

    // Insert into ap-status table
    $sql_insert = "INSERT INTO `ap-status` (fname, lname, age, gender, last_vaccination_date, appointment_date, status) VALUES ('$fname', '$lname', '$age', '$gender', '$last_vaccination_date', '$appointment_date', '$status')";

    if (mysqli_query($conn, $sql_insert)) {
        echo "<div class='alert alert-success mt-3' role='alert'>Data inserted into Accepted table successfully</div>";
    
        // Delete from bookings table
        $sql_delete = "DELETE FROM bookings WHERE fname='$fname' AND lname='$lname' AND age='$age' AND gender='$gender' AND last_vaccination_date='$last_vaccination_date' AND appointment_date='$appointment_date'";
    
        if (mysqli_query($conn, $sql_delete)) {
            echo "<div class='alert alert-success mt-3' role='alert'>Data deleted from bookings table successfully</div>";
        } else {
            echo "<div class='alert alert-danger mt-3' role='alert'>Error deleting data from bookings table: ". mysqli_error($conn). "</div>";
        }
    } else {
        echo "<div class='alert alert-danger mt-3' role='alert'>Error inserting data into Accepted table: ". mysqli_error($conn). "</div>";
    }

    // Close database connection
    mysqli_close($conn);
}


// Fetch data from bookings table
$conn = mysqli_connect('localhost', 'root', '', 'user_db');
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

$sql = "SELECT * FROM bookings";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['fname']) . "</td>";
        echo "<td>" . htmlspecialchars($row['lname']) . "</td>";
        echo "<td>" . htmlspecialchars($row['age']) . "</td>";
        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
        echo "<td>" . htmlspecialchars($row['last_vaccination_date']) . "</td>";
        echo "<td>" . htmlspecialchars($row['appointment_date']) . "</td>";
        echo "<td>";
        echo "<form method='post' action='hospital-dashboard.php'>";
        echo "<input type='hidden' name='fname' value='" . htmlspecialchars($row['fname']) . "'>";
        echo "<input type='hidden' name='lname' value='" . htmlspecialchars($row['lname']) . "'>";
        echo "<input type='hidden' name='age' value='" . htmlspecialchars($row['age']) . "'>";
        echo "<input type='hidden' name='gender' value='" . htmlspecialchars($row['gender']) . "'>";
        echo "<input type='hidden' name='last_vaccination_date' value='" . htmlspecialchars($row['last_vaccination_date']) . "'>";
        echo "<input type='hidden' name='appointment_date' value='" . htmlspecialchars($row['appointment_date']) . "'>";
        echo "<button type='submit' class='btn btn-success' name='action' value='accept'>Accept</button>";
        echo "<button type='submit' class='btn btn-danger ms-2' name='action' value='reject'>Reject</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No appointments found</td></tr>";
}

// Close MySQL connection
mysqli_close($conn);
?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- ... (rest of the code remains the same) ... -->

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <!-- ... (rest of the table code remains the same) ... -->
            </table>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12 text-center">
            <a href="accepted-app.php" class="btn btn-success me-2">View Accepted Appointments</a>
            <a href="rejected-app.php" class="btn btn-danger">View Rejected Appointments</a>
        </div>
    </div>
</div>

<!-- ... (rest of the code remains the same) ... -->

    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
