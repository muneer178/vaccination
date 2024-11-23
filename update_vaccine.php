<?php

// Connect to the MySQL database
$conn = mysqli_connect('localhost', 'root', '', 'user_db');

// Check if the connection was successful
if (!$conn) {
    die('Connection failed: '. mysqli_connect_error());
}

// Get the updated vaccine details from the form
$vaccine_id = $_POST['id'];
$vaccine_name = $_POST['vaccine_name'];
$availability = $_POST['availability'];

// Query to update the vaccine details
$sql = "UPDATE vaclist SET Vaccine_name = '$vaccine_name', Availability = '$availability' WHERE id = '$vaccine_id'";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "Vaccine details updated successfully!";
    header('Location: viewav.php');
} else {
    echo "Error updating vaccine details: ". mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>