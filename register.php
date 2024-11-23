<?php
  // Connect to the MySQL database
  $conn = mysqli_connect('localhost', 'root', '', 'user_db');

  // Check if the connection was successful
  if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
  }

  // Get the user's name, email, and password from the form submission
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  

  // Insert the user's information into the database
  $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
  if (mysqli_query($conn, $sql)) {
    header('Location: login.php');
  } else {
    echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
  }



  







  // Close the database connection
  mysqli_close($conn);
?>
