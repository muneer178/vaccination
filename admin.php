<?php
session_start(); // Start a new session

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // If form is submitted
    $username = $_POST['admin_name'];
    $password = $_POST['admin_password'];
    
    // Connect to MySQL database
    $conn = mysqli_connect('localhost', 'root', '', 'user_db');
    
    // Query the users table for a matching username and password
    $result = mysqli_query($conn, "SELECT * FROM admin_login WHERE admin_name='$username' AND admin_password='$password'");
    
    if (mysqli_num_rows($result) == 1) { // If match found
        $_SESSION['admin_name'] = $username; // Set session variable
        header('Location: admin_dashboard.php'); // Redirect to admin page
    } else {
        $error = "Invalid username or password"; // Set error message
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VaccineWay</title>
    <link rel="stylesheet" href="style_login.css">
</head>
<body>
<div class="background">
        
        </div>
        <form action="" method="post">
            <h3>Admin Login</h3>
    
            <label class="adminlabel">Admin Name: </label>
            <input type="text" placeholder="Email or Phone" name="admin_name">
    
            <label class="adminlabel">Admin Password: </label>
            <input type="password" placeholder="Password"  name="admin_password">
    
            <br>
            <br>
            <input type="submit" name="login" value="login" class="button">
            <div class="social">
              <div class="lb"><a href="signup.php">Sign Up</div></a>
           <div class="rb"><a href="login.php">Log In as user </div></a>
            </div>
        </form>
</body>
</html>