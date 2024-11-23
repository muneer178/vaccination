<link rel="stylesheet" href="style_login.css">

<?php


  // Connect to the MySQL database
  $conn = mysqli_connect('localhost', 'root', '', 'user_db');

  // Check if the connection was successful
  if (!$conn) {
    die('Connection failed: '. mysqli_connect_error());
  }

// Get the vaccine ID from the URL parameter
$vaccine_id = $_GET['id'];

// Query to retrieve the vaccine details
$sql = "SELECT * FROM vaclist WHERE id = '$vaccine_id'";
$result = mysqli_query($conn, $sql);

// Check if the vaccine exists
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $vaccine_name = $row['Vaccine_name'];
    $availability = $row['Availability'];
} else {
    echo "Vaccine not found.";
    exit;
}

// Form to edit vaccine details
echo "<form action='update_vaccine.php' method='post'>";
echo "<h1>Edit Vaccine Details</h1>";
echo "<br>";
echo "<label>Vaccine Name:</label>";
echo "<input type='text' name='vaccine_name' value='$vaccine_name'>";
echo "<br>";
echo "<label>Availability:</label>";
echo "<input type='text' name='availability' value='$availability'>";
echo "<br>";
echo "<input type='hidden' name='id' value='$vaccine_id'>";
echo "<input type='submit' value='Update'>";
echo "</form>";