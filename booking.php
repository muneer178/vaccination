

<?php

// Start a session
session_start();

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Define the database connection details
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'user_db';

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Get the form data
    $children_firstname = $_POST['fname'];
    $children_lastname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $last_vaccination_date = $_POST['last_vaccination_date'];
    $parent_name = $_POST['parent_name'];
    $hospital_selected = $_POST['hospital_selected'];
    $vaccine_type_selected = $_POST['vaccine_type'];
    $phone_number = $_POST['phone'];
    $email = $_POST['email'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];

    // Prepare a SQL statement to insert the form data into the database
    $stmt = $conn->prepare("INSERT INTO bookings (fname, lname, age, gender, last_vaccination_date, parent_name, hospital_selected, vaccine_type, phone, email, appointment_date, appointment_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind the parameters to the SQL statement
    $stmt->bind_param("ssisssssssss", $children_firstname, $children_lastname, $age, $gender, $last_vaccination_date, $parent_name, $hospital_selected, $vaccine_type_selected, $phone_number, $email, $appointment_date, $appointment_time);

    // Execute the SQL statement
    if ($stmt->execute()) {

      
        echo '<div class="container">';
        echo '<h1>Your booking is Successful</h1>';
   
        echo "<a href='user_profile.php' style='text-decoration: none;   color: #0b254f;'>← Go to profile</a>";

        echo '</div>';
   

    } else {
        echo 'Error: ' . $stmt->error;
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
}
?>




<style>
    body{
        background-color: #07A2D8;
    }
    .container {
      display: grid;
      max-width: 600px; 
      margin: 0 auto; 
      height: 50vh;
      place-items: center;
      color: #0b254f;
      font-family: Poppins, sans-serif;
      background-color: #ffffff;
      border-radius: 30px;
 
    }
    </style>