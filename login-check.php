<?php
  // Start a session
  session_start();

  // Connect to the MySQL database
  $conn = mysqli_connect('localhost', 'root', '', 'user_db');

  // Check if the connection was successful
  if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
  }

  // Get the user's email and password from the form submission
  $email = ($_POST['email']);
  $password_check = ($_POST['password']);


  // Query the database to see if the email and password match a record
  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($password_check == $row['password']) {

      
      $_SESSION['user_id'] = $row['id'];
      header('Location: user.php');
    } 
    
    else {
      
      echo 'Incorrect password';
    
    }
  } else {
  
    echo 'Email not found';
  }








  mysqli_close($conn);
?>
