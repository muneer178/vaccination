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

// Check if id is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record from the database
    $sql = "DELETE FROM vaclist WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Vaccine deleted successfully.";
    } else {
        echo "Error deleting vaccine: " . mysqli_error($conn);
    }

    // Redirect back to the availability page
    header("Location: viewav.php");
} else {
    echo "No vaccine ID specified.";
}

mysqli_close($conn);
?>
