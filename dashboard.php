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
    echo 'Welcome, ' . $row['name'] . ' (' . $row['email'] . ')';
  }

  // Close the database connection
  mysqli_close($conn);

?>
