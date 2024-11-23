<?php
// Connect to database (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check for upcoming appointments
$current_date = date("Y-m-d"); // Get current date
$sql = "SELECT * FROM bookings WHERE appointment_date > '$current_date' ORDER BY appointment_date ASC LIMIT 1";
$result = $conn->query($sql);

// Display upcoming appointment or user profile
if ($result->num_rows > 0) {
    // Display upcoming appointment date
    $row = $result->fetch_assoc();
    $appointment_date = $row["appointment_date"];
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Profile</title>
        <style>
            body {
                background-color: #07A2D8;
            }
            .container {
                display: grid;
                max-width: 1000px; 
                margin: 0 auto; 
                height: 50vh;
                place-items: center;
                color: #0b254f;
                font-family: Poppins, sans-serif;
                background-color: #ffffff;
                border-radius: 30px;
                padding: 20px;
            }
            .button {
                margin-top: 20px;
                width: 30%;
                background-color: #07A2D8;
                color: #080710;
                padding: 15px 0;
                font-size: 18px;
                font-weight: 600;
                border-radius: 5px;
                cursor: pointer;
                text-align: center;
                text-decoration: none;
            }
            .button:hover {
                background-color: #F57E57;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Your next vaccination appointment is on <?php echo $appointment_date; ?>.</h1>
            <a href="index.php" class="button">Log out</a>
        </div>
    </body>
    </html>
<?php
} else {
    // No upcoming appointments found, display user profile information
    $sql_profile = "SELECT * FROM users WHERE id = 1"; // Replace with appropriate user_id or logic
    $result_profile = $conn->query($sql_profile);

    if ($result_profile->num_rows > 0) {
        $row_profile = $result_profile->fetch_assoc();
        $name = $row_profile["name"];
        $email = $row_profile["email"];
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>User Profile</title>
            <style>
                body {
                    background-color: #07A2D8;
                }
                .container {
                    display: grid;
                    max-width: 1000px; 
                    margin: 0 auto; 
                    height: 50vh;
                    place-items: center;
                    color: #0b254f;
                    font-family: Poppins, sans-serif;
                    background-color: #ffffff;
                    border-radius: 30px;
                    padding: 20px;
                }
                .button {
                    margin-top: 20px;
                    width: 30%;
                    background-color: #07A2D8;
                    color: #080710;
                    padding: 15px 0;
                    font-size: 18px;
                    font-weight: 600;
                    border-radius: 5px;
                    cursor: pointer;
                    text-align: center;
                    text-decoration: none;
                }
                .button:hover {
                    background-color: #F57E57;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>Welcome, <?php echo $username; ?>!</h1>
                <p>Email: <?php echo $email; ?></p>
                <p>No upcoming appointments found.</p>
                <a href="index.php" class="button">Log out</a>
            </div>
        </body>
        </html>
<?php
    } else {
        // Handle case where user profile isn't found
        echo "User profile not found.";
    }
}

$conn->close();
?>
